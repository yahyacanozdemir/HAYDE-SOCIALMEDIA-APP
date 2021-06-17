@extends('katmanlar.master')
@section('title', 'Arama Sonuçları')
@section('css', '/assets/css/aramaSonuclari.css')

@section('content')
    <div class="container">
        @foreach($aramauser as $entry)
        <div class="card-box">
            <div class="card-img">
                <img src="/uploads/image/users/{{$entry->profil_fotografi}}" alt="">
            </div>
            <div class="card-content">
                <span>{{$entry->kullanici_adi}}</span>
                <h3><strong><a class="btn btn-blue" href="{{route('profil', $entry->kullanici_adi)}}">PROFİLE GİT</a></strong></h3>
            </div>

        </div>
        @endforeach

    </div>

@endsection
