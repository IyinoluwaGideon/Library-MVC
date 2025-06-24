<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Core\Router;

class HandleDeleteBook
{
    public function __construct(
        private Book $book,
        private Router $router
    )
    {
        $this->book->deleteBook();
        $this->router->redirect("/booklist");
    }
}