<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyAndPolicy;
use Exception;
use Illuminate\Http\Request;

class PrivacyAndPolicyController extends Controller
{
    public function index()
    {
        $privacyAndPolicy = PrivacyAndPolicy::latest()->first();

        return view('admin.pages.privacy-and-policy.index', compact('privacyAndPolicy'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            $privacyAndPolicy = PrivacyAndPolicy::latest()->first();

            $privacyAndPolicy->update($validated);

            $this->setSuccessMessage('Privacy and Policy updated successfully');

        } catch (Exception $exception) {
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }
}
