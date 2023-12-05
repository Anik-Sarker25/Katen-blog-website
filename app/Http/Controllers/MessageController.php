<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Contact::paginate(4);
        return view('backend.message.messages', compact('messages'));
    }
    // Message delete code
    public function delete($id) {
        Contact::find($id)->delete();
        return back()->with('update_success', "Message has been deleted successfully");
    }
}
