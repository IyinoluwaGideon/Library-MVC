<?php  

session_start();
require_once __DIR__  . '/../vendor/autoload.php';

use App\Models\User;
use Core\Database;
use Core\Router;

require_once __DIR__ . '/../config/config.php';

$database = new Database($host, $db, $user, $password,);
$dsn = sprintf("mysql:host=%s;dbname=%s;charset=UTF8", $host, $db);
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$user = new User($pdo);
$router = new Router($database, $user);


$router->get("/login", "viewLoginPage");
$router->get("/register", "viewRegistrationPage");
$router->post("/register", "handleRegistration");
$router->post("/login", "handleLogin");
$router->get("/dashboard", "viewDashboard");
$router->get("/logout", "handleLogout");

$router->handleRequest();