<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Core\Router;

class ViewDashboard {

    public function __construct(
        private Router $router,
        private Book $book,
        private Borrow $borrow
    )
    {
        
    }
    public function action() {
        if(isset($_SESSION['username']))
        {
            $borrowList = $this->borrow->getUserBorrowList();

            $books = [];
            foreach($borrowList as $id => $borrowedRecord){
                $book = $this->book->findBook($borrowedRecord['book_id']);
                $book['return_date'] = $borrowedRecord['return_date'];
                $books[] = $book;
            }

            $count = 1;

            require_once __DIR__  . '/../Views/dashboard.php';
        }else
        {
            $this->router->redirect('/login');
        }   
    }
}