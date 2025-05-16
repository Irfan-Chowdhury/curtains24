<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurtainSize;
use App\Services\CurtainSizeService;
use Exception;
use Illuminate\Http\Request;

class CurtainSizeController extends Controller
{
    protected $curtainSizeService;

    public function __construct(CurtainSizeService $curtainSizeService)
    {
        $this->curtainSizeService = $curtainSizeService;
    }

    public function index()
    {
        $curtainSizes = $this->curtainSizeService->getAllData();

        return view('admin.pages.curtain-size.index', compact('curtainSizes'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'width_m' => 'required|integer',
            'width_cm' => 'required|integer',
            'height_m' => 'required|integer',
            'height_cm' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $this->curtainSizeService->storeData($validated);

            $this->setSuccessMessage('Size created successfully');

        } catch (Exception $exception) {
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit(CurtainSize $curtainSize)
    {
        $curtainSize = $this->curtainSizeService->findData($curtainSize);

        return response()->json($curtainSize);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'curtain_size_id' => 'nullable|integer',
            'width_m' => 'required|integer',
            'width_cm' => 'required|integer',
            'height_m' => 'required|integer',
            'height_cm' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        try {

            $this->curtainSizeService->updateData($validated);

            $this->setSuccessMessage('Size updated successfully');

        } catch (Exception $exception) {

            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function destroy(CurtainSize $curtainSize)
    {
        try {
            $curtainSize->delete();

            $this->setSuccessMessage('Curtain Size deleted successfully');

        } catch (Exception $exception) {

            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }
}
