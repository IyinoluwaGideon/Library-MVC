<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Core\Router;

class ViewLibrary
{

    public function __construct(
        private Router $router,
        private Book $book
    )
    {
        
    }
    public function action()
    {
         $books = $this->book->fetchAllBooks([]);
        require_once __DIR__ . '/../Views/hrflibrary.php';
    }
}