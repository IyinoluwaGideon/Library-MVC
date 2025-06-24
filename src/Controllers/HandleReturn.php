<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Borrow;
use Core\Router;

class HandleReturn
{
    public function __construct(
        private Borrow $borrow,
        private Router $router
    ) {}

    public function action()
    {

        $bookEntry = $this->borrow->getBookEntry();

        if ($bookEntry === false) {
            //No book is borrowed, no bo book can be returned
            $_SESSION['error'] = "You have not borrowed this book";
        } else {
            //You can return the book
            if ($bookEntry['return_date'] === null) {
                //You can return the book
                $this->borrow->setReturnDate();
                $_SESSION['success'] = "Book returned successfully";
            } else {
                //You have returned this book
                 $_SESSION['error'] = "You have not borrowed this book";
            }
        }

        $this->router->redirect('/dashboard');
    }
}
