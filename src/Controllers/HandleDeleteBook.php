<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Core\Router;

class HandleDeleteBook
{
    public function __construct(
        private Book $book,
        private Router $router,
        private Borrow $borrow
    ) {}

    public function action()
    {

         $book_id = (int) $_GET['book_id'];
        $bookEntry = $this->borrow->getBookEntryy($book_id);
        $this->book->deleteInventory();
        if (!$bookEntry) {
            $this->book->deleteBook($book_id);   
            $_SESSION["success"] = "Book deleted successfully";
        } else {
            $_SESSION['error'] = "This Book still has a borrow history on a user's acc; it can't be deleted ";
        }

        $this->router->redirect("/booklist");
    }
}
