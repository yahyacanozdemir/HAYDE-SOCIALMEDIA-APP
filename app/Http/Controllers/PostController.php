<?php

namespace App\Http\Controllers;

use App\Models\Etkinlikler;
use App\Models\Paylasimlar;
use App\Models\PaylasimlarFotograf;
use App\Models\PaylasimlarMekan;
use App\Models\PaylasimlarYorumlar;
use App\Models\UserEtkinlikler;
use App\Models\EtkinlikYorum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
public function post(Request $request){
    $user = Auth::user();

    if ($request->has('durumbox')){
        $post = new Paylasimlar();
        $post->user_id = $user->id;
        $post->metin = $request->durumbox;
        $post->paylasim_tipi=1;
        $post->save();
        return back();
    }elseif ($request->has('etkba')) {
        $post = new Etkinlikler();
        $post->user_id = $user->id;
        $post->baslik = $request->etkba;
        $post->etkinlik_konumu = $request->etkko;
        $post->baslangic_tarihi = $request->etkbta;
        $post->bitis_tarihi = $request->etkbitta;
        $post->icerik = $request->etkde;
        $post->save();

        if ($request->hasFile('etkinlikfoto')) {
            $this->validate(request(), [
                'etkinlikfoto' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
            ]);
            $pp = request()->file('etkinlikfoto');
            $pp = request()->etkinlikfoto;
            $dosyaadi = $user->kullanici_adi . "-" . time() . "." . $pp->getClientOriginalName();

            if ($pp->isValid()) {
                $pp->move('uploads/image/etkinlik', $dosyaadi);
                $post->etkinlik_fotografi = $dosyaadi;
            }

        }
        $post->save();

        return back();
    }elseif($request->hasFile('etkfoto')){

        $post = new Paylasimlar();
        $post->user_id = $user->id;
        $post->paylasim_tipi=2;
        $post->save();

        //RESIM
        $this->validate($request, [
            'etkfoto' => 'required'
        ]);
        if ($request->hasFile('etkfoto')) {
            foreach ($request->file('etkfoto') as $image) {
                $id = $user->id;
                $name = $id . "-" . time() . "." . $image->getClientOriginalName();
                $image->move('uploads/image/paylasimfoto/', $name);
                PaylasimlarFotograf::Create(
                    ['paylasimlar_id' => $post->id,
                        'fotograf' => $name,]
                );
            }
        }
        //RESIM SON
        return back();

    }elseif ($request->has('lokasyon')){
        $post = new Paylasimlar();
        $post->user_id = $user->id;
        $post->paylasim_tipi=3;
        $post->save();

        $lokasyon=$request->lokasyon;
        $enlem_boylam= explode(" ", $lokasyon);
        $enlem=$enlem_boylam[1];
        $boylam=$enlem_boylam[4];
        $knm = new PaylasimlarMekan();
        $knm->paylasimlar_id = $post->id;
        $knm->mekan_ismi = $request->mekan_ismi;
        $knm->enlem = $enlem;
        $knm->boylam = $boylam;
        $knm->mekan_adresi = $request->mekan_adresi;
        $knm->save();
        if ($request->hasFile('konumfoto')) {
            $this->validate(request(), [
                'konumfoto' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
            ]);
            $pp = request()->file('konumfoto');
            $pp = request()->konumfoto;
            $dosyaadi = $user->kullanici_adi . "-" . time() . "." . $pp->getClientOriginalName();

            if ($pp->isValid()) {
                $pp->move('uploads/image/etkinlik', $dosyaadi);
                $post->mekan_fotografi = $dosyaadi;
            }

        }
        return back();
    }
}

/*
 * yeni bir fonksiyon yorumekleetkinlik()
 * yeni bir tablo yorumlar_etkinlik
 * yeni bir model EtkinliklerYorumlar
 *
 */
    function yorumekle(Request $request){
    $user = Auth::user();
    $post = Paylasimlar::where('id', $request->post_id)->first();
    $yorum = new PaylasimlarYorumlar();
    $yorum->user_id = $user->id;
    $yorum->paylasimlar_id = $post->id;
    $yorum->yorum_metni = $request->yorum;
    $yorum->save();

        return back();

    }

    function etkinlikyorumekle(Request $request){
        $user = Auth::user();
        $event = Etkinlikler::where('id', $request->etkinlik_id)->first();
        $yorum = new EtkinlikYorum();
        $yorum->user_id = $user->id;
        $yorum->etkinlik_id = $event->id;
        $yorum->yorum_metni = $request->yorum;
        $yorum->save();
    
            return back();
    
        }


    function deletedurumpost(Request $request){
    $post = Paylasimlar::where('id', $request->post_id)->first();
    $post->delete();
    return back();
    }
    function begen(Request $request){
    //
    }

    public function etkinlikkatil(Request $request){
    $user = Auth::user();
    $etkinlik2 = Etkinlikler::where('id', $request->etkinlik_id)->first();

    $check = UserEtkinlikler::where('user_id', $user->id)->where('etkinlikler_id', $etkinlik2->id)->first();

    if (empty($check)){
        $etkinlik = new UserEtkinlikler();
        $etkinlik->user_id = $user->id;
        $etkinlik->etkinlikler_id = $etkinlik2->id;
        $etkinlik->save();
    }
        return back();
    }
}
