<?php
declare(strict_types=1);

namespace App\Controllers;

class viewLoginPage {
    public function action() {
         require_once __DIR__  . '/../Views/login.php';
    }
}