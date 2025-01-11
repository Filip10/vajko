<?php
namespace App\Auth;
use App\Core\AControllerBase;
use App\Models\User;

class SimpleAuthenticator extends DummyAuthenticator {

    public function  login($login, $password): bool
    {
        $users = User::getAll();

        if (isset($users[$login])) { //ked sa meno nachadza v DB
            if (password_verify($password, $users[$login])) { //skontroluj heslo
                $_SESSION['user'] = $login;
                return true;
            } else {
                return false;
            }
        } else {//ked sa meno nenachadza v DB, vytvor ho
            $user = new User();
            $user->setName($login);
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            $user->save();

            $_SESSION['user'] = $login;
            return true;
        }
    }

}