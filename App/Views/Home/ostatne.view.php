<?php

/** @var Post[] $data */
/** @var \App\Models\Post $post */
/** @var \App\Models\Cesty $cesty */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */

use App\Models\Post;

?>

<p>Rekonštrukcie ciest I. triedy</p>
<p>Opravy mostov</p>
<p>Mestská hromadná doprava.</p>
<p>Cyklochodníky</p>

<?php if ($auth->isLogged() && $auth->getLoggedUserName()) { ?>
    <a href="<?= $link->url("admin.add") ?>" class="btn btn-primary">Pridaj príspevok</a>
<?php } ?>
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

                            $i = 0;
                            foreach ($cestas as $cesta) {
                                ?>
                                <button type="button" class="btn btn-outline-warning"><?php echo $cesta[$i]; ?></button>
                                <?php
                                $i++;
                            }
                            ?>

                            <button type="button" class="btn btn-outline-warning">I/66</button>
                            <button type="button" class="btn btn-outline-info">II/540</button>
                            <button type="button" class="btn btn-outline-dark">Obchvaty</button>

                            <button type="button" class="btn btn-outline-warning">I/16</button>
                            <button type="button" class="btn btn-outline-warning">I/72</button>
                            <button type="button" class="btn btn-outline-info">II/531</button>
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
            <a href="<?= $link->url('like.toggle', ['id' => $post->getId()]) ?>" class="btn btn-primary"><?= $post->getLikeCount() ?> ľudia
                <?php if ($auth->isLogged() && $post->isLiker($auth->getLoggedUserName())) { ?>
                    vrátane vás
                <?php } ?>
                to označili ako užitočné</a>
            <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "admin") { ?>
                <a href="<?= $link->url('admin.edit', ['id' => $post->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                <a href="<?= $link->url('admin.delete', ['id' => $post->getId()]) ?>" class="btn btn-danger">Vymazať</a>
            <?php } ?>
        </div>
        <?php
    }
    ?>
</div>

