<?php $__env->startSection('title', 'Bildirimler'); ?>
<?php $__env->startSection('css', '/assets/css/notifications.css'); ?>

<?php $__env->startSection('content'); ?>
    <h2 id="pageTitle">Bildirimler</h2>

    <div class="container">
        <hr class="rounded" style="background-color: rgb(119, 137, 182);">
        <div class="row">
            <div class="col-sm-12">


                <?php $__currentLoopData = $bildirimler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="notific-div-1" class="card">
                    <div id="notific-body-1" class="row card-body justify-content-between mr-3">
                        <ul class="notification-list m-0 p-2">
                            <li class="d-flex align-items-center">
                                <div class="user-img img-fluid"><i class="fas fa-bell"></i></div>
                                <div class="media-support-info ml-3">
                                    <h6 id="notific-title-1"><?php echo e($entry->bildirim_icerigi); ?></h6>
                                    <p id="notific-date-1" class="mb-0">


                                        <?php if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()<59): ?>
                                            <?php echo e(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()); ?> dk önce.
                                        <?php endif; ?>
                                        <?php if(\Carbon\Carbon::parse($entry->created_at)->diffInMinutes()>60 && \Carbon\Carbon::parse($entry->created_at)->diffInHours()<24): ?>
                                            <?php echo e(\Carbon\Carbon::parse($entry->created_at)->diffInHours()); ?> saat önce.
                                        <?php endif; ?>
                                        <?php if(\Carbon\Carbon::parse($entry->created_at)->diffInHours()>24): ?>
                                            <?php echo e(\Carbon\Carbon::parse($entry->created_at)->diffInDays()); ?> gün önce
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <form action="<?php echo e(route('bildirimler.sil')); ?>" method="POST" id="bildirim_<?php echo e($entry->id); ?>">
                            <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($entry->id); ?>" name="id">
                        <button type="submit" class="btn btn-info rounded btn-sm mt-3 mb-3" form="bildirim_<?php echo e($entry->id); ?>">Bildirimi sil</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                <?php if(count($bildirimler)==0): ?>
                <div>
                    <h3 id="message">Şuan için başka bildirim bulunmamaktadır.</h3>
                </div>
                    <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="/assets/js/notifications.js"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('katmanlar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yahya/Desktop/HaydeFinalOperations/resources/views/bildirimler.blade.php ENDPATH**/ ?>