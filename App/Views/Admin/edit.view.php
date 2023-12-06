<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

use App\Models\Post;

?>
<?php

if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('post.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['post']?->getId() ?>">

    <!-- text (Nazov) -->
    <label for="post-nazov" class="form-label">Názov príspevku</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="nazov" id="post-nazov" value="<?= @$data['post']?->getNazov() ?>">
    </div>

    <!-- text (Popis) -->
    <label for="post-popis" class="form-label">Text príspevku</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="popis" id="post-popis" value="<?= @$data['post']?->getPopis() ?>">
    </div>

    <!-- date (Datum Publikovania) -->
    <label for="post-date" class="form-label">Dátum publikovania</label>
    <div class="input-group has-validation mb-3 ">
        <input type="date" class="form-control" name="date" id="post-date"
               value="<?= @$data['post']?->getDatumPublikovania() ?>">
    </div>

    <!-- url (Zdroj) -->
    <label for="post-url" class="form-label">Adresa</label>
    <div class="input-group has-validation mb-3 ">
        <input type="url" class="form-control" name="url" id="post-url" value="<?= @$data['post']?->getZdroj() ?>">
    </div>

    <button type="submit" class="btn btn-primary">Uložiť</button>
</form>