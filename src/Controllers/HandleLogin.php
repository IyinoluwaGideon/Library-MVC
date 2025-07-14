<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Assert\Assertion;
use Core\Router;
use Exception;

class HandleLogin
{
    public function __construct(
        private Router $router,
        private User $user

    ) {}

    public function action()
    {
        try {
            $username = trim($_POST['username']);
            Assertion::notEmpty($username, 'Username is required' . "\n");
            Assertion::notEmpty($_POST['password'], 'Password is required' . "\n");
            $existingUser = $this->user->checkUserByUsername($username);
            if (!$existingUser) {
                throw new Exception("Username does not exist");
            }
            if (password_verify($_POST['password'], $existingUser["password"]) === false) {
                throw new Exception('Password do not match');
            }
            $_SESSION['user_id'] = $existingUser["id"];
            $_SESSION['username'] = $existingUser["username"];
            $_SESSION['role'] = $existingUser["role"];
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $_SESSION['inputs'] = [
                'username' => $_POST['username'],

            ];

            $this->router->redirect('/login');
        }

        $this->router->redirect('/dashboard');
    }
}
