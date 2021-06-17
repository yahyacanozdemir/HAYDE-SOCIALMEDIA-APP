<?php $__env->startSection('title', 'Ayarlar'); ?>
<?php $__env->startSection('css', '/assets/css/settings.css'); ?>

<?php $__env->startSection('content'); ?>

    <h2 id="pageTitle">Ayarlar</h2>

    <div class="container">
        <hr class="rounded" style="background-color: rgb(119, 137, 182);">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-around" id="myTab" role="tablist">
                        <li class="content-nav-item">
                            <a class="nav-link active" id="profilesettings-tab-link" data-toggle="tab" href="#profilesettings-tab-content" role="tab" aria-controls="profilesettings-tab-content" aria-selected="true">Profil Seçenekleri</a>
                        </li>
                        <li class="content-nav-item">
                            <a class="nav-link " id="accountsettings-tab-link" data-toggle="tab" href="#accountsettings-tab-content" role="tab" aria-controls="accountsettings-tab-content" aria-selected="true">Hesap Ayarları</a>
                        </li>
                        <li class="content-nav-item">
                            <a class="nav-link" id="securitysettings-tab-link" data-toggle="tab" role="tab" href="#securitysettings-tab-content" aria-controls="securitysettings-tab-content" aria-selected="false">Güvenlik Ayarları</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active rounded custom-tab-content" id="profilesettings-tab-content" role="tabpanel" aria-labelledby="profilesettings-tab-content">
                            <form action="<?php echo e(route('ayarlar.kaydet')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                            <div class="row profilpicarea align-items-center">
                                <input type="file" name="profilfoto" class="editpp editphoto" accept="image/*" onchange="loadprofilephoto(event)" title="Profil resmini değiştir." />
                                <p class="editppicon editphotoicon">&#9998;</p>
                                <a href="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>" class="fancybox" rel="ligthbox">
                                    <img src="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>" class="profilepic zoom img-fluid rounded-circle" alt="">
                                </a>
                                <p id="usernamearea" class="text-truncate"><?php echo e($user->kullanici_adi); ?></p>
                            </div>

                            <div class="row tab-content-custom-row justify-content-around">
                                <div class="col-sm-4 justify-content-between">
                                    <p class="inputlabel">İsim</p>
                                    <input id="getnameinput" value="<?php echo e($userglobal->ad); ?>" class="form-control textinputstyle rounded" type="text" name="ad">
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Soyisim</p>
                                    <input id="getsurnameinput" value="<?php echo e($userglobal->soyad); ?>" class="form-control textinputstyle rounded" type="text" name="soyad">
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Yaş</p>
                                    <input id="getagenput" value="<?php echo e($userglobal->yas); ?>" class="form-control textinputstyle rounded" type="text"  >
                                </div>
                            </div>

                            <div class="row tab-content-custom-row justify-content-around">
                                <div class="col-sm-4 justify-content-between">
                                    <p class="inputlabel">Uyruk</p>
                                    <input value="<?php echo e($userglobal->uyruk); ?>" id="getcountryinput" class="form-control textinputstyle rounded" type="text" >
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Şehir</p>
                                    <input value="<?php echo e($userglobal->bulundugu_il); ?>" id="getcityinput" class="form-control textinputstyle rounded" type="text" name="bulundugu_il" >
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">İlçe</p>
                                    <input value="<?php echo e($userglobal->bulundugu_ilce); ?>" id="getstateinput" class="form-control textinputstyle rounded" type="text" name="bulundugu_ilce" >
                                </div>
                            </div>

                            <div class="row tab-content-custom-row justify-content-around">
                                <div class="col-sm-4 justify-content-between">
                                    <p class="inputlabel">Bölüm</p>
                                    <input value="<?php echo e($userglobal->bolum_bilgisi); ?>" id="getdepartmantinput" class="form-control textinputstyle rounded" type="text" name="bolum_bilgisi" >
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Sınıf</p>
                                    <input value="<?php echo e($userglobal->sinif_bilgisi); ?>" id="getgradeinput" class="form-control textinputstyle rounded" type="text" name="sinif_bilgisi" >
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">İlgi Alanı</p>
                                    <input  value="<?php echo e($userglobal->ilgi_alani); ?>" id="getworkspaceinput" class="form-control textinputstyle rounded" type="text" name="ilgi_alani" >
                                </div>
                            </div>

                            <div class="row tab-content-custom-row justify-content-around">
                                <div class="col-sm-3 justify-content-between">
                                    <p class="inputlabel">Facebook</p>
                                    <input placeholder="Facebook linki gir."  id="getfacebookadressinput" class="form-control textinputstyle rounded" type="text" name="f" >
                                </div>
                                <div class="col-sm-3">
                                    <p class="inputlabel">Twitter</p>
                                    <input placeholder="Twitter linki gir."  id="gettwitteraddressinput" class="form-control textinputstyle rounded" type="text" name="t" >
                                </div>
                                <div class="col-sm-3">
                                    <p class="inputlabel">Linkedin</p>
                                    <input placeholder="Linkedin linki gir."  id="getlinkedinaddressinput" class="form-control textinputstyle rounded" type="text" name="l" >
                                </div>
                                <div class="col-sm-3">
                                    <p class="inputlabel">İnstagram</p>
                                    <input placeholder="Instagram linki gir." id="getinstagramaddressinput" class="form-control textinputstyle rounded" type="text" name="i" >
                                </div>
                            </div>

                            <div class="row tab-content-custom-row justify-content-center">
                                <button id="save-tab1-buton" type="submit" class="btn btn-primary rounded tabbutton mr-2">Kaydet</button>

                            </div>
                            </form>
                        </div>

                        <div class="tab-pane fade rounded custom-tab-content" id="accountsettings-tab-content" role="tabpane2" aria-labelledby="accountsettings-tab-content">
                            <form action="<?php echo e(route('ayarlar.guvenlik.kaydet')); ?>" method="POST" id="hesap_ayarlari">
                                <?php echo csrf_field(); ?>
                            <div class="row profilpicarea align-items-center">
                                <img src="/padlock.png" class="profilepic zoom img-fluid" alt="">
                            </div>

                            <div class="row tab-content-custom-row justify-content-around">
                                <div class="col-sm-4 justify-content-between">
                                    <p class="inputlabel">Mevcut Şifre</p>
                                    <input id="getcurrentpassword" name="old_password" class="form-control textinputstyle rounded" type="password" placeholder="********">
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Yeni Şifre</p>
                                    <input id="getnewpassword" class="form-control textinputstyle rounded" name="password" type="password" placeholder="">
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Yeni Şifreyi Doğrula</p>
                                    <input id="getagainnewpassword" class="form-control textinputstyle rounded" name="password_confirmation" type="password" placeholder="">
                                </div>
                            </div>

                            <div class="row tab-content-custom-row justify-content-around">
                                <div class="col-sm-4 justify-content-between">
                                    <p class="inputlabel">Kullanıcı Adı</p>
                                    <!--<p1 id="usernamevalue" class="inputlabel">yahyacanozdemir</p1>-->
                                    <input value="<?php echo e($userglobal->kullanici_adi); ?>" name='kullanici_adi' id="getnewusername" class="form-control textinputstyle rounded" type="text" >
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">Birincil E-Posta</p>
                                    <input value="<?php echo e($userglobal->email); ?>" id="getemail1" class="form-control textinputstyle rounded" type="text" placeholder="183608590..@ogrenci.btu.edu.tr">
                                </div>
                                <div class="col-sm-4">
                                    <p class="inputlabel">İkinci E-Posta</p>
                                    <input value="<?php echo e($userglobal->kisisel_eposta_adresi); ?>" name='kisisel_eposta_adresi' id="getemail2" class="form-control textinputstyle rounded" type="text" placeholder="ozelmailadresiniz@example.com">
                                </div>
                            </div>

                            <div class="row tab-content-custom-row justify-content-between">
                                <div class="col-sm-4 justify-content-between">
                                    <p class="inputlabel">Telefon Numarası</p>
                                    <input value="<?php echo e($userglobal->telefon); ?>" id="getnewphone" class="form-control textinputstyle rounded" type="text">
                                </div>

                            </div>

                            <div class="row tab-content-custom-row justify-content-center">

                                <button id="save-tab2-buton" form="hesap_ayarlari" type="submit" class="btn btn-primary rounded tabbutton mr-2">Kaydet</button>
                                <button id="cancel-tab2-buton" type="button" class="btn btn-secondary rounded tabbutton">İptal</button>
                            </div>
                            </form>
                        </div>

                        <div class="tab-pane fade rounded custom-tab-content" id="securitysettings-tab-content" role="tabpane3" aria-labelledby="securitysettings-tab-content">

                            <div class="row profilpicarea align-items-center">
                                <img src="shield.png" class="profilepic zoom img-fluid" alt="">
                            </div>

                            <div class="row justify-content-around ">
                                <div class="col-sm-6 al mt-4">
                                    <div class="form-group">
                                        <label class="h4 mr-4 tab3-rowtitle" for="sw">Giriş Bildirimleri</label>
                                        <div class="custom-control custom-switch d-inline " id="accessnotificdiv">
                                            <input type="checkbox" class="custom-control-input" id="accessnotificsw" name="extra_block" value="">
                                            <label class="custom-control-label" for="accessnotificsw"></label>
                                        </div>
                                    </div>
                                    <p1 class="tab3-optionstext">Uygulamaya her girişte e-posta adresime bir doğrulama maili gönder.</p1>

                                </div>
                                <div class="col-sm-6 mt-4">
                                    <div class="form-group">
                                        <label class="h4 mr-4 tab3-rowtitle" for="passwordnotificdiv">Şifre Değişikliği</label>
                                        <div class="custom-control custom-switch d-inline" id="passwordnotificdiv">
                                            <input type="checkbox" class="custom-control-input" id="passwordnotificsw" name="extra_block" value="">
                                            <label class="custom-control-label" for="passwordnotificsw"></label>
                                        </div>
                                    </div>
                                    <p1 class="tab3-optionstext">Şifre değiştirme işlemi esnasında e-posta adresime bir doğrulama maili gönder.</p1>
                                </div>
                            </div>

                            <div class="row justify-content-between mt-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="h4 mr-4 tab3-rowtitle" for="finishsessiondiv">Oturum Sonlandır</label>
                                        <div class="custom-control custom-switch d-inline" id="finishsessiondiv">
                                            <input type="checkbox" class="custom-control-input" id="finishsessionsw" name="extra_block" value="">
                                            <label class="custom-control-label" for="finishsessionsw"></label>
                                        </div>
                                    </div>
                                    <p1 class="tab3-optionstext">Belirli bir süre (30 dakika) işlem yapılmadığında hali hazırda açık olan oturumumu sonlandır.</p1>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row footer-div justify-content-center align-items-center">
        <!-- ÇIKIŞ YAPMA -->
        <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
        </form>
        <a class="btn btn-danger rounded tabbutton" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i>Çıkış</a>
        <!-- ÇIKIŞ YAPMA -->
    </div>

    <div class="row footer-div justify-content-center align-items-center">
        <img id="footer-logo" src="../images/hayde-title-100-50.png">
        <p1 id="footer-title">2021 Tüm Hakları Saklıdır</p1>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Uyarı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <p1 id="modalContent">
                        SFASFASFASFASF
                    </p1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="modalDismissButton" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="/assets/js/settings.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('katmanlar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yahya/Desktop/HAYDE-SOCIALMEDIA-APP/resources/views/ayarlar.blade.php ENDPATH**/ ?>