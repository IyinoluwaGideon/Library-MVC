<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Core\Router;

class HandleSearchBooks
{
    public function __construct(
        private Book $book,
        private Router $router
    ) {}

    public function action()
    {
        $search = (string) $_GET['search'];
        // $book_id = (int) $_GET['book_id'];

        $books = $this->book->searchBooks($search, $search,);


        $_SESSION['search_results'] = $books;
        echo '<pre>';
        var_dump($books[0]); // or var_dump($books[0]);
        echo '</pre>';


        if (empty($search)) {
            $_SESSION['error'] = "Search term cannot be empty.";
        } elseif (empty($books)) {
            $_SESSION['error'] = "No books found matching your search.";
        } else {
            $_SESSION['success'] = count($books) . " book(s) found.";
        }

        $this->router->redirect('/booklist');

        exit;
    }
}
