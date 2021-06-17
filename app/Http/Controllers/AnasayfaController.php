<?php

namespace App\Http\Controllers;

use App\Models\Bildirimler;
use App\Models\Etkinlikler;
use App\Models\Paylasimlar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnasayfaController extends Controller
{
    public function index(){
        $user = Auth::user();

        //KULLANICIYA ÖZEL POSTLAR;
        $userid = $user->id;
        $arkadasid = [];
        $arkadasid [] = $userid;

        if (count($user->arkadaslar)>0){
        foreach ($user->arkadaslartablo as $entry){
            $arkadasid[] = $entry->arkadas_id;
        }
        $post = Paylasimlar::whereIn('user_id', $arkadasid)->orderByDesc('created_at')->get();
        $etkinlikler = Etkinlikler::whereIn('user_id', $arkadasid)->orderByDesc('created_at')->get();
        }else{
            $post = Paylasimlar::whereIn('user_id', $arkadasid)->orderByDesc('created_at')->get();
            $etkinlikler = Etkinlikler::whereIn('user_id', $arkadasid)->orderByDesc('created_at')->get();
        }



        //YAKLAŞAN ETKİNLİKLER
        $yaklasan_etkinlikler = Etkinlikler::orderByDesc('created_at')->take(5)->get();
        return view('anasayfa', compact('user', 'post', 'etkinlikler', 'yaklasan_etkinlikler'));
    }

    public function arama(Request $request){
        $aramauser = User::where('ad', 'like', "%$request->aranan%")->orWhere('soyad', 'like', "%$request->aranan%")->orWhere('ogrenci_no', 'like', "%$request->aranan")->get();
        //**
        $post = Paylasimlar::where('baslik', 'like', "%$request->aranan%")->get();
        return view('aramasonuc', compact('aramauser', 'post'));
    }

    public function bildirimler(){
        $bildirimler = Bildirimler::where('user_id', Auth::user()->id)->get();
        //BİLDİRİMLER OKUNDU
        foreach ($bildirimler as $item){
            $item->bildirim_durumu =1;
            $item->save();
        }
        return view('bildirimler', compact('bildirimler'));
    }
    public function bildirimsil(Request $request){
        $bildirim = Bildirimler::where('id', $request->id)->first();
        $bildirim->delete();
        return back();
    }

    public function etkinlik($etkinlik_id){
        $etkinlik = Etkinlikler::where('id', $etkinlik_id)->first();
        return view('etkinlik_detay', compact('etkinlik'));
    }
}
