<?php

namespace App\Http\Controllers\Variables;

use App\Http\Controllers\Controller;
use App\Models\Old\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanTypeController extends Controller
{
    public function index()
	{
		if (request()->ajax())
		{
			return datatables()->of(LoanType::select('id', 'type_name')->get())
				->setRowId(function ($row)
				{
					return $row->id;
				})
				->addColumn('action', function ($data)
				{
					if (auth()->user()->can('access-variable_type')) {
						$button = '<button type="button" name="edit" id="' . $data->id . '" class="loan_type_edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
						$button .= '&nbsp;&nbsp;';
						$button .= '<button type="button" name="delete" id="' . $data->id . '" class="loan_type_delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

						return $button;
					}
                    else {
						return '';
					}
				})
				->rawColumns(['action'])
				->make(true);
		}

	}

	public function store(Request $request)
	{
        // return response()->json($request->all());

		$logged_user = auth()->user();

		if ($logged_user->can('access-variable_type')) {
			$validator = Validator::make($request->only('type_name'),[
					'type_name' => 'required|unique:loan_types',
				]
			);

			if ($validator->fails()) {
				return response()->json(['errors' => $validator->errors()->all()]);
			}

			$data = [];
			$data['type_name'] = $request->get('type_name');

			LoanType::create($data);

			return response()->json(['success' => __('Data Added successfully.')]);
		}

		return abort('403', __('You are not authorized'));

	}


	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = LoanType::findOrFail($id);

			return response()->json(['data' => $data]);
		}
	}

	public function update(Request $request)
	{
		$logged_user = auth()->user();

		if ($logged_user->can('access-variable_type'))
		{
			$id = $request->get('hidden_loan_type_id');

			$validator = Validator::make($request->only('type_name_edit'),[
					'type_name_edit' => 'required|unique:loan_types,type_name,'.$id,
				]

			);

			if ($validator->fails()) {
				return response()->json(['errors' => $validator->errors()->all()]);
			}

			$data = [];
			$data['type_name'] = $request->get('type_name_edit');

			LoanType::whereId($id)->update($data);

			return response()->json(['success' => __('Data is successfully updated')]);
		}
        else {
			return abort('403', __('You are not authorized'));
		}
	}


	public function destroy($id)
	{
		if(!env('USER_VERIFIED'))
		{
			return response()->json(['error' => 'This feature is disabled for demo!']);
		}
		$logged_user = auth()->user();

		if ($logged_user->can('access-variable_type')) {
			LoanType::whereId($id)->delete();
			return response()->json(['success' => __('Data is successfully deleted')]);
		}
		return abort('403',__('You are not authorized'));
	}
}
