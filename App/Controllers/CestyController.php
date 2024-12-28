<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Cesty;

class CestyController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }
}