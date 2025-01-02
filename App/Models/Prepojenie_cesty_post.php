<?php

namespace App\Models;

use App\Core\Model;

class Prepojenie_cesty_post  extends Model
{
    protected int $id;
    protected int $id_posts;
    protected int $id_cesty;

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdPosts(): int
    {
        return $this->id_posts;
    }

    public function setIdPosts(int $id_posts): void
    {
        $this->id_posts = $id_posts;
    }

    public function getIdCesty(): int
    {
        return $this->id_cesty;
    }

    public function setIdCesty(int $id_cesty): void
    {
        $this->id_cesty = $id_cesty;
    }
}