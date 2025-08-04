<?php

declare(strict_types=1);

namespace App\Controllers;

require_once __DIR__ . '/../helper/upload.php';


use App\Models\Book;
use Assert\Assertion;
use Core\Router;
use Exception;

use function App\helper\uploadImage;

class HandleAddbook
{

    public function __construct(
        private Router $router,
        private Book $book
    ) {}

    public function action()
    {

        try {
            $post = $_POST;
            $imgUrl = uploadImage($_FILES);
            Assertion::notEmpty($post['title'], 'The title of the book is required' . "\n");
            $post['image'] = $imgUrl;
            if (ctype_digit($post['title'])) {
                $_SESSION['error'] = "Invalid title;";
                $this->router->redirect("/addbook");
            }
            Assertion::notEmpty($post['author'], 'The name of the author is required' . "\n");
            if (Assertion::notEmpty($post['isbn'], 'ISBN is required' . "\n")) {
            }
            $isbn = str_replace('-', '', $post['isbn']);
            if (!ctype_digit($isbn) || (strlen($isbn) !== 13)) {
                $_SESSION['error'] = "ISBN must be eaual to 13 digit number only";
                $this->router->redirect("/addbook");
            }
            Assertion::notEmpty($post['publication_year'], 'Publication_Date is required');

            Assertion::notEmpty($post['genre'], 'The genre is required');
            if (ctype_digit($post['genre'])) {
                $_SESSION['error'] = 'Invalid genre';
                $this->router->redirect("/addbook");
            }
            Assertion::notEmpty($post['copies'], 'The number of copies is requied' . "\n");
            if ($post['copies'] <= 0) {
                $_SESSION['error'] = 'Invalid copies';
                $this->router->redirect("/addbook");
            }
            Assertion::notEmpty($post['description'], 'The description is required' . "\n");
            if (ctype_digit($post['description'])) {
                $_SESSION['error'] = 'Invalid Description';
                $this->router->redirect("/addbook");
            }
            Assertion::lessOrEqualThan($post['publication_year'], date("Y"), "The year is not valid");
            $title = $post['title'];
            $exisistingBook = $this->book->getBookByTitle($title);
            if (!$exisistingBook) {
                $book_id = $this->book->addbook($post);
                $total_copies = (int) $post['copies'];
                $available_copies = (int) $post['copies'];
                $this->book->updateInventory($book_id, $total_copies, $available_copies);
                $_SESSION['success'] = "Book added susscessfully";
            } else {
                $_SESSION['error'] = 'This book is avaiblable in the library; pls update the copies';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $_SESSION['inputs'] = [
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'isbn' => $_POST['isbn'],
                'publication_year' => $_POST['publication_year'],
                'genre' => $_POST['genre'],
                'copies' => $_POST['copies'],
                'description' => $_POST['description'],
                'publication_year' => $_POST['publication_year']

            ];
            $this->router->redirect('/addbook');
        }

        $this->router->redirect('/booklist');
    }
}
