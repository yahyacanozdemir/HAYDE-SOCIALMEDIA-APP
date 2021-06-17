<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {// dd($request->email);
       
        $user= User::where('email',$request->email)->get();
        
        if($user->toArray()==null){
           // dd($user);
            return redirect()->route('login')->with(session()->flash('alert-danger','Hesabınız bulunamadı.'));
        }
        //dd($user[0]->verify_durum);
        if($user[0]->verify_durum==1){
            $request->authenticate();
        $request->session()->regenerate();
         return redirect()->route('anasayfa');
       }else{
          // dd("h");
        return redirect()->route('login')->with(session()->flash('alert-danger','Doğrulama yapmadan giremezsiniz.'));
       }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
