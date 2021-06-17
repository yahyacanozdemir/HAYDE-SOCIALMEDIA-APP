@extends('katmanlar.master')
@section('title', 'Etkinlik Detayları')
@section('css', '/assets/css/EventDetail.css')

@section('content')
<h2 id="pageTitle">Etkinlik Detayları</h2>

<div class="container">
    <hr class="rounded" style="background-color: rgb(119, 137, 182);">
    <div class="row">
        <div class="col-sm-12">


            <!--- \\\\\\\Post-->
            <div class="card gedf-card rounded overflow-hidden">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2">
                                <img id="post-uid-owner-pp" class="rounded-circle" width="45" src="/uploads/image/users/{{$etkinlik->kullanici->profil_fotografi}}" alt="">
                            </div>
                            <div class="ml-2">
                                <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                    {{$etkinlik->kullanici->ad}}</div>
                                <div id="post-uid-owner-username" class="h7 m-0 text-muted">{{'@'.$etkinlik->kullanici->kullanici_adi}}r</div>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                    <div class="h6 dropdown-header">Seçenekler</div>
                                    <a class="dropdown-item" href="#">Gönderiyi Sil</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="text-muted h7 mb-2"> <i class="fa fa-calendar"></i>
                        @if(\Carbon\Carbon::parse($etkinlik->created_at)->diffInMinutes()<59)
                            {{\Carbon\Carbon::parse($etkinlik->created_at)->diffInMinutes()}} dk önce oluşturuldu.
                        @endif
                        @if(\Carbon\Carbon::parse($etkinlik->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($etkinlik->created_at)->diffInHours()<24)
                            {{\Carbon\Carbon::parse($etkinlik->created_at)->diffInHours()}} saat önce oluşturuldu.
                        @endif
                        @if(\Carbon\Carbon::parse($etkinlik->created_at)->diffInHours()>24)
                            {{\Carbon\Carbon::parse($etkinlik->created_at)->diffInDays()}} gün önce oluşturuldu.
                        @endif
                    </div>
                    <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> {{$etkinlik->baslangic_tarihi}}</div>

                    <div id="event-uid-title" class="alert alert-light event-title-style rounded" role="alert">
                        {{$etkinlik->baslik}}
                    </div>

                    <div id="event-uid-location" class="alert alert-warning event-location-style" role="alert">
                        Konum : {{$etkinlik->etkinlik_konumu}}
                    </div>

                    <div id="event-uid-date" class="alert alert-info event-date-style" role="alert">
                        Tarih : {{$etkinlik->baslangic_tarihi}}
                    </div>

                    <div id="event-uid-date" class="alert alert-info event-location-style" role="alert">
                            Katılımcılar : {{count($etkinlik->katilanlar)}}
                    </div>

                    <!--FOTOĞRAF -->
                    <div class='row justify-content-center mb-2 mt-2 mr-2 ml-2'>
                            <img src="/uploads/image/etkinlik/{{$etkinlik->etkinlik_fotografi}}" alt="">
                        </div>

                    <div id="event-uid-content-div" class="alert alert-secondary event-content-div-style rounded" role="alert">
                        <p id="event-uid-content-title" class="event-content-title">Etkinlik Detayları</p>
                        <p id="event-uid-content-paragraph" class="event-content-paragraph">
                           {{$etkinlik->icerik}}
                        </p>
                    </div>

                </div>

                <div class="card-footer row align-items-center">
                        <form action="{{route('etkinlik.katil')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$etkinlik->id}}" name="etkinlik_id">
                            <button type="submit" class="card-link btn btn-info"><i class="fa fa-users"></i> Katıl</button>
                        </form>
                        <a id="post-uid-showcomments" class="card-link ml-2"><i class="fa fa-comment"></i> Yorumlar</a>
                    </div>

                <!--Comments-->
                @foreach($etkinlik->yorumlarr as $list)
                <div class="card-footer" id="comments-area">
                    <div class="row align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-2 ml-2">
                                <img class="rounded-circle" width="45" src="/uploads/image/users/{{$list->kullanici->profil_fotografi}}" alt="">
                            </div>
                            <div class="ml-2">
                                <div id="commentname" class="h8" style="color: rgb(169, 183, 247);"><a
                                        href="{{route('profil', $list->kullanici->kullanici_adi)}}">{{$list->kullanici->kullanici_adi}}</a></div>
                                <div id="commentdate" class="h10 m-0 text-muted">

                                    @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()<59)
                                        {{\Carbon\Carbon::parse($list->created_at)->diffInMinutes()}} dk önce.
                                    @endif
                                    @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($list->created_at)->diffInHours()<24)
                                        {{\Carbon\Carbon::parse($list->created_at)->diffInHours()}} saat önce.
                                    @endif
                                    @if(\Carbon\Carbon::parse($list->created_at)->diffInHours()>24)
                                        {{\Carbon\Carbon::parse($list->created_at)->diffInDays()}} gün önce
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="comment-content" class="friend_name_surname mt-2" style="text-align: start;">{{$list->yorum_metni}}</p>
                </div>
            @endforeach
                <!--End of Comments-->
                <!--Add Comment Area-->
                <div class="card-footer">
                    <div>
                        <form action="{{route('etkinlikyorum')}}" method="POST"  class="row justify-content-between">
                            @csrf
                            <input type="hidden" value="{{$etkinlik->id}}" name="etkinlik_id">
                        <input id="specialcurrentusercomment1" type="text" class="form-control mt-sm-2 rounded text-form-color" name="yorum" style="width: 75%;" placeholder="Yorum yap" required>
                        <button id="confirmspecialcurrentusercomment1" type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                        </form>
                    </div>
                </div>
                <!--End of Add Comment Area-->

            </div>
            <!-- Post /////-->


        </div>
    </div>
</div>
@endsection
