<div class="row">
    <div class="col-md-12 gedf-main">
        <div id="createpostarea" class="card gedf-card rounded  ">
            <p id="create-post-card-title"> Gönderi Oluştur</p>
            <!---gizli form--->

            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Durum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="event-tab" data-toggle="tab" href="#event" role="tab" aria-controls="posts" aria-selected="true">Etkinlik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Fotoğraf</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="location-tab" data-toggle="tab" role="tab" aria-controls="location" aria-selected="false" href="#location">Konum</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                        <!---DURUM--->
                        <form action="<?php echo e(route('post')); ?>" method="POST" >
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <img src="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>" class="create-post-profile-pic " /> </div>
                                    <textarea id="createPostMessage" name="durumbox" class="form-control text-form-color rounded" rows="3" placeholder="Günün nasıl geçiyor?" required></textarea>
                                </div>
                                <button id="createPostMessageButton" type="submit"  class="btn btn-primary" style="margin-left: 120px;">Paylaş</button>
                            </div>
                        </form>

                    </div>

                    <!---etkinlik--->
                    <div class="tab-pane fade" id="event" role="tabpane2" aria-labelledby="event-tab">

                        <div class="form">
                            <form action="<?php echo e(route('post')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="input-group mb-3 justify-content-around">
                                    <div class="input-group-prepend">
                                        <img src="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>" class="create-post-profile-pic " />
                                    </div>
                                    <div class="row col-lg-12">
                                        <input id="createEventTitle" name="etkba" type="text" class="form-control mt-sm-2 rounded text-form-color" placeholder="Etkinlik başlığı" required>
                                        <input id="createEventLocation" name="etkko" type="text" class="form-control mt-sm-2 rounded text-form-color" placeholder="Etkinlik konumu" required>
                                        <label for="etkbta" class='text-form-color ' style='display:inline-block; padding-top:20px; padding-left:10px; '>Başlangıç</label>
                                        <input id="createEventDate" name="etkbta" type="datetime-local" class="form-control mt-sm-2 rounded text-form-color" placeholder="Etkinlik Başlangıç tarihi" required>
                                        <label for="etkbitta" class='text-form-color ' style='display:inline-block; padding-top:20px; padding-left:10px;'>Bitiş</label>
                                        <input id="createEventDate" name="etkbitta" type="datetime-local" class="form-control mt-sm-2 rounded text-form-color" placeholder="Etkinlik Bitiş tarihi" required>
                                        <textarea id="createEventAbout" name="etkde" class="form-control text-form-color rounded mt-sm-3" rows="3" placeholder="Etkinlik detayları" required></textarea>                                        
                                        <label class="text-form-color m-auto" style='display:inline-block; padding-top:50px; ' for="createPostImage" >
                                            Fotograf Yukle
                                        </label>
                                        <input id="createPostImage" type="file" name="etkinlikfoto" id="etkinlikfoto" style='color:white'  class="custom-file-input text-form-color rounded" title='Fotograf Yukle'>
                                        
                                    </div>
                                </div>
                                <div class="row justify-content-around">
                                    <button id="createEventButton" type="submit" class="btn btn-primary">Paylaş</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!--forograf-->
                    <div class="tab-pane fade" id="images" role="tabpane3" aria-labelledby="images-tab">
                        <div class="form">
                            <div class="input-group justify-content-between">
                                <div class="input-group-prepend">
                                    <img src="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>" class="create-post-profile-pic " /> </div>
                                <div class="custom-file" style="margin-top: 30px;">
                                    <form action="<?php echo e(route('post')); ?>" enctype="multipart/form-data" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <!-- <input type="file" name="etkfoto">-->
                                        <input id="createPostImage" type="file" name="etkfoto[]" id="etkfoto"  class="custom-file-input text-form-color rounded" multiple required>
                                        <label class="custom-file-label" for="customFile">Fotoğraf seç</label>
                                        <button id="createImageButton" type="submit" class="btn btn-primary" style="margin-left: 0px; margin-top: 50px;">Paylaş</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="py-4"></div>
                        <!----konum--->
                    </div>
                    <!---KONUM--->
                    <div class="tab-pane fade" id="location" role="tabpane4" aria-labelledby="location-tab">
                        <form action="<?php echo e(route('post')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form">

                                <div class="input-group mb-3 justify-content-around">
                                    <div class="input-group-prepend">
                                        <img src="/uploads/image/users/<?php echo e($userglobal->profil_fotografi); ?>" class="create-post-profile-pic " />
                                    </div>
                                    <div class="row col-lg-12">
                                        <input id="takeLocationInput" name="lokasyon" type="text" class="form-control mt-sm-2 rounded text-form-color" placeholder="Şu an neredesiniz ?" required>
                                    </div>
                                </div>

                                <div class="row justify-content-around">
                                    <button id="selectLocationButton" name="lokasyon"  class="btn btn-primary" onclick="getLocation()">Konum Seç</button>
                                </div>
                                <div class="row justify-content-around mt-2">
                                    <button id="createLocationPostButton" type="submit" class="btn btn-primary">Paylaş</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php /**PATH C:\hayde\resources\views/katmanlar/postatma.blade.php ENDPATH**/ ?>