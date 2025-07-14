<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Core\Router;

class ViewUserProfile{

    public function __construct(
        private User $user, 
        private Router $router){

    }
  
    public function action()
    {
        if (isset($_SESSION['username'])) {
            $user = $this->user->userProfile([]);
    //   var_dump($user['image']);
    //   exit;
            require_once __DIR__  . '/../Views/userprofile.php';
        } else {
            $this->router->redirect('/login');
        }
    }
}