@extends('katmanlar.master')
@section('title', 'Profil')
@section('css', '/assets/css/profile.css')
@section('content')

    <!-- Start of User Profile Card -->

    @if(Auth::user()->id == $kullanici->id)
    <div class="center-fixed-profile-card rounded">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <div class="cover-container d-flex justify-content-center row" style="background-position: center; background-size: cover; background-repeat:no-repeat; background-image: url(/uploads/image/users/{{$userglobal->kapak_fotografi}});">
            <div class="cover-edit-image-button">
                <form action="{{route('ayarlar.kapakResmKaydet')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="save-cover-image-button">
                <input type='submit' class='btn btn-info save-cover-image-button-shape' value='&#10004;'>
                </div>
                <input type="file" name="kapakfoto" class="edit-cover" accept="image/*" onchange="loadcoverphoto(event)" title="Kapak resmini değiştir." />
                </form>
                    <p class="cover-edit-image-icon">&#9998;</p>
            </div>
            <div class="cover-go-settings-button">
                <p title="Ayarlar"><a class="cover-gosettings-icon" href="{{route('ayarlar')}}">&#9881;</a></p>

            </div>
            <div href="cover.jpg" class="cover-image rounded fancybox " rel="ligthbox">
            </div>
        </div>
        <div class="profile-card-bottom ">
            <a href="/uploads/image/users/{{$kullanici->profil_fotografi}}" class=" fancybox" rel="ligthbox">
                <img src="/uploads/image/users/{{$kullanici->profil_fotografi}}" class="zoom img-fluid rounded-circle" alt="">
            </a>
            <p id="profile-name">{{$kullanici->ad.' '.$kullanici->soyad}}</p>
        </div>


        <div class="col profile-card-left-area">
            <div class="row">
                <div class="col-sm-6">
                    <p id="postsname" class="profile-card-left-texts"><a href="#">Gönderiler</a></p>
                    <p id="postsvalue">{{count($kullanici->paylasimlar) + count($kullanici->etkinlikler)}}</p>
                </div>
                <div class="col-sm-6">
                    <p id="friendsname" class="profile-card-left-texts"><a href="#">Arkadaşlar</a></p>
                    <p id="friendsvalue">{{count($kullanici->arkadaslar)}}</p>
                </div>
            </div>
        </div>

        <div class="col profile-card-right-area">
            <div class="row float-right">
                <ul class="social-network social-circle">
                    <li><a href="{{$kullanici->sosyalmedyahesaplari->facebook}}" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{$kullanici->sosyalmedyahesaplari->twitter}}" target="_blank" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{$kullanici->sosyalmedyahesaplari->linkedin}}" target="_blank" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="{{$kullanici->sosyalmedyahesaplari->instagram}}" target="_blank" class="icoGoogle" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
    @endif

    @if(Auth::user()->id != $kullanici->id)
    <div class="friend-center-fixed-profile-card rounded">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="cover-container d-flex justify-content-center row" style="background-position: center; background-size: cover; background-repeat:no-repeat; background-image: url(/uploads/image/users/{{$kullanici->kapak_fotografi}});">
            <div href="cover.jpg" class="cover-image rounded fancybox " rel="ligthbox">
            </div>
        </div>
        <div class="profile-card-bottom col">
            <a href="/uploads/image/users/{{$kullanici->profil_fotografi}}" class=" fancybox" rel="">
                <img src="/uploads/image/users/{{$kullanici->profil_fotografi}}" class="zoom img-fluid rounded-circle" alt="">
            </a>
            <p id="profile-name">{{$kullanici->ad.' '.$kullanici->soyad}}</p>
            <div class="row justify-content-center">
                <!-- ARKADAŞ EKLEME BUTONU -->
                <form action="{{route('arkadas.ekle')}}" method="POST">
                            @csrf
                            <input type="hidden" name="kullanici_id" value="{{$kullanici->id}}">
                            @if(!$istek_gonderildi->count() && !$istek_kabul_edildi->count() && !$istek_gonderilen->count())
                            <button id="add-friend-button-18360859048" class="btn btn-primary add-friend-button-style rounded mt-3" >Arkadaş Olarak Ekle</button>

                            @elseif($istek_gonderildi->count() && !$istek_kabul_edildi->count() && !$istek_gonderilen->count())
                            <p class='mt-3' style='color:white'> Arkadaslik Istegi Gonderildi</p>

                            @elseif($istek_gonderilen->count())
                            <p class='mt-3' style='color:white'>Arkadaslik Istegi Alindi</p>

                            @else
                            <p class='mt-3' style='color:white'>Bu Kişi Ile Arkadaşsiniz</p>

                            @endif
                        </form>
            </div>
        </div>

        <div class="col profile-card-left-area">
            <div class="row">
                <div class="col-sm-6">
                    <p id="postsname" class="profile-card-left-texts"><a href="#">Gönderiler</a></p>
                    <p id="postsvalue">{{count($kullanici->paylasimlar)}}</p>
                </div>
                <div class="col-sm-6">
                    <p id="friendsname" class="profile-card-left-texts"><a href="#">Arkadaşlar</a></p>
                    <p id="friendsvalue">{{count($kullanici->arkadaslar)}}</p>
                </div>
            </div>
        </div>

        <div class="col profile-card-right-area">
            <div class="row float-right">
                <ul class="social-network social-circle">
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#" class="icoGoogle" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
    @endif


    <!-- End of User Profile Card -->
    <div class="center-fixed-profile-content">
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <!--About Card-->
                    <div class="card rounded gedf-card">
                        <div class="card-body">
                            <p class="content-left-area-card-title">Hakkında</p>
                            <dl class="row justify-content-center align-items-start">
                                <dt class="col-sm-3 about-card-text-style"><i class="far fa-user"></i></dt>
                                <dt id="user_aboutcard_age_job_info" class="col-sm-9 about-card-text-style">Öğrenci</dt>

                                <dt class="col-sm-3 about-card-text-style"><i class="fas fa-book"></i></dt>
                                <dt id="user_aboutcard_departman_info" class="col-sm-9 about-card-text-style">
                                    {{$kullanici->bolum_bilgisi}}</dt>

                                <dt class="col-sm-3 about-card-text-style"><i class="far fa-compass"></i></dt>
                                <dt id="user_aboutcard_location_info" class="col-sm-9 about-card-text-style">{{$kullanici->bulundugu_il}}</dt>

                                <dt class="col-sm-3 about-card-text-style"><i class="fas fa-briefcase"></i></dt>
                                <dt id="user_aboutcard_workspace_info" class="col-sm-9 about-card-text-style">{{$kullanici->ilgi_alani}}</dt>
                            </dl>
                        </div>
                    </div>
                    <!--End of About Card-->
                    <!--Photos Card-->
                    <div class="card rounded gedf-card overflow-hidden">
                        <div class="card-body">
                            <p class="content-left-area-card-title">Fotoğraflar</p>
                        </div>
                        <div class="row" style="padding-left: 10px; padding-right: 10px;">

                            @foreach($fotograf as $entry)
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 photos-card-photo-div">
                                <a id="user-id-image1-link" href="/uploads/image/paylasimfoto/{{$entry->fotograf}}" class="fancybox" rel="ligthbox">
                                    <img id="user-id-image1" src="/uploads/image/paylasimfoto/{{$entry->fotograf}}" class="zoom img-fluid " alt="">

                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!--End of Photos Card-->
                    <!--Friends Card-->
                    <div class=" rounded gedf-card overflow-hidden">
                        <div class="card-body">
                            <p class="content-left-area-card-title">Arkadaşlar</p>
                        </div>
                        <div class="row" style="padding-left: 5px; padding-right: 5px;">

                            @foreach($kullanici->arkadaslar as $entry)

                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 friends-card-friend-div ">
                                <a id="user-uid-friend1-link" href="{{route('profil', $entry->kullanici_adi)}}" class="fancybox" rel="ligthbox">
                                    <img id="user-uid-friend1-img" src="/uploads/image/users/{{$entry->profil_fotografi}}" class="friends-card-img  img-fluid rounded-circle" alt="">
                                    <p id="user-uid-friend1-name_surname" class="friends-card-text-style">{{$entry->ad}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End of Friends Card-->
                </div>
                <div class="col-md-9 gedf-main">

                    <!--- \\\\\\\Create Post-->
                    @if(Auth::user()->id==$kullanici->id)
                @include('katmanlar.postatma')
                    <!-- Create Post /////-->
                @endif



           @foreach($tumpaylasimlar as $entry)


               <!--- \\\\\\\YAZI GÖNDERİ-->
                    @if($entry->paylasim_tipi==1)
                    <div class="card gedf-card rounded overflow-hidden">
                        <div class="card-header ">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img id="post-uid-owner-pp" class="rounded-circle" width="45" src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                            {{$kullanici->ad.' '.$kullanici->soyad}}</div>
                                        <div id="post-uid-owner-username" class="h7 m-0 text-muted">{{"@".$kullanici->kullanici_adi}}</div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="card-body">

                            <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()<59)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()<24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce
                                @endif
                            </div>
                            <p id="post-uid-content-text" class="card-text">
                              {{$entry->metin}}
                            </p>
                        </div>
                        <div class="card-footer">
                            
                            <a id="post-uid-showcomments" class="card-link"><i class="fa fa-comment"></i> Yorumlar</a>
                        </div>

                        <!--Comments-->

                        <!--   <div class="card-footer" id="comments-area"> -->
                        @foreach($entry->yorumlar as $list)
                            <div class="card-footer">
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
                                <p id="comment-content" class="friend_name_surname mt-2" style="text-align: start;">
                                    {{$list->yorum_metni}}
                                </p>
                            </div>
                    @endforeach

                    <!--End of Comments-->
                        <!--Add Comment Area-->
                        <div class="card-footer">
                            <form action="{{route('postyorum')}}" method="POST" class="row justify-content-between">
                                @csrf
                                <input type="hidden" value="{{$entry->id}}" name="post_id">
                                <input type="text" class="form-control mt-sm-2 rounded text-form-color" name="yorum" style="width: 75%;" placeholder="Yorum yap" required>
                                <button  type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                            </form>
                        </div>
                        <!--End of Add Comment Area-->
                    </div>
                    @endif
                    <!--- \\\\\\\YAZI GÖNDERİ-->

                @if($entry->paylasim_tipi==2)
                    <!--- \\\\\\\FOTOĞRAF GÖNDERİSİ-->
                    <div class="card gedf-card rounded overflow-hidden">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img id="post-uid-owner-pp" class="rounded-circle" width="45" src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">{{$kullanici->ad." ".$kullanici->soyad}}</div>
                                        <div id="post-uid-owner-username" class="h7 m-0 text-muted">{{"@".$kullanici->kullanici_adi}}</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">




                            <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()<59)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()<24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce
                                @endif
                            </div>
                            <div class="post-card-image row justify-content-center">
                                @foreach($entry->fotograflar as $list)
                                    <img id="post-uid-image" src="/uploads/image/paylasimfoto/{{$list->fotograf}}" class="img-fluid" alt="">
                                @endforeach

                            </div>
                        </div>
                        <div class="card-footer">

                            <a id="post-uid-showcomments" class="card-link"><i class="fa fa-comment"></i> Yorumlar</a>
                        </div>
                        <!--Comments-->

                        <!--   <div class="card-footer" id="comments-area"> -->
                        @foreach($entry->yorumlar as $list)
                            <div class="card-footer">
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
                                <p id="comment-content" class="friend_name_surname mt-2" style="text-align: start;">
                                    {{$list->yorum_metni}}
                                </p>
                            </div>
                    @endforeach

                    <!--End of Comments-->
                        <!--Add Comment Area-->
                        <div class="card-footer">
                            <form action="{{route('postyorum')}}" method="POST" class="row justify-content-between">
                                @csrf
                                <input type="hidden" value="{{$entry->id}}" name="post_id">
                                <input type="text" class="form-control mt-sm-2 rounded text-form-color" name="yorum" style="width: 75%;" placeholder="Yorum yap" required>
                                <button  type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                            </form>
                        </div>
                        <!--End of Add Comment Area-->
                    </div>
                        <!--- \\\\\\\FOTOĞRAF GÖNDERİSİ-->
                         @endif

                       @if($entry->paylasim_tipi==3)


                    <!--- \\\\\\\Location-->
                    <div class="card gedf-card rounded overflow-hidden">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img id="post-uid-owner-pp" class="rounded-circle" width="45" src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                            {{$kullanici->ad.' '.$kullanici->soyad}}</div>
                                        <div id="post-uid-owner-username" class="h7 m-0 text-muted">{{"@".$kullanici->kullanici_adi}}</div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>


                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-location-arrow"></i> Bir konum paylaştı.</div>
                            <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()<59)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()<24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce
                                @endif
                            </div>

                            <div class="post-card-location-div row justify-content-center">
                                <img id="post-uid-location-image" style="width: 25%" src="../images/location-post-image.png" class="img-fluid" alt="">
                            </div>
                            <div class=" row justify-content-center" style="margin-top: 50px;">
                                <a id="post-uid-location-link" href="https://maps.google.com/?q={{$entry->mekan->enlem}}, {{$entry->mekan->boylam}}"> <button type="button" class="btn btn-light">Konumu Gör</button> </a>
                            </div>


                        </div>
                        <div class="card-footer">

                            <a id="post-uid-showcomments" class="card-link"><i class="fa fa-comment"></i> Yorumlar</a>
                        </div>
                        <!--Comments-->

                        <!--   <div class="card-footer" id="comments-area"> -->
                        @foreach($entry->yorumlar as $list)
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-2 ml-2">
                                        <img class="rounded-circle" width="45" src="/uploads/image/users/{{$list->kullanici->profil_fotografi}}" alt="">                                        </div>
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
                                <p id="comment-content" class="friend_name_surname mt-2" style="text-align: start;">
                                    {{$list->yorum_metni}}
                                </p>
                            </div>

                            @endforeach

                    <!--End of Comments-->
                        <!--Add Comment Area-->
                        <div class="card-footer">
                            <form action="{{route('postyorum')}}" method="POST" class="row justify-content-between">
                                @csrf
                                <input type="hidden" value="{{$entry->id}}" name="post_id">
                                <input type="text" class="form-control mt-sm-2 rounded text-form-color" name="yorum" style="width: 75%;" placeholder="Yorum yap" required>
                                <button  type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                            </form>
                        </div>
                        <!--End of Add Comment Area-->

                    </div>
                    <!-- Post /////-->

                   @endif
                    @endforeach

                     <!--- \\\\\\etkinlik-->
                     @foreach($tumetkinlikler as $entry)


                    <div class="card gedf-card rounded overflow-hidden">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img id="post-uid-owner-pp" class="rounded-circle" width="45" src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                            {{$kullanici->ad.' '.$kullanici->soyad}}</div>
                                        <div id="post-uid-owner-username" class="h7 m-0 text-muted">{{"@".$kullanici->kullanici_adi}}</div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="text-muted h7 mb-2"> <i class="fa fa-calendar"></i> Bir etkinlik oluşturdu.</div>
                            <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()<59)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()<24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce.
                                @endif
                                @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24)
                                    {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce
                                @endif
                            </div>

                            <div id="event-uid-title" class="alert alert-light event-title-style rounded" role="alert">
                                {{$entry->baslik}}
                            </div>

                            <div id="event-uid-location" class="alert alert-warning event-location-style" role="alert">
                                Konum : {{$entry->etkinlik_konumu}}
                            </div>

                            <div id="event-uid-date" class="alert alert-info event-date-style" role="alert">
                                Tarihler : <br>
                                Başlangıç : {{$entry->baslangic_tarihi}}<br> <br>
                                Bitiş : {{$entry->bitis_tarihi}}
                            </div>
                            <div id="event-uid-date" class="alert alert-info event-location-style" role="alert">
                                Katılımcılar : {{count($entry->katilanlar)}}
                            </div>

                            <!--FOTOĞRAF -->
                            <div class='row justify-content-center mb-2 mt-2 mr-2 ml-2'>
                            <img src="/uploads/image/etkinlik/{{$entry->etkinlik_fotografi}}" alt="">
                            </div>
                            <div id="event-uid-content-div" class="alert alert-secondary event-content-div-style rounded" role="alert">
                                <p id="event-uid-content-title" class="event-content-title">Etkinlik Detayları</p>
                                <p id="event-uid-content-paragraph" class="event-content-paragraph">
                                    {{$entry->icerik}}
                                </p>
                            </div>

                        </div>

                        <div class="card-footer row align-items-center">
                            <form action="{{route('etkinlik.katil')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$entry->id}}" name="etkinlik_id">
                            <button type="submit" class="card-link btn btn-info"><i class="fa fa-users"></i> Katıl</button>
                            </form>
                            <a id="post-uid-showcomments" class="card-link ml-2"><i class="fa fa-comment"></i> Yorumlar</a>
                        </div>
                        <!--Comments-->

                     <!--   <div class="card-footer" id="comments-area"> -->
                        @foreach($entry->yorumlarr as $list)
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2 ml-2">
                                    <img class="rounded-circle" width="45" src="/uploads/image/users/{{$list->kullanici->profil_fotografi}}" alt="">                                    </div>
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
                            <p id="comment-content" class="friend_name_surname mt-2" style="text-align: start;">
                            {{$list->yorum_metni}}
                            </p>
                        </div>
                    @endforeach

                        <!--End of Comments-->
                        <!--Add Comment Area-->
                        <div class="card-footer">
                                <form action="{{route('etkinlikyorum')}}" method="POST" class="row justify-content-between">
                                    @csrf
                                    <input type="hidden" value="{{$entry->id}}" name="etkinlik_id">
                                    <input id="specialcurrentusercomment1" type="text" class="form-control mt-sm-2 rounded text-form-color" name="yorum" style="width: 75%;" placeholder="Yorum yap" required>
                                    <button id="confirmspecialcurrentusercomment1" type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                                </form>
                        </div>
                        <!--End of Add Comment Area-->

                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="/assets/js/profile.js"></script>
@endsection
