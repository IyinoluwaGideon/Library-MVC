<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Core\Router;

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
        
        $bookEntry = $this->borrow->getBookEntry($book_id, $user_id);
        $bookAvailability = $this->book->checkAvailability($book_id);
        $userBorrowedBooks = $this->borrow->countUserBorrowedBooks($user_id);
        $borrows = $this->borrow->getUserBorrowedBooks($user_id);

        foreach ($borrows as $borrow) {
            if ($borrow['fine'] > 0) {
                $_SESSION['warning'] = "You have the fine of ₦" . $borrow['fine'] . " " . "to pay, to borrow again";
                $this->router->redirect("/booklist");
            }
        }
        if ($userBorrowedBooks >= 3) {
            $_SESSION['error'] = "Limit reached; return and cacel to borrow";
            $this->router->redirect("/dashboard");
        }
        if (!$bookAvailability) {
            $_SESSION['error'] = "This book is not available";
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
