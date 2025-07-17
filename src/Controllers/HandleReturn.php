<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Core\Router;
use DateTime;

class HandleReturn
{
    public function __construct(
        private Borrow $borrow,
        private Router $router,
        private Book $book
    ) {}

    // public function action()
    // {
    //     $book_id = (int) $_GET['book_id'];
    //     $user_id = (int) $_GET['user_id'];


    //     $bookEntry = $this->borrow->getBookEntry($book_id, $user_id);

    //     if ($bookEntry === false) {
    //         $_SESSION['error'] = "You have not borrowed this book";
    //     } else {
    //         if ($bookEntry['return_date'] === null) {
    //             $this->book->increaseAvailableCopies($book_id);
    //             $this->borrow->setReturnDate();
    //             $_SESSION['success'] = "Book returned successfully";
    //         } else {

    //             $_SESSION['error'] = "You have not borrowed this book";
    //         }
    //     }

    //     $this->router->redirect('/dashboard');
    // }


    public function action()
    {
        $book_id = (int) $_GET['book_id'];
        $user_id = (int) $_GET['user_id'];

        $bookEntry = $this->borrow->getBookEntry($book_id, $user_id);

        $dueDate = new DateTime($bookEntry['due_date']);
        $returnDate = new DateTime();

        $fine = 0;
        if ($bookEntry === false) {
            $_SESSION['error'] = "You have not borrowed this book";
            return;
        }
        if ($bookEntry['return_date'] === null) {
            $this->borrow->updateReturnAndFine($returnDate, $fine, $book_id, $user_id);
            $this->book->increaseAvailableCopies($book_id);
            $_SESSION['success'] = "Book returned successfully";
           
        }
        // late return 
        if ($returnDate > $dueDate) {
            $daysLate = $dueDate->diff($returnDate)->days;
            $fine = $daysLate * 1000;
            $this->borrow->updateReturnAndFine($returnDate, $fine, $book_id, $user_id);
            $_SESSION['success'] = "Book returned. Fine: ₦" . $fine;
            $_SESSION['warning'] =  "You have an outstanding fine of ₦" . $fine . " to pay.";
        
        }
        $this->router->redirect('/dashboard');
    }
}
