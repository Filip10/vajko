<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Prepojenie_cesty_post;

class Prepojenie_cesty_postController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }
    public function save()
    {
        $id = (int)$this->request()->getValue('id');


        $post = new Prepojenie_cesty_post();
        $post->setIdPosts($this->request()->getValue('id_posts'));
        $post->setIdCesty($this->request()->getValue('id_cesty'));
    }

    public function create($idPost, $idCesty) {
        $prepojenie = new Prepojenie_cesty_post();
        $prepojenie->setIdPosts($idPost);
        $prepojenie->setIdCesty($idCesty);
        $prepojenie->save();
    }
}