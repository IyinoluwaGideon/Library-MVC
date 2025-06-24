<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\User;
use Core\Router;

class ViewUserRecord
{
    public function __construct(
        private Router $router,
        private User $user
    ) {}

    public function action()
    {
        if (isset($_SESSION['username'])) {
            $users = $this->user->fetchUserRecord([]);
            require_once __DIR__ . '/../Views/userrecord.php';
        }else{
             $this->router->redirect('/login');
        }
       
    }
}
