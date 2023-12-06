<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

use App\Models\Post;

?>
<form id="myForm" method="post" action="<?= $link->url('admin.create') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="">

    <!-- text (Nazov) -->
    <label for="post-nazov" class="form-label">Názov príspevku</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="nazov" id="post-nazov" value="">
    </div>

    <!-- text (Popis) -->
    <label for="post-popis" class="form-label">Text príspevku</label>
    <div class="input-group has-validation mb-3 ">
        <input type="text" class="form-control" name="popis" id="post-popis" value="">
    </div>

    <!-- date (Datum Publikovania) -->
    <label for="post-date" class="form-label">Dátum publikovania</label>
    <div class="input-group has-validation mb-3">
        <input type="date" class="form-control" name="date" id="post-date" value="">
    </div>
    <div id="date-validation-message" style="color: red;"></div>

    <!-- url (Zdroj) -->
    <label for="post-url" class="form-label">Adresa</label>
    <div class="input-group has-validation mb-3 ">
        <input type="url" class="form-control" name="url" id="post-url" value="">
    </div>

    <button type="submit" class="btn btn-primary">Uložiť</button>
</form>
<script src="../../../public/js/date-check.js"></script>