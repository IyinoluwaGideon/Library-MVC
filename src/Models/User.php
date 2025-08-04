<?php

namespace App\Models;

use Exception;
use PDO;

class User
{

    public function __construct(
        private PDO $pdo

    ) {}

    public function checkUserByEmail(array $post): array
    {
        $stmt = $this->pdo->prepare("SELECT EXISTS (SELECT 1 FROM users WHERE email = :email) AS email_exists");
        $stmt->execute(['email' => $post['email']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }


    public function createUser(array $post): int
    {
        $this->createUserTable();
        $sql = 'INSERT INTO users(username, email, password, role) VALUES(:username, :email, :password, :role)';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':username' => $post['username'],
            ':email' => $post['email'],
            ':password' => password_hash($post['password'], PASSWORD_BCRYPT),
            ':role' => 'user'
        ]);

        return $this->pdo->lastInsertId();
    }


    public function checkUserByUsername(string $username): ?array
    {
        $sql = 'SELECT * FROM users
                WHERE username = :username';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':username' => $username
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }


    private function createUserTable(): void
    {
        $query = "CREATE TABLE IF NOT EXISTS users ( 
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL, 
            role VARCHAR(255) NOT NULL
      
)";
        $this->pdo->exec($query);
    }

    public function userProfile(): ?array
    {

        $sql = 'SELECT * FROM users
                WHERE id = :id';


        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id' => $_SESSION["user_id"]
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }

    public function editProfile(array $post): void
    {
        $sql = 'UPDATE users
                SET username = :username, image = :image
                WHERE id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':username' => $post['username'],
            ':image' => $post['image'] ?? null,
            ':user_id' => $_SESSION['user_id']
        ]);
    }

    public function deleteUser(int $user_id): bool
    {
        $sql = 'DELETE FROM users
                WHERE id = :user_id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);


        return $statement->execute();
    }

    public function fetchUserRecord(): array
    {

        $sql = 'SELECT * FROM users';


        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function fetchAllUsers(): array
    {
        $sql = 'SELECT * FROM users';

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
}
