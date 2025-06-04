<?php

declare(strict_types=1);

namespace App\Controllers;

class ViewDashboard {
    public function action() {
         require_once __DIR__  . '/../Views/dashboard.php';
    }
}