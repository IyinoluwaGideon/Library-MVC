<?php
declare(strict_types=1);

namespace Core;

use App\Controllers\HandleLogin;
use App\Controllers\HandleRegistration;
use App\Controllers\ViewDashboard;
use App\Controllers\ViewLoginPage;
use App\Controllers\ViewRegistrationPage;
use App\Models\User;

class Router {
    private array $routes = [];

    private HandleRegistration $handleRegistration;
    private ViewRegistrationPage $viewRegistrationPage;
    private HandleLogin $handleLogin;
    private ViewLoginPage $viewLoginPage;
    private ViewDashboard $viewDashboard;
    

    public function __construct(Database $database, private User $user ) {
        $this->viewRegistrationPage = new ViewRegistrationPage();
        $this->viewLoginPage = new ViewLoginPage();
        $this->handleRegistration = new HandleRegistration($database->getPDO(), $this, $this->user);
        $this->handleLogin = new HandleLogin($database->getPDO(), $this,  $this->user);
        $this->viewDashboard = new ViewDashboard();


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