<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Old\Employee;
use App\Http\traits\ENVFilePutContent;
use App\Http\traits\ImageHandleTrait;
use App\Models\Old\FinanceBankCash;
use App\Models\GeneralSetting;
use App\Models\Old\LeaveType;
use App\Notifications\EmployeeLeaveNotification;
use App\Models\User;
use App\Services\SettingService;
use DB;
use Exception;
use Illuminate\Http\Request;
use function config;
use ZipArchive;
use Illuminate\Support\Facades\Storage;


class GeneralSettingController extends Controller
{
    use ENVFilePutContent, ImageHandleTrait;

    private $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }


	public function index()
	{
        if(!auth()->check()){
            return abort('403', __('You are not authorized'));
        }

        $generalSetting = $this->settingService->getGeneralSettingData();

        $zones_array = $this->settingService->getAllTimeZones();

        return view('admin.settings.general_settings.index', compact('generalSetting', 'zones_array'));
	}



	public function update(Request $request, $id)
	{
        if(!auth()->check()){
            return abort('403', __('You are not authorized'));
        }

        $this->validate($request, [
            'site_logo' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
            'payment_logo' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
        ]);

        try {
            $this->settingService->saveData($request);

            $this->setSuccessMessage('Data updated successfully');

        } catch (Exception $e) {
            $this->setErrorMessage( $e->getMessage());
        }

        return redirect()->back();
	}



	public function mailSetting()
	{
        if(!auth()->check()) {
            return abort('403', __('You are not authorized'));
        }

		return view('admin.settings.mail_setting.mail');
	}


	public function mailSettingStore(Request $request)
	{

		if(!env('USER_VERIFIED')) {
			return redirect()->back()->with('msg', 'This feature is disable for demo!');
		}

		if (auth()->user()->can('view-mail-setting')) {

            $this->dataWriteInENVFile('MAIL_FROM_NAME',$request->mail_name);
            $this->dataWriteInENVFile('MAIL_HOST',$request->mail_host);
            $this->dataWriteInENVFile('MAIL_PORT',$request->port);
            $this->dataWriteInENVFile('MAIL_FROM_ADDRESS',$request->mail_address);
            $this->dataWriteInENVFile('MAIL_PASSWORD',$request->password);
            $this->dataWriteInENVFile('MAIL_ENCRYPTION',$request->encryption);

			return redirect()->back()->with('message', 'Data updated successfully');
		}
		return abort('403', __('You are not authorized'));
	}

	public function emptyDatabase()
	{
		if(!env('USER_VERIFIED')) {
			return redirect()->back()->with('msg', 'This feature is disabled for demo!');
		}
		DB::statement("SET foreign_key_checks=0");
		$tables = DB::select('SHOW TABLES');
		$str = 'Tables_in_' . env('DB_DATABASE');

        $employeeIds =  Employee::get()->pluck('id');
        User::whereIn('id',$employeeIds)->delete();

		foreach ($tables as $table) {
			// if($table->$str != 'countries' && $table->$str != 'model_has_roles' && $table->$str != 'role_users' && $table->$str != 'general_settings'  && $table->$str != 'migrations' && $table->$str != 'password_resets' && $table->$str != 'permissions' &&  $table->$str != 'roles' && $table->$str != 'role_has_permissions' && $table->$str != 'users') {
			if($table->$str != 'countries' && $table->$str != 'model_has_roles' && $table->$str != 'general_settings'  && $table->$str != 'migrations' && $table->$str != 'password_resets' && $table->$str != 'permissions' &&  $table->$str != 'roles' && $table->$str != 'role_has_permissions' && $table->$str != 'users') {
				DB::table($table->$str)->truncate();
			}
		}
        LeaveType::create(['leave_type'=>'Others','allocated_day'=>0]);

		DB::statement("SET foreign_key_checks=1");

		return redirect()->back()->with('msg', 'Database cleared successfully');
	}

	public function exportDatabase()
	{
		if(!env('USER_VERIFIED'))
		{
			return redirect()->back()->with('msg', 'This feature is disabled for demo!');
		}
		// Database configuration
		$host = env('DB_HOST');
		$username = env('DB_USERNAME');
		$password = env('DB_PASSWORD');
		$database_name = env('DB_DATABASE');

		// Get connection object and set the charset
		$conn = mysqli_connect($host, $username, $password, $database_name);
		$conn->set_charset("utf8");


		// Get All Table Names From the Database
		$tables = array();
		$sql = "SHOW TABLES";
		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_row($result)) {
			$tables[] = $row[0];
		}

		$sqlScript = "SET foreign_key_checks = 0;";

		foreach ($tables as $table) {
			// Prepare SQLscript for creating table structure
			$query = "SHOW CREATE TABLE $table";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_row($result);

			$sqlScript .= "\n\n" . $row[1] . ";\n\n";


			$query = "SELECT * FROM $table";
			$result = mysqli_query($conn, $query);

			$columnCount = mysqli_num_fields($result);

			// Prepare SQLscript for dumping data for each table
			for ($i = 0; $i < $columnCount; $i ++) {
				while ($row = mysqli_fetch_row($result)) {
					$sqlScript .= "INSERT INTO $table VALUES(";
					for ($j = 0; $j < $columnCount; $j ++) {
						if (isset($row[$j])) {
							$sqlScript .= "'" . addslashes($row[$j]) . "'";
						} else {
							$sqlScript .= "''";
						}
						if ($j < ($columnCount - 1)) {
							$sqlScript .= ',';
						}
					}
					$sqlScript .= ");\n";
				}
			}

			$sqlScript .= "\n";
		}
        $sqlScript .= "SET foreign_key_checks = 1;";

		if(!empty($sqlScript))
		{
			// Save the SQL script to a backup file
			$backup_file_name = public_path().'/'.$database_name . '_backup_' . time() . '.sql';
			//return $backup_file_name;
			$fileHandler = fopen($backup_file_name, 'w+');
			$number_of_lines = fwrite($fileHandler, $sqlScript);
			fclose($fileHandler);

			$zip = new ZipArchive();
			$zipFileName = $database_name . '_backup_' . time() . '.zip';
			$zip->open(public_path() . '/' . $zipFileName, ZipArchive::CREATE);
			$zip->addFile($backup_file_name, $database_name . '_backup_' . time() . '.sql');
			$zip->close();

			// Download the SQL backup file to the browser
			/*header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($backup_file_name));
			ob_clean();
			flush();
			readfile($backup_file_name);
			exec('rm ' . $backup_file_name); */
		}
		return redirect('/' . $zipFileName);
	}





    protected function test()
    {
        // Notification::route('mail', 'irfanchowdhury80@gmail.com')
        // ->notify(new EmployeeLeaveNotification(
        //     'Irfan Chowdhury',
        //     '12',
        //     '2023-04-19',
        //     '2023-04-24',
        //     'Test',
        // ));
        // return 'ok';
    }

}
