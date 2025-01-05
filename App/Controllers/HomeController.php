<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\Response;
use App\Models\Cesty;
use App\Models\Dialnice;
use App\Models\Post;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function contact(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function zeleznice(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function dialnice(): Response
    {
        $dialnice = Dialnice::getAll();
        return $this->html($dialnice);
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function rychlostnecesty(): Response
    {
        return $this->html();
    }
    public function cesty(): Response
    {
        $cesta = $this->request()->getValue('cesta');
        $posty = Post::getAll();


        $postySpravne = [];

        foreach ($posty as $post) {
            $cestas = $post->getCestaByPostId($post->getId());
                foreach ($cestas as $cestat) {
                    if ($cesta == $cestat['cesta']) {
                        array_push($postySpravne, $post);
                    }
                }
        }

        return $this->html(
            [
                'post' => $postySpravne
            ]
        );
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function ostatne(): Response
    {
        $posty = Post::getAll();
        return $this->html($posty);
    }
}
