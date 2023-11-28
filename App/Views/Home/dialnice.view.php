<?php

/** @var Kategoria[] $data */

use App\Models\Kategoria;

?>
<div>
    <?php
    foreach ($data as $dialnica) {
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-3 d-flex gap-4 flex-column">
                    <div class="border post d-flex flex-column">
                        <div class="m-2">
                            <?= $dialnica->getNazov() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<div class="row mb-3 p-3">
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">D1</h3>
                <div class="mb-1 text-body-secondary">1972 - súčastnosť</div>
                <p class="card-text mb-2">Bratislava - Košice - Vyšné Nemecké [SK-UA]</p>
                <div class="progress mb-auto" role="progressbar" aria-valuenow="77" aria-valuemin="0"
                     aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 77%;"
                         aria-valuenow="77"
                         aria-valuemin="0" aria-valuemax="100">
                        395,9 km
                    </div>
                    <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 6%;"
                         aria-valuenow="6"
                         aria-valuemin="0" aria-valuemax="100">
                        28,4 km
                    </div>
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 17%;"
                         aria-valuenow="17"
                         aria-valuemin="0" aria-valuemax="100">
                        87,7 km
                    </div>
                </div>

                <a href="https://sk.wikipedia.org/wiki/Dia%C4%BEnica_D1_(Slovensko)"
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
                    <image href="obrazky/D1-SVK-2020.svg.png" x="0" y="0" width="100%" height="100%"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">D2</h3>
                <div class="mb-1 text-body-secondary">1969 - 2003</div>
                <p class="card-text mb-2">Kúty [CZ-SK] - Bratislava [SK-HU]</p>
                <div class="progress mb-auto">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 100%;"
                         aria-valuenow="100"
                         aria-valuemin="0" aria-valuemax="100">80,5 km
                    </div>
                </div>
                <a href="https://sk.wikipedia.org/wiki/Dia%C4%BEnica_D2_(Slovensko)"
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
                    <image href="obrazky/D2-SVK-2020.svg.png" x="0" y="0" width="100%" height="100%"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">D3</h3>
                <div class="mb-1 text-body-secondary">1996 - súčastnosť</div>
                <p class="card-text mb-2">Žilina - Skalité [SK-PL]</p>
                <div class="progress mb-auto">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 63%;"
                         aria-valuenow="63"
                         aria-valuemin="0" aria-valuemax="100">37,1 km
                    </div>
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 37%;"
                         aria-valuenow="37"
                         aria-valuemin="0" aria-valuemax="100">22 km
                    </div>
                </div>
                <a href="https://sk.wikipedia.org/wiki/Dia%C4%BEnica_D3_(Slovensko)"
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
                    <image href="obrazky/D3-SVK-2020.svg.png" x="0" y="0" width="100%" height="100%"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">D4</h3>
                <div class="mb-1 text-body-secondary">1996 - súčastnosť</div>
                <p class="card-text mb-2">Jarovce [AT-SK] - Devínska Nová Ves [SK-AT]</p>
                <div class="progress mb-auto">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 67%;"
                         aria-valuenow="67"
                         aria-valuemin="0" aria-valuemax="100">32 km
                    </div>
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 33%;"
                         aria-valuenow="33"
                         aria-valuemin="0" aria-valuemax="100">16 km
                    </div>
                </div>
                <a href="https://sk.wikipedia.org/wiki/Dia%C4%BEnica_D4_(Slovensko)"
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
                    <image href="obrazky/D4-SVK-2020.svg.png" x="0" y="0" width="100%" height="100%"/>
                </svg>
            </div>
        </div>
    </div>
</div>
