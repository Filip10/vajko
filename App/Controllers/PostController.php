<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;

class PostController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }
    public function add() : Response
    {
        if ($this->request()->getValue('text')) {

            $newPost = new Post();
            $newPost->setNazov($this->request()->getValue('nazov'));
            $newPost->setPopis($this->request()->getValue('popis'));
            $newPost->setDatumPublikovania($this->request()->getValue('datumPublikovania'));
            $newPost->setZdroj($this->request()->getValue('zdroj'));

            $newPost->save();

            return $this->redirect("?");
        }
        return $this->html();
    }

    public function edit() : response {

        return $this->html();
    }
}