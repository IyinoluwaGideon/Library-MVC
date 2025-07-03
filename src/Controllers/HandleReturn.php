<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Core\Router;

class HandleReturn
{
    public function __construct(
        private Borrow $borrow,
        private Router $router,
        private Book $book
    ) {}

    public function action()
    {
        $book_id = (int) $_GET['book_id'];

        $bookEntry = $this->borrow->getBookEntry();

        if ($bookEntry === false) {
            $_SESSION['error'] = "You have not borrowed this book";
        } else {
            if ($bookEntry['return_date'] === null) {
                 $this->book->increaseAvailableCopies($book_id);
                $this->borrow->setReturnDate();
                $_SESSION['success'] = "Book returned successfully";
            } else {

                 $_SESSION['error'] = "You have not borrowed this book";
            }
        }

        $this->router->redirect('/dashboard');
    }
}
