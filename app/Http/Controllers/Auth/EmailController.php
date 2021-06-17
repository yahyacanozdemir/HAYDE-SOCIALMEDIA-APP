<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendingEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    function index()
    {
        return view('emailsend');
    }

    function send(Request $request)
    {
        $mesaj="Haydeye giriş yapabilmek icin aşağıdaki bağlantıya tiklayarak mailinizi doğrulayın.";

       $data=array(
           'name'=>$request->name,
           'message'=>$mesaj

       );

        Mail::to($request->email)->send(new sendingEmail($data));
    //dd($request->email);
    //return redirect("signinsignup",$request);
}
}
