<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = "Name: " . $request->name . "\n";
        $data .= "Email: " . $request->email . "\n";
        $data .= "Message: " . $request->message . "\n";
        
        $fileName = 'contact_' . time() . '.txt';
        File::put(storage_path('app/' . $fileName), $data);

        return back()->with('success', 'Mensaje Enviado!');
    }
}

?>