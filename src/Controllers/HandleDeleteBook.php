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

        $bookEntry = $this->borrow->getBookEntry();
        
        $this->book->deleteInventory();
        $book_id = $_GET['book_id'];
        if ($bookEntry === false) {
            //There is nothing to delete.
            $this->book->deleteBook($book_id);
            $_SESSION["success"] = "Book deleted successfully";
        } else {
            $_SESSION['error'] = "This Book is still has a borrow history, it can't be deleted ";
        }

        $this->router->redirect("/booklist");
    }
}
