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

    public function getBookEntry(int $book_id, int $user_id): ?array
    {
        $sql = 'SELECT * FROM  borrow
                WHERE book_id = :book_id AND user_id = :user_id
                ORDER BY borrow_id DESC';


        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $book_id,
            ':user_id' => $user_id
        ]);

        $bookEntry = $statement->fetch(PDO::FETCH_ASSOC);
        return $bookEntry ?: null;;
    }


    public function getBookEntryy(int $book_id): ?array
    {
        $sql = 'SELECT * FROM  borrow
                WHERE book_id = :book_id
                ORDER BY borrow_id DESC';


        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':book_id' => $book_id,
        ]);

         $bookEntry = $statement->fetch(PDO::FETCH_ASSOC);
        return $bookEntry ?: null;
    }

       public function getUserBorrowedBooks(int $user_id): ?array
    {
        $sql = 'SELECT * FROM  borrow
                WHERE user_id = :user_id
                ORDER BY borrow_id DESC';


        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':user_id' => $user_id
        ]);

        $borrowedBooks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $borrowedBooks ?: null;
    }

    public function createBorrowTable(): void
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

    public function borrow(int $user_id, int $book_id): void
    {
        $this->createBorrowTable();

        $sql = 'INSERT INTO borrow(user_id, book_id, borrow_date, due_date) 
                VALUES(:user_id, :book_id, :borrow_date, :due_date)';

        $today = new DateTime();
        $dueDate = (new DateTime())->modify('+5 days');

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':user_id' => $user_id,
            ':book_id' => $book_id,
            ':borrow_date' => $today->format('Y-m-d'),
            ':due_date' => $dueDate->format('Y-m-d')
        ]);
    }

    public function setReturnDate(): void
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

    public function updateReturnAndFine(DateTime $returnDate, int $fine, int $book_id, int $user_id): void
    {
        $sql = 'UPDATE borrow 
            SET fine = :fine, return_date = :return_date 
            WHERE book_id = :book_id AND user_id = :user_id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':fine' => $fine,
            ':return_date' => $returnDate->format('Y-m-d'),
            ':book_id' => $book_id,
            ':user_id' => $user_id
        ]);
    }

    // public function returnLimit()
    // {

    //     $sql = 'SELECT * FROM borrow
    //             WHERE book_id = :book_id AND user_id = :user_id';

    //     $statement = $this->pdo->prepare($sql);
    //     $statement->execute([
    //         ':book_id' => $_GET['book_id'],
    //         ':user_id' => $_GET['user_id']
    //     ]);
    // }

    public function getUserBorrowList(): array
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

    public function deleteUserBorrowDetails(int $user_id): bool
    {
        $sql = 'DELETE FROM borrow
                WHERE user_id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function deleteBookBorrowDetails(int $book_id, int $user_id): bool
    {
        $sql = 'DELETE FROM borrow
                WHERE book_id = :book_id AND user_id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);


        return $statement->execute() ?: null;
    }

    public function countUserBorrowedBooks(int $user_id): int
    {
        $sql = 'SELECT COUNT(*) FROM borrow WHERE user_id = :user_id';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':user_id' => $user_id]);
        return (int) $statement->fetchColumn();
    }
}
