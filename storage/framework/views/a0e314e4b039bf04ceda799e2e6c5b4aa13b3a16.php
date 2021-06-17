<!--Navbar-->
<nav class="navbar navbar-dark navbar-expand-md  hayde-navbar">
    <div class="container-fluid">
        <a href="<?php echo e(route('profil', $userglobal->kullanici_adi)); ?>"><img class="rounded-circle z-depth-2 ml-sm-1" id="navbar-user-profil-photo" style="height: 50px; width: 50px;" src="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>"
                                               data-holder-rendered="true"></img></a>
        <a href=""><img id="hayde-logo-collapsed"  src="images/hayde-title-100-50.png"></img></a>
        <p class="text-capitalize" id="navbar-user-name-surname-text"> <a href="<?php echo e(route('profil', $userglobal->kullanici_adi)); ?>"><?php echo e(Auth::user()->ad); ?></a></p>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="navcol-1">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a href="<?php echo e(route('profil', $userglobal->kullanici_adi)); ?>"><img class="z-depth-2 ml-sm-4 mt-sm-1 navbar-button-texts" id="friend-requests-button" style="height: 27px; width: 22px;" src="/images/profile.png"></a>
                    <p1 class="navbar-button-texts"><a href="<?php echo e(route('profil', $userglobal->kullanici_adi)); ?>">Profil</a></p1>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo e(route('arkadaslikistekleri')); ?>"><img class="z-depth-2 ml-sm-4 mt-sm-1" id="friend-requests-button" style="height: 25px; width: 25px;" src="/images/friend-request.png"></a>
                    <p1 class="navbar-button-texts"><a href="<?php echo e(route('arkadaslikistekleri')); ?>">Arkadaşlık İstekleri</a></p1>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('bildirimler')); ?>"><img class="z-depth-2 ml-sm-4 mt-sm-1" id="notification-button" style="height: 25px; width: 25px;" src="/images/notification.png"></a>
                    <p1 class="navbar-button-texts"><a href="<?php echo e(route('bildirimler')); ?>">Bildirimler</a></p1>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('ayarlar')); ?>"> <img class="z-depth-2 ml-sm-4 mt-sm-1  mr-sm-4" id="settings-button" style="height: 25px; width: 25px;" src="/images/settings.png"></a>
                    <p1 class="navbar-button-texts"><a href="<?php echo e(route('ayarlar')); ?>">Ayarlar</a></p1>
                </li>
                <li class="nav-item">
                    <!-- ÇIKIŞ YAPMA -->
                    <!--- <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                    </form>
                    <a class="btn btn-danger rounded tabbutton" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i>Çıkış</a>
                    <p1 class="navbar-button-texts"><a class="btn btn-danger rounded tabbutton" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a></p1>
                  -------------------------------------->
                     <!-- ÇIKIŞ YAPMA -->
                </li>
            </ul>
            <ul class="nav navbar-nav text-right text-white ml-auto">

                <form action="<?php echo e(route('arama')); ?>" method="get" class="form-inline my-2 my-lg-0 my-lg-0">
                    <?php echo csrf_field(); ?>
                    <input class="form-control mr-sm-2" id="navbar-search-input" type="text" name="aranan" placeholder="Hayde Bir Şeyler Ara..." aria-label="Search" style="width: 300px;">
                    <button class="btn btn-info my-2 my-sm-0" type="submit">Ara</button>
                </form>

            </ul>
            <ul class="nav navbar-nav text-right text-white ml-auto">
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"></li>
                <li class="navbar-brand" role="presentation"><a class="nav-link" href="<?php echo e(route('anasayfa')); ?>"><img id="hayde-logo-expanded" src="/images/hayde-title-100-50.png" ></a>
                </li>
                <li class="nav-item" role="presentation"></li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\hayde\resources\views/katmanlar/navbar.blade.php ENDPATH**/ ?>