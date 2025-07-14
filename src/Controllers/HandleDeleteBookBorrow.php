<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Borrow;
use Core\Router;

class HandleDeleteBookBorrow
{
    public function __construct(
        private Borrow $borrow,
        private Router $router
    ) {}

    public function action()
    {
        $book_id = (int) $_GET['book_id'];
        $user_id = $_SESSION['user_id'];
        $bookEntry = $this->borrow->getBookEntry($book_id, $user_id);

        if ($bookEntry['fine'] > 0) {
            $_SESSION['warning'] = "Pls pay your fine of " . $bookEntry['fine'] . " " . "to cancel borrow";
            $this->router->redirect("/booklist");
            return;
        }
        if (!$bookEntry) {
            //There is nothing to delete.
            $_SESSION['error'] = "Book borrow details not found";
        } else {
            if ($bookEntry["return_date"] === null) {
                //Book is still borrowed, can't be cancled unless returned.
                $_SESSION['error'] = "Book borrowed is yet to be returned; Return to cancle borrow";
            } else {
                $this->borrow->deleteBookBorrowDetails($book_id, $user_id);
                $_SESSION['success'] = "Book borrow details is deleted successfully";
            }
        }
        $this->router->redirect("/booklist");
    }
}
