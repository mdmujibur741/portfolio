<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\contactformmail;
use App\Models\mail;

class contactController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }

   public function index()
   {
           $contact = mail::all();
           return view('admin.contact',compact('contact'));
   }

    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:mails|max:255',
            'phone' => 'required|max:15',
            'message' => 'required|max:255',

           ]);
            $mail = new mail();
            $mail->name = $request->name;
            $mail->email = $request->email;
            $mail->phone = $request->phone;
            $mail->message = $request->message;
            $mail->save();
            return redirect()->back()->with('status','DATA SUBMIT SUCCESSFULLY!');
    }

    public function destroy($id)
    {
           $delete = mail::find($id);
           $delete->delete();
           return redirect()->back()->with('status','DATA DELETE SUCCESSFULLY!');
    }
}
