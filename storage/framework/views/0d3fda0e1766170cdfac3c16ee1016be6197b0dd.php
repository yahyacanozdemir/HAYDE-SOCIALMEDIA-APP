
<!-- PopUp -->
<?php if(session()->has('mesaj')): ?>
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
                    <?php echo e(session('mesaj')); ?>

                </p1>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalDismissButton" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\hayde\resources\views/katmanlar/alert.blade.php ENDPATH**/ ?>