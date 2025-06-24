<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Borrow;
use Core\Router;
use Exception;

class HandleBorrowBook
{
    public function __construct(
        private Borrow $borrow,
        private Router $router
    ) {}

    public function action()
    {

        $bookEntry = $this->borrow->getBookEntry();

        if ($bookEntry === false) {
            // the book has not been borrowed
            $this->borrow->borrow();
            $_SESSION['success'] = "Book borrowed successfully";
        } else {
            // the book has been borrowed
            
            if ($bookEntry['return_date'] === null) {
                // you've already borrowed the book
                $_SESSION['error'] = "You have borrowed this book";
            } else {
                // you've borrowed it before, retuned it, and can now borrow again
                $this->borrow->borrow();
                $_SESSION['success'] = "Book borrowed successfully";
            }
        }

        $this->router->redirect('/dashboard');
    }
}
