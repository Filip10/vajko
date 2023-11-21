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
            $newPost->setPicture($this->request()->getValue('picture'));
            $newPost->setText($this->request()->getValue('text'));

            $newPost->save();

            return $this->redirect("?");

        }


        return $this->html();
    }

    public function edit() : response {

        return $this->html();
    }
}