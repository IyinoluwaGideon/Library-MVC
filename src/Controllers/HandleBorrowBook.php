<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Core\Router;
use Exception;

class HandleBorrowBook
{
    public function __construct(
        private Borrow $borrow,
        private Router $router,
        private Book $book
    ) {}

    public function action()
    {
        $book_id =  (int) $_GET['book_id'];
        $user_id = (int) $_GET['user_id'];


        $bookEntry = $this->borrow->getBookEntry();
        $bookAvailability = $this->book->checkAvailability($book_id);

        if (!$bookAvailability) {
            $_SESSION['error'] = "This book is empty";
            $this->router->redirect('/booklist');
        } else {
            if (!$bookEntry) {
                $this->borrow->borrow($user_id, $book_id);
                $this->book->reduceAvailableCopies($book_id);
                $_SESSION['success'] = "Book borrowed successfully";
            } else {

                if ($bookEntry['return_date'] === null) {
                    $_SESSION['error'] = "You have borrowed this book.";
                } else {
                    $this->borrow->borrow($user_id, $book_id);
                    $this->book->reduceAvailableCopies($book_id);

                    $_SESSION['success'] = "Book borrowed successfully";
                }
            }
        }
        $this->router->redirect('/dashboard');
    }
}
