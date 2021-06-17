@extends('katmanlar.master')
@section('title', 'Arkadaşlık İstekleri')
@section('css', '/assets/css/friendRequests.css')

@section('content')


<div class="container">
    <div class="col-sm-12">
        <div class="rounded custom-card-area-bg mt-4">
            <h4 id="page-title">Arkadaşlık İstekleri</h4>

            @foreach($userglobal->arkadaslikistekleri as $list)
            <div id="a-friend-request-div1">
                <hr>
                <div class="row a-friend-request-line justify-content-between">
                    <ul class="friend-list m-0 p-0">
                        <li class="d-flex align-items-center">
                            <div class="user-img  img-fluid"><img id="friend-request-1-img" src="/uploads/image/users/{{$list->gonderen->profil_fotografi}}" class="rounded-circle avatar-40 friend-img"></div>
                            <div class="media-support-info ml-3">
                                <h6 id="friend-request-1-name"><a href="{{route('profil', $list->gonderen->kullanici_adi)}}">{{$list->gonderen->ad}}</a></h6>
                            </div>
                        </li>
                    </ul>
                    <div class="friend-buttons-area">
                        <form action="{{route('arkadas.ekle.kabul')}}" method="POST" id="kabul_{{$list->id}}">
                            @csrf
                            <input type="hidden" name="kullanici_id" value="{{$list->gonderen->id}}">
                            <input type="hidden" name="istek_id" value="{{$list->id}}">
                        </form>
                        <form action="{{route('arkadas.ekle.red')}}" method="POST" id="red_{{$list->id}}">
                            @csrf
                            <input type="hidden" name="istek_id" value="{{$list->id}}">
                        </form>

                        <button form="kabul_{{$list->id}}" type="submit" class="btn btn-primary rounded confirm-button">Onayla</button>
                        <button form="red_{{$list->id}}" type="submit" class="btn btn-secondary rounded ignore-button">Reddet</button>
                    </div>
                </div>
            </div>
            @endforeach


            @if(count($userglobal->arkadaslikistekleri)==0)
            <div>
                <h3 id="message">Şuan için başka arkadaşlık isteğin bulunmamaktadır.</h3>
            </div>
                @endif


        </div>
    </div>
</div>
<script src="/assets/js/friendRequests.js"></script>
    @endsection
