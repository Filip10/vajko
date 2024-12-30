<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

use App\Models\Post;

?>
<form id="myForm" method="post" action="<?= $link->url('post.add') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="">

    <!-- text (Nazov) -->
    <label for="post-nazov" class="form-label">Názov príspevku</label>
    <div class="mb-3">
        <div class="input-group has-validation">
            <input type="text" class="form-control" name="nazov" id="post-nazov" value="">
        </div>
        <div id="nazov-validation-message" style="color: red; margin-top: 5px;"></div>
    </div>

    <!-- text (Popis) -->
    <label for="post-popis" class="form-label">Text príspevku</label>
    <div class="mb-3">
        <div class="input-group has-validation">
            <input type="text" class="form-control" name="popis" id="post-popis" value="">
        </div>
        <div id="text-validation-message" style="color: red; margin-top: 5px;"></div>
    </div>

    <!-- date (Datum Publikovania) -->
    <label for="post-date" class="form-label">Dátum publikovania</label>
    <div class="mb-3">
        <div class="input-group has-validation">
            <input type="date" class="form-control" name="date" id="post-date" value="">
        </div>
        <div id="date-validation-message" style="color: red;"></div>
    </div>

    <label for="post-cesty">Select Roads:</label>
    <select id="sendJson" name="cesty[]" multiple="multiple" style="width: 100%" required>
        <div id="result"></div>
    </select>

    <!-- url (Zdroj) -->
    <label for="post-url" class="form-label">Adresa</label>
    <div class="mb-3">
        <div class="input-group has-validation">
            <input type="url" class="form-control" name="url" id="post-url" value="">
        </div>
        <div id="url-validation-message" style="color: red;"></div>
    </div>

    <button type="submit" class="btn btn-primary">Uložiť</button>
</form>
<script src="../../../public/js/date-check.js?v=<?= time() ?>"></script>
<script src="../../../public/js/add-categories.js?v=<?= time() ?>"></script>