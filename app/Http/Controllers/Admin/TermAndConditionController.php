<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermAndCondition;
use Exception;
use Illuminate\Http\Request;

class TermAndConditionController extends Controller
{
    public function index()
    {
        $termAndCondition = TermAndCondition::latest()->first();

        return view('admin.pages.term-and-conditions.index', compact('termAndCondition'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            $termAndCondition = TermAndCondition::latest()->first();

            $termAndCondition->update($validated);

            $this->setSuccessMessage('Terms and Condition updated successfully');

        } catch (Exception $exception) {
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

}
