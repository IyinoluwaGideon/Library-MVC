<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Assert\Assertion;
use Core\Router;
use Exception;
use PDO;

class HandleRegistration
{
    public function __construct(
        private PDO $pdo,
        private Router $router,
        private User $user,
    ) {}

    public function action()
    { 
        $post = $_POST;
        try {
            Assertion::notEmpty($post['username'], 'Username is requried' . "\n");
            Assertion::notEmpty($post['email'], 'Email is requried' . "\n");
            Assertion::notEmpty($post['password'], 'Password is requried' . "\n");
            Assertion::notEmpty($post['password2'], 'Password2 is requried' . "\n");
            Assertion::same($post['password'], $post['password2'], 'The passwords do not match' . "\n\n");
            $existingUser = $this->user->checkUserByEmail($post);
            if ($existingUser['email_exists']) {
                throw new Exception('This email already exist');
            }
            $id = $this->user->createUser($post);
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $post['username'];
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }        $this->router->redirect('/dashboard');
    }

}
