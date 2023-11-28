<?php

/** @var Dialnice[] $data */

use App\Models\Dialnice;

?>
<div class="row mb-3 p-3">
    <?php
    foreach ($data

             as $dialnica) {
        ?>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0"><?= $dialnica->getNazov() ?></h3>
                    <div class="mb-1 text-body-secondary"><?= $dialnica->getZaciatokVystavby() ?>
                        - <?php if ($dialnica->getKoniedVystavby() == 0) {
                            echo "súčastnosť";
                        } else {
                            echo $dialnica->getKoniedVystavby();
                        } ?></div>
                    <p class="card-text mb-2"><?= $dialnica->getTrasa() ?></p>
                    <div class="progress mb-auto" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                         aria-valuemax="100">

                        <?php
                        if ($dialnica->getKmDokoncene() != 0) {
                            ?>
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 style="width: <?= $dialnica->getKmPerDokoncene() ?>%;"
                                 aria-valuenow="<?= $dialnica->getKmPerDokoncene() ?>"
                                 aria-valuemin="0" aria-valuemax="100">
                                <?= $dialnica->getKmDokoncene() ?> km
                            </div>
                            <?php
                        }
                        if ($dialnica->getKmVoVystavbe() != 0) {

                            ?>
                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                 style="width: <?= $dialnica->getKmPerVoVystavbe() ?>%;"
                                 aria-valuenow="<?= $dialnica->getKmPerVoVystavbe() ?>"
                                 aria-valuemin="0" aria-valuemax="100">
                                <?= $dialnica->getKmVoVystavbe() ?> km
                            </div>
                            <?php
                        }
                        if ($dialnica->getKmVPlane() != 0) {
                            ?>
                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                 style="width: <?= $dialnica->getKmPerVPlane() ?>%;"
                                 aria-valuenow="<?= $dialnica->getKmPerVPlane() ?>"
                                 aria-valuemin="0" aria-valuemax="100">
                                <?= $dialnica->getKmVPlane() ?> km
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <a href="https://sk.wikipedia.org/wiki/Dia%C4%BEnica_<?= $dialnica->getNazov() ?>_(Slovensko)"
                       class="icon-link gap-1 icon-link-hover stretched-link">
                        Čítaj viac
                        <svg class="bi">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                         focusable="false">
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <image href="obrazky/<?= $dialnica->getNazov() ?>-SVK-2020.svg.png" x="0" y="0" width="100%"
                               height="100%"/>
                    </svg>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
