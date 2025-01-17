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
<form id="myForm"  method="post" action="<?= $link->url('admin.save') ?>" enctype="multipart/form-data">

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
    <?php
               $originalDateString = @$data['post']?->getDatumPublikovania();
               $formattedDate = date('Y-m-d', strtotime($originalDateString));
               ?>
    <label for="post-date" class="form-label">Dátum publikovania</label>
    <div class="input-group has-validation mb-3 ">
        <input type="date" class="form-control" name="date" id="post-date"
               value="<?= $formattedDate ?>">
    </div>
    <div id="date-validation-message" style="color: red;"></div>

    <label for="post-cesty">Cesty:</label>
    <select id="sendJsonNope" name="cesty[]" multiple="multiple" style="width: 100%">
        <?php
        $selectedValues = @$data['post']?->getCestaByPostId(@$data['post']?->getId());
        foreach ( @$data['post']?->getAllCesties() as $cesta) {
            // $cesta->getCesta() //error 500 - Call to a member function getCesta() on array
            // $cesta['cesta']
            // var_dump($cesta); //array(1) {["cesta"]=>string(6) "II/540"}
            $isSelected = in_array($cesta, $selectedValues) ? 'selected' : '';
            ?>
            <option id="result" <?= $isSelected ?>><?php echo $cesta['cesta'] ?></option>
            <?php
        }
        ?>
    </select>

    <!-- url (Zdroj) -->
    <label for="post-url" class="form-label">Adresa</label>
    <div class="input-group has-validation mb-3 ">
        <input type="url" class="form-control" name="url" id="post-url" value="<?= @$data['post']?->getZdroj() ?>">
    </div>

    <button type="submit" class="btn btn-primary">Uložiť</button>
</form>
<script src="../../../public/js/date-check.js"></script>