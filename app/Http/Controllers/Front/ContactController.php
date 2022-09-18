<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function ajaxRequestPost(Request $request)
    {
        $request->validate([
            'name_ajax' => 'required|max:255',
            'phone_ajax' => 'required',
            'email_ajax' => 'required|email',
            'message_ajax' => 'required'
        ]);

        // dd($request->all());
        DB::table('contacts')->insert([
            'name' => $request->name_ajax,
            'phone' => $request->phone_ajax,
            'email' => $request->email_ajax,
            'messages' => $request->message_ajax
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data  successfully'
            ]
        );
    }

    public function List_Messages()
    {
        $datas = Contact::latest()->paginate(5);
        return view('Dashboard.Contact.list', compact('datas'));
    }

    public function Delete_Contact(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('listMessage')->with('warning', 'The Messages Deleted successfully');
    }
}
