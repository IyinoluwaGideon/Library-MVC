<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Router;

class ViewDashboard {

    public function __construct(
        private Router $router
    )
    {
        
    }
    public function action() {
        if( isset($_SESSION['username']))
        {
           require_once __DIR__  . '/../Views/dashboard.php';
        }else
        {
            $this->router->redirect('/login');
        }
        
        


    }
}