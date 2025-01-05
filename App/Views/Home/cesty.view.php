<?php

/** @var Post[] $data */
/** @var \App\Models\Post $post */
/** @var \App\Models\Cesty $cesty */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */

use App\Models\Post;

?>
<div class="row mb-3 p-3">
    <?php
    foreach ($data as $post) {
        ?>
        <div class="col-md-6 mb-3">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-2"><?= $post->getNazov() ?></h3>
                    <div class="mb-1 text-body-secondary"><?= $post->getDatumPublikovania() ?></div>
                    <p class="card-text mb-3"><?= $post->getPopis() ?></p>
                    <div class="row mb-2">
                        <div class="col">
                            <?php
                            $cestas = $post->getCestaByPostId($post->getId());

                            foreach ($cestas as $cesta) {
                                //var_dump($cesta);
                                ?>
                                <a href="<?= $link->url('home.cesty', ['cesta' => $cesta['cesta']]) ?>" type="button" class="btn btn-outline-<?php
                                if (strpos($cesta['cesta'], 'D') === 0 || strpos($cesta['cesta'], 'R') === 0) { //dialnice a rychlostne cesty
                                    echo 'success';
                                } elseif (strpos($cesta['cesta'], 'II') === 0) { //cesty II. triedy
                                    echo 'primary';
                                } elseif (strpos($cesta['cesta'], 'I') === 0) { //cesty I. triedy
                                    echo 'warning';
                                } else { //ine
                                    echo 'dark';
                                }
                                ?>"><?php echo $cesta['cesta']; ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <a href="<?= $post->getZdroj() ?>?ref=dopravanaslovensku.sk"
                       class="icon-link gap-1 icon-link-hover" style="margin-bottom: 0.8em">
                        Čítať viac
                        <svg class="bi">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                         focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Dnes 24</text>
                        <image href="obrazky/logo_<?= $post->getZdrojSkrateny() ?>.png" x="0" y="0" width="100%" height="100%"/>
                    </svg>
                </div>
            </div>

            <button data-id="<?= $post->getId() ?>" class="likeAJAX btn btn-primary"><?= $post->getLikeCount() ?> ľudia
                <?php if ($auth->isLogged() && $post->isLiker($auth->getLoggedUserName())) { ?>
                    vrátane vás
                <?php } ?>
                to označili ako užitočné</button>
        </div>
        <?php
    }
    ?>
</div>
<script src="../../../public/js/like.js?v=<?= time() ?>"></script>