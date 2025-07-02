<?php

declare(strict_types=1);

namespace App\Models;

use Core\Router;
use DateTime;
use PDO;

class Borrow
{
    public function __construct(
        private PDO $pdo,
    ) {}

    public function getBookEntry()
    {
        $sql = 'SELECT * FROM  borrow
                WHERE book_id = :book_id AND user_id = :user_id
                ORDER BY borrow_id DESC';


        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $_GET['book_id'],
            ':user_id' => $_GET['user_id']
        ]);

        $borrowEntry = $statement->fetch(PDO::FETCH_ASSOC);
        return $borrowEntry;
    }


     public function getBookEntryy()
    {
        $sql = 'SELECT * FROM  borrow
                WHERE book_id = :book_id OR user_id = :user_id
                ORDER BY borrow_id DESC';


        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $_GET['book_id'],
            ':user_id' => $_GET['user_id']
        ]);

        $borrowEntry = $statement->fetch(PDO::FETCH_ASSOC);
        return $borrowEntry;
    }

    public function createBorrowTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS borrow(
                borrow_id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                book_id INT NOT NULL,
                borrow_date DATE NOT NULL,
                due_date DATE NOT NULL,
                return_date DATE, 
                fine INT NULL,
                
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (book_id) REFERENCES library(book_id) 
            )';

        $this->pdo->exec($query);
    }

    public function borrow()
    {
        $this->createBorrowTable();

        $sql = 'INSERT INTO borrow(user_id, book_id, borrow_date, due_date) 
                VALUES(:user_id, :book_id, :borrow_date, :due_date)';

        $today = new DateTime();
        $dueDate = (new DateTime())->modify('+5 days');

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':user_id' => $_GET['user_id'],
            ':book_id' => $_GET['book_id'],
            ':borrow_date' => $today->format('Y-m-d'),
            ':due_date' => $dueDate->format('Y-m-d')
        ]);
    }

    public function setReturnDate()
    {

        $today = new DateTime();
        $sql = 'UPDATE borrow
                SET return_date = :return_date
                WHERE book_id = :book_id AND user_id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $_GET['book_id'],
            ':user_id' => $_GET['user_id'],
            ':return_date' => $today->format('Y-m-d')
        ]);
    }

    public function returnLimit()
    {

        $sql = 'SELECT * FROM borrow
                WHERE book_id = :book_id AND user_id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $_GET['book_id'],
            ':user_id' => $_GET['user_id']
        ]);
    }

    public function getUserBorrowList()
    {
        $sql = 'SELECT * FROM borrow
                WHERE user_id = :user_id';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':user_id' => $_SESSION['user_id']
        ]);

        $borrowList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $borrowList;
    }

    public function deleteUserBorrowDetails($user_id)
    {
        $sql = 'DELETE FROM borrow
                WHERE user_id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function deleteBookBorrowDetails($book_id, $user_id)
    {
        $sql = 'DELETE FROM borrow
                WHERE book_id = :book_id AND user_id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);


        return $statement->execute();
    }
}
