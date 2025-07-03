<?php

declare(strict_types=1);

namespace App\Models;

use PDO;

class Book
{

    public function __construct(
        private PDO $pdo
    ) {}

    public function addbook($post)
    {
        $this->createLibraryTable();
        $this->createInventoryTable();

        $sql = 'INSERT INTO library(title, author, isbn, publication_year, genre, copies, description) 
                VALUES(:title, :author, :isbn, :publication_year, :genre, :copies, :description)';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':title' => $post['title'],
            ':author' => $post['author'],
            ':isbn' => $post['isbn'],
            ':publication_year' => $post['publication_year'],
            ':genre' => $post['genre'],
            ':copies' => $post['copies'],
            ':description' => $post['description']
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function createLibraryTable(): void
    {
        $query = "CREATE TABLE IF NOT EXISTS library(
                  book_id INT AUTO_INCREMENT PRIMARY KEY,
                  title VARCHAR(255) NOT NULL,
                  author VARCHAR(255) NOT NULL,
                  isbn VARCHAR(255) NOT NULL,
                  publication_year YEAR NOT NULL,
                  genre VARCHAR(255) NOT NULL,
                  copies INT NOT NULL,
                  image VARCHAR(255) NULL,
                  description VARCHAR(255) NOT NULL
                  )";

        $this->pdo->exec($query);
    }

    public function fetchAllBooks(): array
    {
        $sql = 'SELECT * FROM library';

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $books = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }



    public function findBook(int $book_id): array
    {
        $sql = 'SELECT * FROM library
                WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':book_id' => $book_id
        ]);

        $book = $statement->fetch(PDO::FETCH_ASSOC);
        return $book;
    }

    public function getBookByTitle(string $title)
    {
        $sql = 'SELECT * FROM library
                WHERE LOWER(title) = :title';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':title' => $title
        ]);
        $book = $statement->fetch(PDO::FETCH_ASSOC);
        return $book;
    }


    public function deleteBook(int $book_id): bool
    {
        $sql = 'DELETE FROM library
                WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);
        return $statement->execute([
            ':book_id' => $book_id
        ]);
    }

    public function deleteInventory()
    {
        $sql = 'DELETE FROM inventory
                WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $_GET['book_id']
        ]);
    }

    public function editBook($post, $book_id)
    {

        $sql = 'UPDATE library
                SET author = :author, 
                genre = :genre,
                copies = :copies,
                description = :description 
                WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':author' => $post['author'],
            ':genre' => $post['genre'],
            ':copies' => $post['copies'],
            ':description' => $post['description'],
            ':book_id' => $book_id
        ]);
        return true;
    }

    public function searchBooks($title,  $author)
    {
        $sql = 'SELECT * FROM library
                 WHERE title LIKE :title
               OR author LIKE :author';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':title' => '%' . $title . '%',
            ':author' => '%' . $author . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createInventoryTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS inventory(
                  book_id INT PRIMARY KEY,
                  total_copies INT NOT NULL,
                  available_copies INT NOT NULL,
                   FOREIGN KEY (book_id) REFERENCES library(book_id)
                  )";

        $this->pdo->exec($query);
    }


    public function updateInventory($book_id, $total_copies, $available_copies)
    {
        $sql = 'INSERT INTO inventory(book_id, total_copies, available_copies) 
                VALUES(:book_id, :total_copies, :available_copies)
                 ON DUPLICATE KEY UPDATE
                total_copies = VALUES(total_copies),
                available_copies = VALUES(available_copies)';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $book_id,
            ':total_copies' => $total_copies,
            ':available_copies' => $available_copies
        ]);
    }

    public function checkAvailability(int $book_id)
    {
        $sql = 'SELECT available_copies FROM inventory
            WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([':book_id' => $book_id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result && $result['available_copies'] > 0;
    }


    public function getInventoryDetails(int $book_id)
    {
        $sql = 'SELECT total_copies, available_copies
                FROM inventory 
                WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $book_id
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function reduceAvailableCopies(int $book_id)
    {
        $sql = 'UPDATE inventory
            SET available_copies = available_copies - 1
            WHERE book_id = :book_id AND available_copies > 0';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([':book_id' => $book_id]);
    }

    public function increaseAvailableCopies($book_id)
    {
        $sql = 'UPDATE inventory
        SET available_copies = available_copies + 1
        WHERE book_id = :book_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $book_id

        ]);
    }
}
