<?php

namespace App\Models;

use App\Core\Model;
class Cesty extends Model
{
    protected int $id;
    protected string $cesta;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCesta(): string
    {
        return $this->cesta;
    }

    public function setCesta(string $cesta): void
    {
        $this->cesta = $cesta;
    }


}