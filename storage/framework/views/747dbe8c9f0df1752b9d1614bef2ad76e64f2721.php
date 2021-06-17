<?php $__env->startSection('title', 'Arama Sonuçları'); ?>
<?php $__env->startSection('css', '/assets/css/aramaSonuclari.css'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php $__currentLoopData = $aramauser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card-box">
            <div class="card-img">
                <img src="/uploads/image/users/<?php echo e($entry->profil_fotografi); ?>" alt="">
            </div>
            <div class="card-content">
                <span><?php echo e($entry->kullanici_adi); ?></span>
                <h3><strong><a class="btn btn-blue" href="<?php echo e(route('profil', $entry->kullanici_adi)); ?>">PROFİLE GİT</a></strong></h3>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('katmanlar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yahya/Desktop/HAYDE-SOCIALMEDIA-APP/resources/views/aramasonuc.blade.php ENDPATH**/ ?>