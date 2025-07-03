<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Assert\Assertion;
use Core\Router;
use Exception;

class HandleEditProfile
{
    public function __construct(
        private User $user,
        private Router $router
    ) {}

    public function action()
    {
        $post = $_POST;
        try {
            Assertion::notEmpty($post['username'], "New Username is required");
            require_once __DIR__ . '/../helper/upload.php';
            $this->user->editProfile($post);
            $_SESSION['username'] = $post["username"];
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $this->router->redirect("/dashboard");
    }
}
