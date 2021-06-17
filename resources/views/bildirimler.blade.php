@extends('katmanlar.master')
@section('title', 'Bildirimler')
@section('css', '/assets/css/notifications.css')

@section('content')
    <h2 id="pageTitle">Bildirimler</h2>

    <div class="container">
        <hr class="rounded" style="background-color: rgb(119, 137, 182);">
        <div class="row">
            <div class="col-sm-12">


                @foreach($bildirimler as $entry)
                <div id="notific-div-1" class="card">
                    <div id="notific-body-1" class="row card-body justify-content-between mr-3">
                        <ul class="notification-list m-0 p-2">
                            <li class="d-flex align-items-center">
                                <div class="user-img img-fluid"><i class="fas fa-bell"></i></div>
                                <div class="media-support-info ml-3">
                                    <h6 id="notific-title-1">{{$entry->bildirim_icerigi}}</h6>
                                    <p id="notific-date-1" class="mb-0">


                                        @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()<59)
                                            {{\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()}} dk önce.
                                        @endif
                                        @if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()<24)
                                            {{\Carbon\Carbon::parse($entry->created_at)->diffInHours()}} saat önce.
                                        @endif
                                        @if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24)
                                            {{\Carbon\Carbon::parse($entry->created_at)->diffInDays()}} gün önce
                                        @endif
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <form action="{{route('bildirimler.sil')}}" method="POST" id="bildirim_{{$entry->id}}">
                            @csrf
                        <input type="hidden" value="{{$entry->id}}" name="id">
                        <button type="submit" class="btn btn-info rounded btn-sm mt-3 mb-3" form="bildirim_{{$entry->id}}">Bildirimi sil</button>
                        </form>
                    </div>
                </div>
                @endforeach



                @if(count($bildirimler)==0)
                <div>
                    <h3 id="message">Şuan için başka bildirim bulunmamaktadır.</h3>
                </div>
                    @endif

            </div>
        </div>
    </div>

    <script src="/assets/js/notifications.js"></script>
    @endsection
