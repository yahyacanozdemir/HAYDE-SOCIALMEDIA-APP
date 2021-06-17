<p>Merhaba, <b><?php echo e($emails['name']); ?> !</b> <br/>Hayde Hoşgeldin ! </p>
<p><?php echo e($emails['message']); ?>.</p>
<a href="http://127.0.0.1:8000/verify?code=<?php echo e($emails['verificationcode']); ?>">Tıkla ve Doğrula</a><?php /**PATH /home/yahya/Desktop/HAYDE-SOCIALMEDIA-APP/resources/views/email_template.blade.php ENDPATH**/ ?>