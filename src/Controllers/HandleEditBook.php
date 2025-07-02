<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Assert\Assertion;
use Core\Router;
use Exception;

class HandleEditBook
{
    public function __construct(
        private Book $book,
        private Router $router
    ) {}

    public function action()
    {
        $post = $_POST;
        $book_id = $_GET['book_id'];
        try {
            Assertion::notEmpty($post['author'], "Author is required");
            Assertion::notEmpty($post['genre'], "New Genre is required");
             if (ctype_digit($post['genre'])) {
                $_SESSION['error'] = 'Invalid genre';
                $this->router->redirect("/editbook");
            }
            Assertion::notEmpty($post['copies'], "Copies is required");
             if ($post['copies'] <= 0) {
                $_SESSION['error'] = 'Invalid copies';
                $this->router->redirect("/editbook");
             }
            Assertion::notEmpty($post['description'], "description is required");
             if (ctype_digit($post['genre'])) {
                $_SESSION['error'] = 'Invalid genre';
                $this->router->redirect("/editbook");
            }

            $this->book->editBook($post, $book_id);

            $this->book->updateInventory($book_id, $post['copies'], $post['copies']);
            $_SESSION['success'] = 'Book edited successfully';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $this->router->redirect("/booklist");
    }
}
