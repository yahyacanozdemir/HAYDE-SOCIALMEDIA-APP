<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\UserSosyalMedya;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendingEmail;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $mesaj="Haydeye giriş yapabilmek icin aşağıdaki bağlantıya tiklayarak mailinizi doğrulayın.";

       //////// $validator = Validator::make(request()->all(),[
        $request->validate([
            'email' => 'required|string|email|max:255|unique:user|ends_with:.btu.edu.tr',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'ad'=>'min:2',
            'soyad'=>'min:2'
        ]);
        //btu maili değilse
        //şifre 8 karakter değilse
        //şifre yanlişsa
        // şifre veya soy isim 2 karakterden az olamaz



        $kad = $request->ad.$request->soyad;
        $kullanici_adi = str_slug($kad);
        $ogrencino=str_split($request->email,11);
        $ogr_no=(string)$ogrencino[0];
        $dosya='defaultprofile.jpeg';
        $user = User::create([
            'ad' => $request->ad,
            'soyad' => $request->soyad,
            'email' => $request->email,
            'ogrenci_no' => $ogr_no,
            'kullanici_adi'=>$kullanici_adi,
            'password' => Hash::make($request->password),
            'profil_fotografi'=> $dosya,
            'yas'=>18,
            'uyruk'=>'Turk',
            'telefon'=>5325325332,
            'bulundugu_il'=>'Bursa',
            'bulundugu_ilce'=>'Yildirim',
            'bolum_bilgisi'=>'Bilgisayar Muhendisligi',
            'sinif_bilgisi'=>3,
            'ilgi_alani'=>'Muhendislik',
            'kisisel_eposta_adresi'=>'ozelmailadresiniz@example.com',
            'verificationcode'=>sha1(time()),

        ]);

        $sosyalmedya = $user->sosyalmedyahesaplari()->updateOrCreate(
            ['user_id' => $user->id],
         ['twitter' => "https://www.twitter.com/",
         'linkedin' => "https://www.linkedin.com/",
         'instagram' => "https://www.instagram.com/",
         'facebook' => "https://www.facebook.com/"]

        );

        $data=array(
            'name'=>$request->ad,
            'message'=>$mesaj,
            'verificationcode'=>$user->verificationcode
 
        );
        if($user!=null){
        Mail::to($request->email)->send(new sendingEmail($data));
        return redirect()->back()->with(session()->flash('alert-success','Mailiniz atıldı, mailinizi doğrulayın.'));
        }
        return redirect()->back()->with(session()->flash('alert-danger','Mailiniz atılamadı.'));

        //return redirect()->route('anasayfa');
    }

    public function verifykullanici(){
       
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verificationcode' => $verification_code])->first();
       
        if($user != null){
            $user->verify_durum = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Hesabınız tanımlı. Lütfen giriş yapınız.'));
        }
        return redirect()->route('login')->with(session()->flash('alert-danger', 'Mail doğrulanamadı!'));
    }


}
