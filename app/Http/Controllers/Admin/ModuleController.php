<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Exception;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $module = Module::first();

        return view('admin.pages.modules.index', compact('module'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request, [
            'title_1' => 'required|string|min:3|max:255',
            'title_2' => 'required|string|min:3|max:255',
            'title_3' => 'required|string|min:3|max:255',
            'title_4' => 'required|string|min:3|max:255',
            'title_5' => 'required|string|min:3|max:255',
            'title_6' => 'required|string|min:3|max:255',
        ]);

        try {
            $module = Module::latest()->first();
            $module->update($validated);

            $this->setSuccessMessage('Module updated successfully');

        } catch (Exception $exception) {
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }
}
