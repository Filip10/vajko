<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Dialnice;

class DialniceController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }
    public function add() : Response
    {
        if ($this->request()->getValue('trasa')) {

            $newKategoria = new Dialnice();
            $newKategoria->setNazov($this->request()->getValue('nazov'));
            $newKategoria->setZaciatokVystavby($this->request()->getValue('zaciatokVystavby'));
            $newKategoria->setKoniecVystavby($this->request()->getValue('koniecVystavby'));
            $newKategoria->setTrasa($this->request()->getValue('trasa'));
            $newKategoria->setKmDokoncene($this->request()->getValue('kmDokoncene'));
            $newKategoria->setKmVoVystavbe($this->request()->getValue('kmVoVystavbe'));
            $newKategoria->setKmVPlane($this->request()->getValue('kmVPlane'));

            $newKategoria->save();

            return $this->redirect("?");

        }


        return $this->html();
    }


}