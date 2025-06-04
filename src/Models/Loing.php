<?php

namespace App\Models;

use PDO;

class Login

{

    public function __construct(
        private PDO $pdo,
        private User $user
          
    ) {}


    public function userLogin() 
    {
        $sql = 'SELECT password FROM users
                WHERE name = :username';

        $statement = $this->pdo->prepare($sql);

        $statement->execute([
            ':username' => $_POST['username'],
        ]);

        $this->user = $statement->fetch(PDO::FETCH_ASSOC);
    }
}
