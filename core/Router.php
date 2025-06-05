<?php
declare(strict_types=1);

namespace Core;

use App\Controllers\HandleAddbook;
use App\Controllers\HandleLogin;
use App\Controllers\HandleLogout;
use App\Controllers\HandleRegistration;
use App\Controllers\ViewAddbook;
use App\Controllers\ViewDashboard;
use App\Controllers\ViewLoginPage;
use App\Controllers\ViewRegistrationPage;
use App\Models\Book;
use App\Models\User;

class Router {
    private array $routes = [];

    private HandleRegistration $handleRegistration;
    private ViewRegistrationPage $viewRegistrationPage;
    private HandleLogin $handleLogin;
    private ViewLoginPage $viewLoginPage;
    private ViewDashboard $viewDashboard;
    private HandleLogout $handleLogout;
    private HandleAddbook $handleAddbook;
    private ViewAddbook $viewAddbook;
    

    public function __construct(Database $database, private User $user, private Book $book) {
        $this->viewRegistrationPage = new ViewRegistrationPage();
        $this->viewLoginPage = new ViewLoginPage();
        $this->handleRegistration = new HandleRegistration($database->getPDO(), $this, $this->user);
        $this->handleLogin = new HandleLogin($database->getPDO(), $this,  $this->user);
        $this->viewDashboard = new ViewDashboard($this);
        $this->handleLogout = new HandleLogout($database->getPDO(), $this);
        $this->handleAddbook = new HandleAddbook($database->getPDO(), $this, $this->book);
        $this->viewAddbook = new ViewAddbook($this);
    }


    public function get(string $uri, string $class) {
        $this->addRoute('GET', $uri, $class);
    }

    public function post(string $uri, string $class) {
        $this->addRoute('POST', $uri, $class);
    }

    private function addRoute(string $method, string $uri, string $controller) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function handleRequest() {
        [$uri] = explode("?", $_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controller = $route['controller'];
                $this->$controller->action();
            }
        }
    }

    public function redirect(string $url) {
        header('Location:' . $url);
        exit;
    }
}