<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
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


        //$post = new Post(); // toto je pre nový post
        $post = Post::getOne($id); //toto je pre upravenie postu
        $post->setAutor($this->app->getAuth()->getLoggedUserName());
        $post->setNazov($this->request()->getValue('nazov'));
        $post->setPopis($this->request()->getValue('popis'));
        $inputString = $this->request()->getValue('datumPublikovania');
        $dateTime = new DateTime($inputString);
        $outputString = $dateTime->format('d.m.Y');
        $post->setDatumPublikovania($outputString);
        $urlInput = (string)($this->request()->getValue('url'));
        $post->setZdroj($urlInput);

        $post->save();
        return new RedirectResponse($this->url("home.ostatne"));
    }


    public function add(): Response
    {
        return $this->html();
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
            $post->delete();
            return new RedirectResponse($this->url("home.index"));
        }
    }
}
