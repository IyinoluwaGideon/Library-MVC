<?php

namespace App\Models;

use PDO;

class User
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function checkUserByEmail($post)
    {
        $stmt = $this->pdo->prepare("SELECT EXISTS (SELECT 1 FROM users WHERE email = :email) AS email_exists");
        $stmt->execute(['email' => $post['email']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function createUser($post)
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
    }


    public function checkUserByUsername()
    {
        $sql = 'SELECT * FROM users
                WHERE username = :username';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':username' => $_POST['username']
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $user;   
    }


    private function createUserTable()
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
}
