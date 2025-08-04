<?php

declare(strict_types=1);


namespace App\Controllers;

require_once __DIR__ . '/../helper/upload.php';

use App\Models\Book;
use Assert\Assertion;
use Core\Router;
use Exception;

use function App\helper\uploadImage;

class HandleEditBook
{
    public function __construct(
        private Book $book,
        private Router $router
    ) {}

    public function action()
    {
        $post = $_POST;
        $imgUrl = uploadImage($_FILES);
        $book_id = (int) $_GET['book_id'];
        try {
            Assertion::notEmpty($post['author'], "Author is required");

            if ($imgUrl !== null) {
                $post['image'] = $imgUrl;  // Only override if a new image was uploaded
            }
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

            $this->book->updateInventory($book_id, (int) $post['copies'], (int) $post['copies']);
            $_SESSION['success'] = 'Book edited successfully';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        $this->router->redirect("/booklist");
    }
}
