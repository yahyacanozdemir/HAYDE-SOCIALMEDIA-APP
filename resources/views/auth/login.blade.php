<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hoşgeldin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/SignInSignUp.css">
</head>

<body>

@if ($errors->any())
                             
                                      
                             @foreach ($errors->all() as $error)
                                   
                   <div class="alert alert-warning alert-white rounded">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <div class="icon"><i class="fa fa-warning"></i></div>
    <strong>Uyarı!</strong> {{$error}}
</div>
                              @endforeach
                             @endif




<div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>



<div class="container tumalan">
<!--@if($errors->any()) {!! implode('', $errors->all('<div>:message</div>')) !!} @endif -->
    <div class="row align-items-center ">
        <div class="flip-box col-md-5">
            <div class="flip-box-inner">
                <div id="flip-box-front" class="flip-box-front">
                    <div class="col-md-12">
                        <h1 class="mb-0 title">Giriş Yap</h1>
                        <br>
                        <p class="text">Hayde ile etkinliklere katıl, yeni bağlantılar kur ve sosyal bir hayat
                            kazan.</p>
                        <form class="mt-4" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="inputLabel title">E-Mail Adresi</label>
                                <input id="SignInMail" type="email" class="form-control mb-0 login-input"
                                       placeholder="Bir e-mail adresi gir" name="email" required>
                            </div>
                            <div class="form-group mt-4">
                                <label class="inputLabel title">Şifre</label>
                                <a id="ForgotPasswordButton" class="float-right">Şifremi unuttum</a>
                                <input type="password" class="form-control mb-0 login-input" id="SignInPassword"
                                       placeholder="Bir şifre gir" name="password" required>
                            </div>
                            <div class="d-inline-block w-100 inputLabel">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 ">
                                    <!---          <input type="checkbox" class="custom-control-input" id="RememberMe">--->
                                    <!---               <label class="custom-control-label text " for="RememberMe">Beni hatırla</label>-->
                                </div>
                                <button id="SignInButton" type="submit" class="btn btn-primary float-right">Giriş
                                    Yap</button>
                            </div>
                            <div class="sign-info inputLabel">
                                    <span class="dark-color d-inline-block line-height-2 text mt-2">Henüz hesabın yok
                                        mu? <a id="flipToSignUp" href="#">Kaydol.</a></span>
                            </div>
                        </form>
                    </div>

                </div>
                <div id="flip-box-back" class="flip-box-back">
                    <div class="col-md-12">
                        <h1 class="title">Kaydol</h1>
                        <br>
                        <p class="text mt-0">Hayde ile etkinliklere katıl, yeni bağlantılar kur ve sosyal bir hayat
                            kazan.</p>
                        <form class="mt-0" action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label class="inputLabel title" for="exampleInputEmail1">Adın</label>
                                    <input id="SıgnUpName" type="text" class="form-control mb-0 login-input" value=""
                                           placeholder="Bir isim gir" name="ad" required>
                                </div>
                                <div class="form-group col-md-6 ml-0">
                                    <label class="inputLabel title" for="exampleInputPassword1">Soyadın</label>
                                    <input type="text" class="form-control mb-0 login-input" id="SıgnUpSurname" value=""
                                           placeholder="Bir soyisim gir" name="soyad" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 mt-0">
                                    <label class="inputLabel title" for="exampleInputPassword1">E-Mail
                                        Adresi</label>
                                    <input type="email" class="form-control mb-0 login-input" id="SıgnUpMail" value=""
                                           placeholder="Bir e-posta adresi gir" name="email"required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 mt-0">
                                    <label class="inputLabel title" for="exampleInputPassword1">Şifre</label>
                                    <input type="password" class="form-control mb-0 login-input" id="SıgnUpPassword" value=""
                                           placeholder="Bir şifre oluştur" name="password" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 mt-0">
                                    <label class="inputLabel title" for="exampleInputPassword1">Şifre
                                        (Tekrar)</label>
                                    <input type="password" class="form-control mb-0 login-input" value=""
                                           id="SıgnUpPasswordAgain" placeholder="Şifreyi yeniden gir" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="w-100 inputLabel ">
                                    <span class="dark-color d-inline-block line-height-2 text mt-2">Halihazırda bir
                                        hesabın mı var ? <a id="flipToSignIn" href="#">Giriş Yap.</a></span>
                                <button id="SignUpButton" type="submit"
                                        class="btn btn-primary float-right mb-4">Kaydol</button>
                            </div>   <!---onclick="signUpControl()"-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 ">
        </div>
        <div class="logodiv col-md-6">
            <img class="img-responsive logo" id="logo" src="images/HAYDE.png">
        </div>
    </div>
</div>

<!-- PopUp -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Mail Kutunu Kontrol Et</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <input type="email" class="form-control mb-0 login-input" value=""
                       id="forgetPasswordMailValue" placeholder="Bir e-posta adresi gir" style="display: none;" required>
                <p1 id="modalContent">
                    Hayde'ye kayıt işlemini tamamlamak için e-posta adresine bir doğrulama maili gönderildi.
                </p1>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalDismissButton" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" id="modalConfirmButton" onclick="popUpConfirmButtonFunc()">Mail Giriş</button>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/SigIn-SignUp-Script.js"></script>

</body>

</html>
