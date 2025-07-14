<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Core\Router;

class ViewBookList
{
    public function __construct(
        private Router $router,
        private Book $book
    ) {}

    public function action()
    {
        //  $books = $_SESSION['search_results'] ?? $this->book->fetchAllBooks();
        // unset($_SESSION['search_results']); // Clear search result after use
        if (isset($_SESSION['username'])) {
            $books = $this->book->fetchAllBooks([]);
            require_once __DIR__ . '/../Views/booklist.php';
        }else{
             $this->router->redirect('/login');
        }
       
    }
}
