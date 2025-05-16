<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurtainType;
use App\Services\CurtainTypeService;
use Exception;
use Illuminate\Http\Request;

class CurtainTypeController extends Controller
{
    protected $curtainTypeService;

    public function __construct(CurtainTypeService $curtainTypeService)
    {
        $this->curtainTypeService = $curtainTypeService;
    }

    public function index()
    {
        $curtainTypes = $this->curtainTypeService->getAllData();

        return view('admin.pages.curtain-type.index', compact('curtainTypes'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $this->curtainTypeService->storeData($validated);

            $this->setSuccessMessage('Type created successfully');

        } catch (Exception $exception) {
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit(CurtainType $curtainType)
    {
        $curtainSize = $this->curtainTypeService->findData($curtainType);

        return response()->json($curtainSize);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'curtain_type_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'is_active' => 'nullable|boolean',
        ]);

        try {

            $this->curtainTypeService->updateData($validated);

            $this->setSuccessMessage('Type updated successfully');

        } catch (Exception $exception) {

            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function destroy(CurtainType $curtainType)
    {
        try {
            $curtainType->delete();

            $this->setSuccessMessage('Curtain Type deleted successfully');

        } catch (Exception $exception) {

            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }
}
