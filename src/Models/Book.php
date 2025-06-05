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
    }

    public function createLibraryTable()
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
}
