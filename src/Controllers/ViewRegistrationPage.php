<?php
declare(strict_types=1);

namespace App\Controllers;

class ViewRegistrationPage {
    public function action ()
    {
        require_once __DIR__ . '/../Views/register.php';
    }
}