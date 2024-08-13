<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use Illuminate\Support\Facades\Mail;

class adminController extends Controller
{
    public function submit(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);


        $formData = FormData::create($validatedData);

        Mail::send('email', ['data' => $formData], function ($message) use ($formData) {
            $message->to('sarkarindrajeet32@gmail.com')
                ->subject('New Form Submission');
        });

        Mail::send('thankyou', ['data' => $formData], function ($message) use ($formData) {
            $message->to($formData->email)
                ->subject('Thank You for Your Submission');
        });

        return redirect()->route('thankyou')->with('formData', $formData);
    }
    public function index()
    {
        $submissions = FormData::all();
        return view('admin.index', compact('submissions'));
    }
    public function thankYou()
    {
        $formData = session('formData');
        return view('thankyou', ['data' => $formData]);
    }
}
