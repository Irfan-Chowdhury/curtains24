<?php

namespace App\Http\Controllers;

use App\Http\traits\AutoUpdateTrait;
use App\Http\traits\ENVFilePutContent;
use App\Http\traits\JSONFileTrait;
use Exception;
use ZipArchive;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ClientAutoUpdateController extends Controller
{
    use ENVFilePutContent, JSONFileTrait, AutoUpdateTrait;

    public function newVersionReleasePage()
    {
        $autoUpdateData = $this->general();
        $getVersionUpgradeDetails = $this->getVersionUpgradeDetails();
        $newVersion = $autoUpdateData['generalData']->general->demo_version ?? 0;
        $alertVersionUpgradeEnable = $autoUpdateData['alertVersionUpgradeEnable'];
        return view('admin.version_upgrade.index', compact('getVersionUpgradeDetails','alertVersionUpgradeEnable','newVersion'));
    }

    public function bugUpdatePage()
    {
        $autoUpdateData = $this->general();
        $getBugUpdateDetails = $this->getBugUpdateDetails();
        $bugNotificationEnable = $autoUpdateData['alertBugEnable'];
        return view('admin.bug_update.index', compact('getBugUpdateDetails','bugNotificationEnable'));
    }

    /*
    |==============================
    | Action on Client Server
    |==============================
    */

    public function versionUpgrade() {
        return $this->actionTransfer('version_upgrade');
    }

    public function bugUpdate()
    {
        return $this->actionTransfer('bug_update');
    }

    /*
    |============================================================================================================
    | matchFilesFromServerBeforeExecute() -> from server it will be match with fetch-data-upgrade.json and fetch-data-bug.json file. And Check all Before Execute Files
    | fileTransferProcess() -> it will send files from peopleprohrm.com server to client setver
    |============================================================================================================
    */

    protected function actionTransfer($action_type)
    {
        $general = $this->general();
        $trackGeneralArr = $general['generalData']->general;

        if($action_type =='version_upgrade') {
            $message = 'Version Upgraded Successfully !!!';
            $base_url = 'https://peopleprohrm.com/version_upgrade_files/'; //$this->version_upgrade_base_url;
            $getFilesAndLogsDetail = $this->getVersionUpgradeDetails();
        }else if($action_type == 'bug_update') {
            $message = 'Updated successfully';
            $base_url = 'https://peopleprohrm.com/bug_update_files/'; //$this->bug_update_base_url;
            $getFilesAndLogsDetail = $this->getBugUpdateDetails();
        }


        try {
            $this->matchFilesFromServerBeforeExecute($getFilesAndLogsDetail, $trackGeneralArr, $base_url);

            // Start Execute
            if ($getFilesAndLogsDetail && $trackGeneralArr) {
                $this->fileTransferProcess($getFilesAndLogsDetail, $base_url);

                if($action_type =='version_upgrade'){
                    $this->dataWriteInENVFile('VERSION',$trackGeneralArr->demo_version);
                }else if($action_type == 'bug_update') {
                    $this->dataWriteInENVFile('BUG_NO',$trackGeneralArr->demo_bug_no);
                }

                if (($action_type =='version_upgrade' && $trackGeneralArr->latest_version_db_migrate_enable==true) || ($action_type == 'bug_update' && $trackGeneralArr->bug_db_migrate_enable==true) ){
                    Artisan::call('migrate --path=database/migrations/primary');
                    Artisan::call('migrate --path=database/migrations/modify');
                    // Artisan::call('migrate');
                }
                Artisan::call('optimize:clear');
                $this->setSuccessMessage($message);
                return redirect()->back();
            }
            else{
                throw new Exception("Something wrong. Please contact with support team.");
            }
        }
        catch(Exception $e) {
            // return response()->json(['error' => [$e->getMessage()]],404);
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    protected function matchFilesFromServerBeforeExecute($getFilesAndLogsDetail, $trackGeneralArr, $base_url)
    {
        if ($getFilesAndLogsDetail && $trackGeneralArr) {
            foreach ($getFilesAndLogsDetail->files as $value) {
                $remote_file_url  = $base_url.$value->file_name;
                $array = @get_headers($remote_file_url);
                $string = $array[0];
                if(!strpos($string, "200")) {
                    throw new Exception("Something wrong. Please contact with support team.");
                }
            }
        }else{
            throw new Exception("Something wrong. Please contact with support team.");
        }
    }

    protected function fileTransferProcess($getFilesAndLogsDetail, $base_url)
    {
        foreach ($getFilesAndLogsDetail->files as $value) {
            $remote_file_url  = $base_url.$value->file_name;
            $remote_file_name = pathinfo($remote_file_url)['basename'];
            $local_file = base_path('/'.$remote_file_name);
            $copy = copy($remote_file_url, $local_file);
            if ($copy) {
                // ****** Unzip ********
                $zip = new ZipArchive;
                $file = base_path($remote_file_name);
                $res = $zip->open($file);
                if ($res === TRUE) {
                    $zip->extractTo(base_path('/'));
                    $zip->close();

                    // ****** Delete Zip File ******
                    File::delete($remote_file_name);
                }
            }
        }
    }
}
