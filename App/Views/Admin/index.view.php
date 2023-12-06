<?php

/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div>
                Vitaj, <strong><?= $auth->getLoggedUserName() ?></strong>!<br><br>
                Táto časť aplikácie je prístupná len po prihlásení.<br>
                <a class="nav-link" href="<?= $link->url("admin.pridajPrispevok") ?>">Pridaj príspevok tu</a>
            </div>
        </div>
    </div>
</div>