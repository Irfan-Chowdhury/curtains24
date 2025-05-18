<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\StorefrontService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    public function __construct(private StorefrontService $storefrontService){}

    public function index()
    {
        $contactUs = $this->storefrontService->getLatestData();

        return view('admin.pages.contact-us.index', compact('contactUs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'contact_heading' => 'required|string|max:255',
            'contact_description' => 'required|string',
        ]);

        try {
            $this->storefrontService->updateData($request);

            $this->setSuccessMessage('Contact us updated successfully');

            return redirect()->back();

        } catch (Exception $exception) {

            return back()->withErrors(['error' => $exception->getMessage()]);

        }
    }

    public function messages()
    {
        $messagesQuery = Contact::orderBy('created_at', 'desc')->get();

        $messages = $messagesQuery->map(function ($value) {
            return (object) [
                'id' => $value->id,
                'name' => $value->name,
                'phone' => $value->phone,
                'message' => Str::words($value->message, 5, '...') ?? 'No message',
                'created_at' => $value->created_at->translatedFormat('jS M, Y h:i A'),
            ];
        });


        return view('admin.pages.contact-us.messages', compact('messages'));
    }

    public function show(Contact $contact)
    {
        return view('admin.pages.contact-us.show', compact('contact'));
    }
}
