<?php if( $errors ) : ?>
    <div class="col-12">
        <?php foreach( $errors as $error ) : ?>
            <div class="alert alert-<?= $status; ?> alert-dismissible fade show" role="alert">
                <?= $error; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>