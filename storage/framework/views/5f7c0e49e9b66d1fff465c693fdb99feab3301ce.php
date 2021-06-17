<p>Merhaba, <br/>Yeni kullanıcı <b><?php echo e($emails['name']); ?></b></p>
<p><?php echo e($emails['message']); ?>.</p>
<a href="http://127.0.0.1:8000/verify?code=<?php echo e($emails['verificationcode']); ?>">Tıkla ve Doğrula</a><?php /**PATH /home/yahya/Desktop/HaydeFinalOperations/resources/views/email_template.blade.php ENDPATH**/ ?>