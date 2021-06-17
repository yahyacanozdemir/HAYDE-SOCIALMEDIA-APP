@extends('katmanlar.master') @section('title', 'Anasayfa') @section('css', '/assets/css/mainPage.css') @section('content')

<!-- POST GÖNDERME-->
<div class="center-fixed-profile-content row">
    <div class="col-md-9 container-fluid gedf-wrapper">
        <!--POST ATMA -->
        @include('katmanlar.postatma')
    </div>
    <!--Upcoming Events Card-->
    <div class="col-md-3 float-right">
        <div class="card rounded gedf-card">
            <div class="card-body">
                <p class="content-left-area-card-title">Yaklaşan Etkinlikler</p>
                <hr style="background-color: rgb(197, 197, 197);"> @foreach($yaklasan_etkinlikler as $entry)
                <div id="upcoming-event-2">
                    <div id="upcoming-event-body-1" class="row card-body justify-content-between mr-3 overflow-hidden">
                        <ul class="upcoming-event-list m-0 p-2">
                            <li class="d-flex align-items-center">
                                <div class="user-img img-fluid"><img id="upcoming-event-img-1" src="/uploads/image/etkinlik/{{$entry->etkinlik_fotografi}}" class="upcoming-event-img"></div>
                                <div class="media-support-info ml-3 ">
                                    <h6 id="upcoming-event-title-1"><a href="../etkinlik/{{$entry->id}}" class="upcoming-event-title">{{$entry->baslik}}</a></h6>
                                    <p id="upcoming-event-desc-1" class="mb-0 upcoming-event-descr  text-truncate">Oluşturan: {{$entry->kullanici->ad}}
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <p1 id="upcoming-event-date-1" class="upcoming-event-date">
                            {{$entry->baslangic_tarihi}}</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- POSTLAR -->
