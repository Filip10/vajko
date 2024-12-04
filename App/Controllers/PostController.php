<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Post;

class PostController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }

    public function authorize(string $action)
    {
        $id = $this->request()->getValue('id');

        if ($id && ($action == "save" || $action == "delete")) {

            $post = Post::getOne($id);
            return $this->app->getAuth()->getLoggedUserName() == $post->getAutor();


        }

        return $this->app->getAuth()->isLogged();
    }

    public function save()
    {
        $id = (int)$this->request()->getValue('id');


        $post = new Post();
        $post->setAutor($this->app->getAuth()->getLoggedUserName());
        $post->setNazov($this->request()->getValue('nazov'));
        $post->setPopis($this->request()->getValue('popis'));
        $post->setDatumPublikovania($this->request()->getValue('datumPublikovania'));
        $post->setZdroj($this->request()->getValue('zdroj'));
    }

    public function add(): Response
    {
        $post = new Post(); // toto je pre nový post
        $post->setAutor($this->app->getAuth()->getLoggedUserName());
        $post->setNazov($this->request()->getValue('nazov'));
        $post->setPopis($this->request()->getValue('popis'));
        $post->setDatumPublikovania($this->request()->getValue('date'));
        $urlInput = (string)($this->request()->getValue('url'));
        $post->setZdroj($urlInput);

        $post->save();
        return new RedirectResponse($this->url("home.ostatne"));
    }

    public function edit(): Response
    {
        $id = (int)$this->request()->getValue('id');
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