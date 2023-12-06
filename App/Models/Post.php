<?php

namespace App\Models;

use App\Core\Model;
use DateTime;

class Post extends Model
{
    protected int $id;
    protected string $nazov;
    protected string $popis;
    protected string $datumPublikovania;
    protected string $zdroj;
    protected string $autor;

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): void
    {
        $this->autor = $autor;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNazov(): string
    {
        return $this->nazov;
    }

    public function setNazov(string $nazov): void
    {
        $this->nazov = $nazov;
    }

    public function getPopis(): string
    {
        return $this->popis;
    }

    public function setPopis(string $popis): void
    {
        $this->popis = $popis;
    }

    public function getDatumPublikovania(): string
    {
        $inputString = $this->datumPublikovania;
        $dateTime = new DateTime($inputString);
        $outputString = $dateTime->format('d.m.Y');
        return $outputString;
    }

    public function setDatumPublikovania(string $datumPublikovania): void
    {

        $this->datumPublikovania = $datumPublikovania;
    }

    public function getZdroj(): string
    {
        return $this->zdroj;
    }

    public function getZdrojSkrateny(): string
    {
        $parsedUrl = parse_url($this->zdroj);
        $hostParts = explode('.', $parsedUrl['host']);
        $substring = $hostParts[count($hostParts) - 2];
        return $substring;
    }

    public function setZdroj(string $zdroj): void
    {
        $this->zdroj = $zdroj;
    }
}