<div class="center-fixed-profile-content">

    <div class="container-fluid gedf-wrapper">

        <div class="row">
            
            <!-- GÖNDERİ YOKSA-->
            @if($post==null or count($post)==0)
            <div class="col-md-9 gedf-main">
                <!-- md-12-->
                <p>HERHANGİ BİR GÖNDERİ BULUNAMADI</p>
            </div>

            @endif @foreach($post as $entry)

            <!--- \\\\\\\YAZI GÖNDERİ-->
            @if($entry->paylasim_tipi==1)
            <div class="col-md-9 gedf-main">
                <div class="card gedf-card rounded overflow-hidden">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="{{route('profil', $entry->kullanici->kullanici_adi)}}"> <img
                                            id="post-uid-owner-pp" class="rounded-circle" width="45"
                                            src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}"
                                            alt=""></a>
                                </div>
                                <div class="ml-2">
                                    <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                        <a href="{{route('profil', $entry->kullanici->kullanici_adi)}}">{{$entry->kullanici->ad.'
                                            '.$entry->kullanici->soyad}}</a>
                                    </div>
                                    <div id="post-uid-owner-username" class="h7 m-0 text-muted"><a href="{{route('profil', $entry->kullanici->kullanici_adi)}}">{{"@".$entry->kullanici->kullanici_adi}}</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="card-body">

                        <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()
                            <59) {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce. @endif @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()
                                <24) {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce. @endif @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24) {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce @endif
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
                                    <div id="commentname" class="h8" style="color: rgb(169, 183, 247);"><a href="{{route('profil', $list->kullanici->kullanici_adi)}}">{{$list->kullanici->kullanici_adi}}</a>
                                    </div>
                                    <div id="commentdate" class="h10 m-0 text-muted">

                                        @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()
                                        <59) {{\Carbon\Carbon::parse($list->created_at)->diffInMinutes()}} dk önce. @endif @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($list->created_at)->diffInHours()
                                            <24) {{\Carbon\Carbon::parse($list->created_at)->diffInHours()}} saat önce. @endif @if(\Carbon\Carbon::parse($list->created_at)->diffInHours()>24) {{\Carbon\Carbon::parse($list->created_at)->diffInDays()}} gün önce @endif
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
                            <button type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                        </form>
                    </div>
                    <!--End of Add Comment Area-->
                </div>
            </div>
            @endif

            
            <!--- \\\\\\\FOTOĞRAF GÖNDERİSİ-->
            @if($entry->paylasim_tipi==2)
            <div class="col-md-9 gedf-main">
                <div class="card gedf-card rounded overflow-hidden">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="{{route('profil', $entry->kullanici->kullanici_adi)}}"> <img
                                            id="post-uid-owner-pp" class="rounded-circle" width="45"
                                            src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}"
                                            alt=""></a>
                                </div>
                                <div class="ml-2">
                                    <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                        <a href="{{route('profil', $entry->kullanici->kullanici_adi)}}">{{$entry->kullanici->ad.'
                                            '.$entry->kullanici->soyad}}</a>
                                    </div>
                                    <div id="post-uid-owner-username" class="h7 m-0 text-muted"><a href="{{route('profil', $entry->kullanici->kullanici_adi)}}">{{"@".$entry->kullanici->kullanici_adi}}</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">

                        <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()
                            <59) {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce. @endif @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()
                                <24) {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce. @endif @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24) {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce @endif
                        </div>
                        <div class="post-card-image row justify-content-center">
                            @foreach($entry->fotograflar as $list)
                            <img id="post-uid-image" src="/uploads/image/paylasimfoto/{{$list->fotograf}}" class="img-fluid" alt=""> @endforeach

                        </div>
                    </div>
                    <div class="card-footer row justify-content-between">
                        <a id="post-uid-showcomments" class="card-link ml-2"><i class="fa fa-comment"></i> Yorumlar</a>
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
                                    <div id="commentname" class="h8" style="color: rgb(169, 183, 247);"><a href="{{route('profil', $list->kullanici->kullanici_adi)}}">{{$list->kullanici->kullanici_adi}}</a>
                                    </div>
                                    <div id="commentdate" class="h10 m-0 text-muted">

                                        @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()
                                        <59) {{\Carbon\Carbon::parse($list->created_at)->diffInMinutes()}} dk önce. @endif @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($list->created_at)->diffInHours()
                                            <24) {{\Carbon\Carbon::parse($list->created_at)->diffInHours()}} saat önce. @endif @if(\Carbon\Carbon::parse($list->created_at)->diffInHours()>24) {{\Carbon\Carbon::parse($list->created_at)->diffInDays()}} gün önce @endif
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
                            <button type="submit" class="btn btn-primary" style="width: 23%; ">Gönder</button>
                        </form>
                    </div>
                    <!--End of Add Comment Area-->
                </div>
            </div>


            @endif 
            @if($entry->paylasim_tipi==3)
            
            <!--- \\\\\\\Location-->
            <div class="col-md-9">
            <div class="card gedf-card rounded overflow-hidden">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img id="post-uid-owner-pp" class="rounded-circle" width="45" src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                            {{$entry->kullanici->ad.' '.$entry->kullanici->soyad}}</div>
                                        <div id="post-uid-owner-username" class="h7 m-0 text-muted">{{"@".$entry->kullanici->kullanici_adi}}</div>
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
                    </div>
     
            @endif 
            @endforeach

            <!--- \\\\\\etkinlik-->
            @foreach($etkinlikler as $entry)
            <div class="col-md-9 gedf-main">
                <div class="card gedf-card rounded overflow-hidden">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <a href="{{route('profil', $entry->kullanici->kullanici_adi)}}"> <img id="post-uid-owner-pp"
                                    class="rounded-circle" width="45"
                                    src="/uploads/image/users/{{$entry->kullanici->profil_fotografi}}" alt=""></a>
                                </div>
                                <div class="ml-2">
                                    <div id="post-uid-owner-name_surname" class="h5" style="color: rgb(169, 183, 247);">
                                        <a href="{{route('profil', $entry->kullanici->kullanici_adi)}}">{{$entry->kullanici->ad.'
                                    '.$entry->kullanici->soyad}}</a>
                                    </div>
                                    <div id="post-uid-owner-username" class="h7 m-0 text-muted"><a href="{{route('profil', $entry->kullanici->kullanici_adi)}}">{{"@".$entry->kullanici->kullanici_adi}}</a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-calendar"></i> Bir etkinlik oluşturdu.</div>
                        <div id="post-uid-elapsed-time" class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()
                            <59) {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce. @endif @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()
                                <24) {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce. @endif @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24) {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce @endif
                        </div>

                        <div id="event-uid-title" class="alert alert-light event-title-style rounded" role="alert">
                            {{$entry->baslik}}
                        </div>

                        <div id="event-uid-location" class="alert alert-warning event-location-style" role="alert">
                            Konum : {{$entry->etkinlik_konumu}}
                        </div>

                        <div id="event-uid-date" class="alert alert-info event-date-style" role="alert">
                            Tarihler : <br> Başlangıç : {{$entry->baslangic_tarihi}}<br> <br> Bitiş : {{$entry->bitis_tarihi}}
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
                                    <img class="rounded-circle" width="45" src="/uploads/image/users/{{$list->kullanici->profil_fotografi}}" alt="">
                                </div>
                                <div class="ml-2">
                                    <div id="commentname" class="h8" style="color: rgb(169, 183, 247);"><a href="{{route('profil', $list->kullanici->kullanici_adi)}}">{{$list->kullanici->kullanici_adi}}</a>
                                    </div>
                                    <div id="commentdate" class="h10 m-0 text-muted">

                                        @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()
                                        <59) {{\Carbon\Carbon::parse($list->created_at)->diffInMinutes()}} dk önce. @endif @if(\Carbon\Carbon::parse($list->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($list->created_at)->diffInHours()
                                            <24) {{\Carbon\Carbon::parse($list->created_at)->diffInHours()}} saat önce. @endif @if(\Carbon\Carbon::parse($list->created_at)->diffInHours()>24) {{\Carbon\Carbon::parse($list->created_at)->diffInDays()}} gün önce @endif
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
            </div>
            @endforeach

        </div>
        <!-- Post /////-->

    </div>

</div>




@endsection 

@section('script')
    <script src="/assets/js/mainPage.js"></script>
@endsection