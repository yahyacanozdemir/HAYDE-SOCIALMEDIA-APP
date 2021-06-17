<?php

namespace App\Http\Controllers;

use App\Models\Arkadaslar;
use App\Models\ArkadaslikIstekleri;
use App\Models\Bildirimler;
use App\Models\Paylasimlar;
use App\Models\PaylasimlarFotograf;
use App\Models\UserSosyalMedya;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{
    public function index($kullanici_adi){
        $kullanici = User::where('kullanici_adi', $kullanici_adi)->first();
        $istek_gonderildi = ArkadaslikIstekleri::where([['user_id',$kullanici->id],['arkadas_id',Auth::user()->id]]);
        $istek_kabul_edildi = Arkadaslar::where([['user_id',$kullanici->id],['arkadas_id',Auth::user()->id]]);
        $istek_gonderilen = ArkadaslikIstekleri::where([['user_id',Auth::user()->id],['arkadas_id',$kullanici->id]]);
        $paylasimlar_id = [];
        $paylasimlar = $kullanici->paylasimlar()->get();
        //KULLANICININ PAYLAŞIM İDLERİNİ ARRAY OLARAK ALDIK
        foreach ($paylasimlar as $entry){
            $paylasimlar_id[] = $entry->id;
        }
        //ARRAY DEĞERİNDEN KULLANICININ PAYLAŞIM FOTOĞRAFLARINI ÇEKTİK
        $fotograf = PaylasimlarFotograf::whereIn('paylasimlar_id', $paylasimlar_id)->take(8)->get();

        $tumpaylasimlar = Paylasimlar::where('user_id', $kullanici->id)->orderBy('created_at', 'desc')->get();
        $tumetkinlikler = $kullanici->etkinlikler()->orderBy('created_at', 'desc')->get();

        return view('profil', compact('kullanici',
            'fotograf',
            'istek_gonderildi',
            'istek_kabul_edildi',
            'istek_gonderilen',
        'tumetkinlikler',
        'tumpaylasimlar',
        ));
    }

    public function ayarlarform(){
        $user = Auth::user();
        return view('ayarlar', compact('user'));
    }

    public function ayarlarkaydet(Request $request){

        $user = Auth::user();
        $user->ad = $request->ad;
        $user->soyad=$request->soyad;
        $user->bulundugu_il=$request->bulundugu_il;
        $user->bulundugu_ilce=$request->bulundugu_ilce;
        $user->soyad=$request->soyad;
        $user->bulundugu_il=$request->bulundugu_il;
        $user->bolum_bilgisi=$request->bolum_bilgisi;
        $user->sinif_bilgisi=$request->sinif_bilgisi;
        $user->ilgi_alani=$request->ilgi_alani;
        $user->save();

        if ($request->hasFile('profilfoto')) {
            $this->validate(request(), [
                'profilfoto' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
            ]);
            $pp = request()->file('profilfoto');
            $pp = request()->profilfoto;
            $dosyaadi = $user->kullanici_adi . "-" . time() . "." . $pp->getClientOriginalName();

            if ($pp->isValid()) {
                $pp->move('uploads/image/users', $dosyaadi);
                $user->profil_fotografi = $dosyaadi;
                $user->save();
            }

        }

        //SOSYAL MEDYA GÜNCELLENECEK**
        $sosyalmedya = $user->sosyalmedyahesaplari()->updateOrCreate(
            ['user_id' => $user->id],
         ['twitter' => $request->t,
         'linkedin' => $request->l,
         'instagram' => $request->i,
         'facebook' => $request->f]

        );


        $bildirim = new Bildirimler();
        $bildirim->user_id = $user->id;
        $bildirim->gonderen_user_id = null;
        $bildirim->bildirim_icerigi = 'Hesap ayarlarınız başarıyla güncellendi.';
        $bildirim->bildirim_durumu = 0;
        $bildirim->save();


    return back();

}

public function kapakResmiKaydet(Request $request){

    $user = Auth::user();
   
    if ($request->hasFile('kapakfoto')) {
        $this->validate(request(), [
            'kapakfoto' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
        ]);
        $cp = request()->file('kapakfoto');
        $cp = request()->kapakfoto;
        $dosyaadi = $user->kullanici_adi . "-" . time() . "." . $cp->getClientOriginalName();

        if ($cp->isValid()) {
            $cp->move('uploads/image/users', $dosyaadi);
            $user->kapak_fotografi = $dosyaadi;
            $user->save();
        }

    }
    return back();

}

    public function arkadasekle(Request $request){
        $kullanici = User::where('id', $request->kullanici_id)->first();
        $user = Auth::user();
        $istek = new ArkadaslikIstekleri();
        $istek->user_id = $kullanici->id;
        $istek->arkadas_id = $user->id;
        $istek->save();


        $bildirim = new Bildirimler();
        $bildirim->user_id = $kullanici->id;
        $bildirim->gonderen_user_id = $user->id;
        $bildirim->bildirim_icerigi = $user->ad.' size bir arkadaşlık isteği gönderdi.';
        $bildirim->bildirim_durumu = 0;
        $bildirim->save();

        return back();
    }

    public function arkadaseklekabul(Request $request){
        $user = Auth::user();
        $kullanici = User::where('id', $request->kullanici_id)->first();

        $istek = new Arkadaslar();
        $istek->user_id = $user->id;
        $istek->arkadas_id = $kullanici->id;
        $istek->save();

        $istekiki = new Arkadaslar();
        $istekiki->user_id = $kullanici->id;
        $istekiki->arkadas_id = $user->id;
        $istekiki->save();

        $bildirim = new Bildirimler();
        $bildirim->user_id = $kullanici->id;
        $bildirim->gonderen_user_id = $user->id;
        $bildirim->bildirim_icerigi = $user->ad.' arkadaşlık isteğinizi kabul etti.';
        $bildirim->bildirim_durumu = 0;
        $bildirim->save();

        $silinecek = ArkadaslikIstekleri::where('id', $request->istek_id)->first();
        $silinecek->delete();

        return back();
    }

    public function arkadaseklered(Request $request){

        $red = ArkadaslikIstekleri::where('id', $request->istek_id)->first();
        $red->delete();
        return back();

    }

    public function ayarlarguvenlikkaydet(Request $request){
        $user = Auth::user();
        $eskisifre = Hash::make($request->old_password);

        //DİĞER BİLGİ GÜNCELLEMELERİ BURAYA**

    if($request->has('kullanici_adi') && $request->has('old_password') && $request->has('kisisel_eposta_adresi')) { 

        $user->kullanici_adi = $request->kullanici_adi;
        $user->kisisel_eposta_adresi = $request->kisisel_eposta_adresi;
        $user->save();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back();
        }else{
            return back()->with('mesaj', 'Şifreniz eşleşmiyor');
            }
        }
    else if($request->has('kullanici_adi') && !$request->has('old_password') && !$request->has('kisisel_eposta_adresi')){
        $user->kullanici_adi = $request->kullanici_adi;
        $user->save();
        return back();
    }
    else if(!$request->has('kullanici_adi') && $request->has('old_password') && !$request->has('kisisel_eposta_adresi')){
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back();
        }else{
            return back()->with('mesaj', 'Şifreniz eşleşmiyor');
            }
    }
    else if(!$request->has('kullanici_adi') && !$request->has('old_password') && $request->has('kisisel_eposta_adresi')){
        $user->kisisel_eposta_adresi = $request->kisisel_eposta_adresi;
        $user->save();
    }

    else if($request->has('kullanici_adi') && $request->has('old_password') && !$request->has('kisisel_eposta_adresi')){
        $user->kullanici_adi = $request->kullanici_adi;
        $user->save();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back();
        }else{
            return back()->with('mesaj', 'Şifreniz eşleşmiyor');
            }
    }

    else if($request->has('kullanici_adi') && !$request->has('old_password') && $request->has('kisisel_eposta_adresi')){
        $user->kullanici_adi = $request->kullanici_adi;
        $user->kisisel_eposta_adresi = $request->kisisel_eposta_adresi;
        $user->save();
    }

    else if(!$request->has('kullanici_adi') && $request->has('old_password') && $request->has('kisisel_eposta_adresi')){
        $user->kisisel_eposta_adresi = $request->kisisel_eposta_adresi;
        $user->save();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back();
        }else{
            return back()->with('mesaj', 'Şifreniz eşleşmiyor');
            }
    }

    

    
    


    }

}
