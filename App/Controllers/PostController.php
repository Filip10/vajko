<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\DB\Connection;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Post;
use App\Models\Cesty;
use App\Models\Prepojenie_cesty_post;
use PDO;

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
        $existuje = false;
        $posts = Post::getAll();
        foreach ($posts as $post) { //kontrola existencie zadane url
            if ($post->getZdroj() === $this->request()->getValue('url')) {
                $existuje = true;
                break;
            }
        }

        if (!$existuje) {
            $post = new Post();
            $post->setAutor($this->app->getAuth()->getLoggedUserName());

            $nazov = $this->request()->getValue('nazov');
            $popis = $this->request()->getValue('popis');
            $date = $this->request()->getValue('date');
            $urlInput = (string)($this->request()->getValue('url'));

            if ($nazov != '' && $popis != '' && $urlInput != '') { //kontrola prázdnych elementov

                $post->setNazov($nazov);
                $post->setPopis($popis);
                $post->setDatumPublikovania($date);
                $post->setZdroj($urlInput);

                $post->save();

                $idPost = $post->getId();

                $vybraneCesty = $this->request()->getValue('cesty');


                if (!empty($vybraneCesty)) {
                    foreach ($vybraneCesty as $cesta) { //kontrola, či cesta existuje sa robí v setCestaPost
                        $post->setCestaPost($idPost, $cesta);
                    }
                }
            }
            return new RedirectResponse($this->url("home.ostatne"));
        } else {
            $data2 = ['message' => 'Post so zadanou URL už existuje!'];
            return new RedirectResponse($this->url("admin.add", $data2));
        }
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

    public function showMore()
    {
        $data = $this->request()->getRawBodyJSON();
        $posty = Post::getAll();
        $j = 0;
        for ($i = $data->offset; $i < count($posty) && $i < $data->offset + 6; $i++) {

            $post = $posty[$i];

            $postArray = [
                'id' => $post->getId(),
                'nazov' => $post->getNazov(),
                'datumPublikovania' => $post->getDatumPublikovania(),
                'popis' => $post->getPopis(),
                'zdroj' => $post->getZdroj(),
                'zdrojSkrateny' => $post->getZdrojSkrateny(),
                'cestas' => $post->getCestaByPostId($post->getId()),
                'likeCount' => $post->getLikeCount(),
            ];

            $data->array[$j] = $postArray;
            $j++;
        }
        $data->offset = $data->offset + 6;

        return $this->json($data);
    }
}