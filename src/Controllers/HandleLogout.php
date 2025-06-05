<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Router;
use PDO;

class HandleLogout
{

    public function __construct(
        private PDO $pdo,
        private Router $router
    ) {}

    public function action(){

        unset($_SESSION['username']);

        // isset($_SESSION['username']);

        $this->router->redirect('/login');

        
    }


}
