<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Exception;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return abort('403', __('You are not authorized'));
        }

        $hero = Hero::first();
        return view('admin.hero-section.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request, [
            'heading' => 'required',
            'title_1' => 'required',
            'description_1' => 'required',
            'title_2' => 'required',
            'description_2' => 'required',
            'title_3' => 'required',
            'description_3' => 'required',
        ]);

        try {
            $hero = Hero::first();
            $hero->update($validated);

            $this->setSuccessMessage('Data updated successfully');

        } catch (Exception $e) {
            $this->setErrorMessage( $e->getMessage());
        }

        return redirect()->back();
    }
}
