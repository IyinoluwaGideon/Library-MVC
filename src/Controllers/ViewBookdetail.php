<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Core\Router;


class ViewBookdetail
{
    public function __construct(
        private Book $book,
        private Router $router
    ) {}

    public function action()
    {
       
        $book_id = (int) $_GET['book_id'];
        if (isset($_SESSION['username'])) {
            $book = $this->book->findBook($book_id);
            require_once __DIR__  . '/../Views/bookdetail.php';
        } else {
            $this->router->redirect('/login');
        }
    }
}
