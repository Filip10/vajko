<?php

namespace App\Models;

use App\Core\Model;

class Dialnice extends Model
{
    protected string $nazov;
    protected int $zaciatokVystavby;
    protected int $koniecVystavby;
    protected string $trasa;
    protected float $kmDokoncene;
    protected float $kmVoVystavbe;
    protected float $kmVPlane;
    protected int $id;

    public function getNazov(): string
    {
        return $this->nazov;
    }

    public function getZaciatokVystavby(): int
    {
        return $this->zaciatokVystavby;
    }

    public function getKoniedVystavby(): int
    {
        return $this->koniecVystavby;
    }

    public function getTrasa(): string
    {
        return $this->trasa;
    }

    private function getKmSpolu() :float
    {
        return $this->getKmVPlane() + $this->getKmVoVystavbe() + $this->getKmDokoncene();
    }

    public function getKmDokoncene(): float
    {
        return $this->kmDokoncene;
    }

    public function getKmPerDokoncene(): float
    {
        return $this->kmDokoncene / $this->getKmSpolu() * 100;
    }

    public function getKmVoVystavbe(): float
    {
        return $this->kmVoVystavbe;
    }

    public function getKmPerVoVystavbe(): float
    {
        return $this->kmVoVystavbe / $this->getKmSpolu() * 100;
    }

    public function getKmVPlane(): float
    {
        return $this->kmVPlane;
    }

    public function getKmPerVPlane(): float
    {
        return $this->kmVPlane / $this->getKmSpolu() * 100;
    }

    public function setNazov(string $nazov): void
    {
        $this->nazov = $nazov;
    }

    public function setZaciatokVystavby(int $zaciatokVystavby): void
    {
        $this->zaciatokVystavby = $zaciatokVystavby;
    }

    public function setKoniecVystavby(int $koniecVystavby): void
    {
        $this->koniecVystavby = $koniecVystavby;
    }

    public function setTrasa(string $trasa): void
    {
        $this->trasa = $trasa;
    }

    public function setKmDokoncene(float $kmDokoncene): void
    {
        $this->kmDokoncene = $kmDokoncene;
    }

    public function setKmVoVystavbe(float $kmVoVystavbe): void
    {
        $this->kmVoVystavbe = $kmVoVystavbe;
    }

    public function setKmVPlane(float $kmVPlane): void
    {
        $this->kmVPlane = $kmVPlane;
    }


}