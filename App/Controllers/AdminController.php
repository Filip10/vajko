<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Cesty;
use App\Models\Post;
use DateTime;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AdminController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $post = Post::getOne($id);

        if (is_null($post)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'post' => $post
            ]
        );
    }

    public function save()
    {
        $id = (int)$this->request()->getValue('id');

        $post = Post::getOne($id);
        $post->setAutor($this->app->getAuth()->getLoggedUserName());
        $post->setNazov($this->request()->getValue('nazov'));
        $post->setPopis($this->request()->getValue('popis'));
        $inputString = $this->request()->getValue('date');
        $dateTime = new DateTime($inputString);
        $outputString = $dateTime->format('d.m.Y');
        $post->setDatumPublikovania($outputString);
        $urlInput = (string)($this->request()->getValue('url'));
        $post->setZdroj($urlInput);

        $post->save();

        $vybraneCesty = $this->request()->getValue('cesty');
        $allCesties = $post->getAllCesties();
        $allExistingSelectedCesties = $post->getCestaByPostId($id);

        if (!empty($vybraneCesty)) {
            foreach ($allCesties as $cesta) {
                // in_array($cesta, $selectedValues)
                if (in_array($cesta['cesta'], $vybraneCesty)) { //ked je cesta vybrana
                    if (!in_array($cesta, $allExistingSelectedCesties)) { //ked cesta este neexistuje v zozname
                        //save these which are newly selected
                        $post->setCestaPost($id, $cesta['cesta']);
                    }
                } else { //ked cesta nie je vybrana
                    if (in_array($cesta, $allExistingSelectedCesties)) { //ked sa cesta v zozname uz nenachadza - pouzivatel unselectol
                        //delete these, which were unselected
                        $post->deletePostFromPrepojenie($id, $cesta['cesta']);
                    }
                }
            }
        }

        return new RedirectResponse($this->url("home.ostatne"));
    }


    public function add(): Response
    {
        $cesty = Cesty::getAll();
        return $this->html($cesty);
    }
    public function create()
    {
        $post = new Post(); // toto je pre nový post
        $post->setAutor($this->app->getAuth()->getLoggedUserName());
        $post->setNazov($this->request()->getValue('nazov'));
        $post->setPopis($this->request()->getValue('popis'));
        $post->setDatumPublikovania($this->request()->getValue('datumPublikovania'));
        $urlInput = (string)($this->request()->getValue('url'));
        $post->setZdroj($urlInput);

        $post->save();
        return new RedirectResponse($this->url("home.ostatne"));
    }
    public function delete()
    {
        $id = (int)$this->request()->getValue('id');
        $post = Post::getOne($id);

        if (is_null($post)) {
            throw new HTTPException(404);
        } else {
            //FileStorage::deleteFile($post->getPicture());
            $post->deleteAllPostFromPrepojenie($id);
            $post->delete();
            return new RedirectResponse($this->url("home.ostatne"));
        }
    }
}
