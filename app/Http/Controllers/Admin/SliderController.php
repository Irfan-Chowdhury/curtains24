<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Storefront;
use App\Services\SliderService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        $slider = $this->sliderService->getSliderData();

        return view('admin.pages.sliders.index', compact('slider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required_if:is_title_visible,1', 'string', 'max:255'],
            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $this->sliderService->storeData($request);

            $this->setSuccessMessage('Slider created successfully');

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit(Slider $slider)
    {
        $slider = $this->sliderService->findData($slider);

        return response()->json($slider);
    }

    public function update(Request $request)
    {
        if($request->type == 'content'){
            $request->validate([
                'slider_heading' => 'required|string|max:255',
                'slider_description' => 'required|string',
            ]);
        }

        if($request->type == 'image'){
            $request->validate([
                'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,bmp|max:2048',
            ]);
        }

        DB::beginTransaction();
        try {
            $this->sliderService->sliderContentUpdate($request);

            $this->sliderService->sliderImageUpdate($request);

            $this->setSuccessMessage('Slider updated successfully');

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }


    public function destroy(Slider $slider)
    {
        try {
            $this->sliderService->destroy($slider);

            $this->setSuccessMessage('Slider deleted successfully');

        } catch (Exception $exception) {

            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }
}
