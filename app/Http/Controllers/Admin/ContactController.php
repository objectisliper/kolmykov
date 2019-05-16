<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::get();
        return view('admin.contact.index', ['contact' => $contact]);
    }

    public function editContact(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string|min:4|max:25',
                'description' => 'required|string|min:10|max:25',
            ]);
            $contact = Contact::get()->first();
            if (!$contact) {
                return abort(404);
            }

            $contact->title = $request->input('title');
            $contact->description = $request->input('description');

            if ($contact->save()) {
                return redirect()->route('contact')->with('success', 'Описание контактов изменено');
            }
            return back()->with('error', 'Описание контактов не изменено');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }

    }
}
