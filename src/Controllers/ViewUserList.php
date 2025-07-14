<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Core\Router;

class ViewUserList{

    public function __construct(
        private Router $router,
        private User $user
    ) {}

    public function action()
    {
         if (isset($_SESSION['username'])) {
            $users = $this->user->fetchAllusers([]);
             $count = 1;
            require_once __DIR__ . '/../Views/userlist.php';
        }else{
             $this->router->redirect('/login');
        }
    }
}