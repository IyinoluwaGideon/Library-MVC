<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Book;
use Assert\Assertion;
use Core\Router;
use DateTime;
use Exception;
use PDO;

class HandleAddbook
{

    public function __construct(
        private PDO $pdo,
        private Router $router,
        private Book $book
    ) {}

    public function action()
    {
        try {
            $post = $_POST;
            Assertion::notEmpty($post['title'], 'The title of the book is required' . "\n");
            Assertion::notEmpty($post['author'], 'The name of the author is required' . "\n");
            Assertion::notEmpty($post['isbn'], 'ISBN is required' . "\n");
            Assertion::notEmpty($post['publication_year'], 'Publication_Date is required');
            Assertion::notEmpty($post['genre'], 'The genre is required');
            Assertion::notEmpty($post['copies'], 'The number of copies is requied' . "\n");
            Assertion::notEmpty($post['description'], 'The description is required' . "\n");
            Assertion::lessOrEqualThan($post['publication_year'], date("Y"), "The year is not valid");

            $this->book->addbook($post);
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

        $this->router->redirect('/dashboard');
    }
}
