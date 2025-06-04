<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Assert\Assertion;
use Core\Router;
use Exception;
use PDO;

class HandleLogin {
    public function __construct(
        private PDO $pdo,
        private Router $router,
        private User $user
        
    ) {
    }

    public function action()
    {
        try{
            Assertion::notEmpty($_POST['username'], 'Username is required' . "\n");
            Assertion::notEmpty($_POST['password'], 'Password is required' . "\n");
            $this->user->userLogin();
        }catch (Exception $e){
            $_SESSION['error'] = $e->getMessage();
            $_SESSION['inputs'] = [
                'username' => $_POST['username'],
                
            ];

            $this->router->redirect('/login');
        }
        
        $this->router->redirect('/dashboard');
    }
}