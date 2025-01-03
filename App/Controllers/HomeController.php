<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Dialnice;
use App\Models\Message;
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

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function ostatne(): Response
    {
        $posty = Post::getAll();
        return $this->html($posty);
    }

    public function showJson(): Response
    {
        $message = new Message();
        $message->setMessage('Ahoj');
        $message->setAuthor('Patrik');
        $message->setRecipient('Peter');

        return $this->json($message);

    }

    public function receiveJson(): Response
    {
        $data = $this->request()->getRawBodyJSON();

        return $this->json($data);
    }
}
