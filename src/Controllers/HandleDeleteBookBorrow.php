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
        $book_id = $_GET['book_id'];
        // $user_id = $_SESSION['user_id'];

        $borrowDetail = $this->borrow->deleteBookBorrowDetails($book_id);

        if ($borrowDetail) {
            $this->borrow->deleteBookBorrowDetails($book_id);

            $_SESSION['success'] = "Book borrow details is deleted successfully";

        } else {
            $_SESSION['error'] = "Book borrow details not found";
        }

        $this->router->redirect("/dashboard");
    }
}
