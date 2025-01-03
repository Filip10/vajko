<?php

namespace App\Models;

use App\Core\DB\Connection;
use App\Core\Model;
use App\Models\Cesty;
use App\Models\Prepojenie_cesty_post;
use DateTime;
use PDO;

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

    public function setDatumPublikovania(string $datumPublikovaniaa): void
    {
        $dateTime = new DateTime($datumPublikovaniaa);
        $outputString = $dateTime->format('Y-m-d');
        $this->datumPublikovania = $outputString;
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

    public function getLikeCount()
    {
        // get all likes of this post
        $likesCount = Like::getAll("post_id = ?", [$this->id]);
        // count them
        return count($likesCount);
    }

    public function likeToggle($userName)
    {
        // only for stored
        if (empty($this->id)) {
            throw new \Exception("Post must be stored or loaded to toggle like.");
        }
        // get all likes from this user for this post (there is always only one or none)
        $likes = Like::getAll("post_id = ? AND liker like ?", [$this->id, $userName]);
        if (count($likes) > 0) {
            // remove likes if there are any
            foreach ($likes as $like) {
                $like->delete();
            }
        } else {
            // if there are not, create one
            $like = new Like();
            $like->setPostId($this->id);
            $like->setLiker($userName);
            $like->save();
        }
    }

    public function isLiker($userName)
    {
        if (empty($this->id)) {
            throw new \Exception("Post must be stored or loaded to check the liker.");
        }

        $likes = Like::getAll("post_id = ? AND liker LIKE ?", [$this->id, $userName]);

        return count($likes) > 0;
    }


    public function getCestaByPostId($postId) {
        $con = Connection::connect();
        $stmt = $con->prepare("
            SELECT cesties.cesta
            FROM prepojenie_cesty_posts
            INNER JOIN cesties ON prepojenie_cesty_posts.id_cesty = cesties.id
            WHERE prepojenie_cesty_posts.id_posts = $postId;
    ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllCesties() {
        $con = Connection::connect();
        $stmt = $con->prepare("
            SELECT cesties.cesta
            FROM cesties;
    ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deleteAllPostFromPrepojenie($postId) { //vymaže všetky prepojenia na daný post
        $con = Connection::connect();
        $stmt = $con->prepare("
            DELETE FROM prepojenie_cesty_posts
            WHERE id_posts = $postId;
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deletePostFromPrepojenie($postId, $cestyCesta) { //vymaže prepojenie len daná cesta/post
        $cesta = Cesty::getAll('`cesta` = ?', [$cestyCesta]);
        if (!empty($cesta)) {
            $cestaCiselko = $cesta[0]->getId();
        }
        $con = Connection::connect();
        $stmt = $con->prepare("
            DELETE FROM prepojenie_cesty_posts
            WHERE id_posts = $postId AND id_cesty = $cestaCiselko;
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setCestaPost($postId, $cestyCesta) {
        $cesta = Cesty::getAll('`cesta` = ?', [$cestyCesta]);
        if (!empty($cesta)) {
            $cestaCiselko = $cesta[0]->getId();
        }
        $con = Connection::connect();
        $stmt = $con->prepare("
            INSERT INTO prepojenie_cesty_posts (id_posts, id_cesty)
            VALUES ($postId, $cestaCiselko);
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}