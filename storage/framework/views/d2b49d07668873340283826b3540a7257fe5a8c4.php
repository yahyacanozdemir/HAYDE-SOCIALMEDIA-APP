<?php $__env->startSection('title', 'Arkadaşlık İstekleri'); ?>
<?php $__env->startSection('css', '/assets/css/friendRequests.css'); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="col-sm-12">
        <div class="rounded custom-card-area-bg mt-4">
            <h4 id="page-title">Arkadaşlık İstekleri</h4>

            <?php $__currentLoopData = $userglobal->arkadaslikistekleri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="a-friend-request-div1">
                <hr>
                <div class="row a-friend-request-line justify-content-between">
                    <ul class="friend-list m-0 p-0">
                        <li class="d-flex align-items-center">
                            <div class="user-img  img-fluid"><img id="friend-request-1-img" src="/uploads/image/users/<?php echo e($list->gonderen->profil_fotografi); ?>" class="rounded-circle avatar-40 friend-img"></div>
                            <div class="media-support-info ml-3">
                                <h6 id="friend-request-1-name"><a href="<?php echo e(route('profil', $list->gonderen->kullanici_adi)); ?>"><?php echo e($list->gonderen->ad); ?></a></h6>
                            </div>
                        </li>
                    </ul>
                    <div class="friend-buttons-area">
                        <form action="<?php echo e(route('arkadas.ekle.kabul')); ?>" method="POST" id="kabul_<?php echo e($list->id); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="kullanici_id" value="<?php echo e($list->gonderen->id); ?>">
                            <input type="hidden" name="istek_id" value="<?php echo e($list->id); ?>">
                        </form>
                        <form action="<?php echo e(route('arkadas.ekle.red')); ?>" method="POST" id="red_<?php echo e($list->id); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="istek_id" value="<?php echo e($list->id); ?>">
                        </form>

                        <button form="kabul_<?php echo e($list->id); ?>" type="submit" class="btn btn-primary rounded confirm-button">Onayla</button>
                        <button form="red_<?php echo e($list->id); ?>" type="submit" class="btn btn-secondary rounded ignore-button">Reddet</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php if(count($userglobal->arkadaslikistekleri)==0): ?>
            <div>
                <h3 id="message">Şuan için başka arkadaşlık isteğin bulunmamaktadır.</h3>
            </div>
                <?php endif; ?>


        </div>
    </div>
</div>
<script src="/assets/js/friendRequests.js"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('katmanlar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yahya/Desktop/HAYDE-SOCIALMEDIA-APP/resources/views/arkadaslikistekleri.blade.php ENDPATH**/ ?>