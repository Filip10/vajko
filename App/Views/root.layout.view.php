<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/styl.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Eighth navbar example">
    <div class="container">
        <a class="navbar-brand" href="<?= $link->url("home.index") ?>">dopravanaslovensku.sk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?= $link->url("home.dialnice") ?>" aria-expanded="false">Diaľnice</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">D1</a></li>
                        <li><a class="dropdown-item" href="#">D2</a></li>
                        <li><a class="dropdown-item" href="#">D3</a></li>
                        <li><a class="dropdown-item" href="#">D4</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?= $link->url("home.rychlostnecesty") ?>" aria-expanded="false">Rýchlostné cesty</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">R1</a></li>
                        <li><a class="dropdown-item" href="#">R2</a></li>
                        <li><a class="dropdown-item" href="#">R3</a></li>
                        <li><a class="dropdown-item" href="#">R4</a></li>
                        <li><a class="dropdown-item" href="#">R5</a></li>
                        <li><a class="dropdown-item" href="#">R6</a></li>
                        <li><a class="dropdown-item" href="#">R7</a></li>
                        <li><a class="dropdown-item" href="#">R8</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url("home.cesty", ['cesta' => 'Železnice']) ?>">Železnice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url("home.ostatne") ?>">Všetky</a>
                </li>
            </ul>


            <?php if ($auth->isLogged()) { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $link->url("auth.logout") ?>"><?= $auth->getLoggedUserName() ?></a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?= \App\Config\Configuration::LOGIN_URL ?>" aria-expanded="false"><i class="bi bi-person-circle"></i> Prihlásiť sa</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3" style="flex: 1">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

<footer class="bg-dark text-light p-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6>Kontakt:</h6>
                <a href="mailto:info@dopravanaslovensku.sk">info@dopravanaslovensku.sk</a>
            </div>
            <div class="col-md-6">
                <p class="text-right">© <?= date('Y') ?> dopravanaslovensku.sk</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
