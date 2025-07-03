<?php  

session_start();
require_once __DIR__  . '/../vendor/autoload.php';

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Core\Database;
use Core\Router;

require_once __DIR__ . '/../config/config.php';

$database = new Database($host, $db, $user, $password,);
$dsn = sprintf("mysql:host=%s;dbname=%s;charset=UTF8", $host, $db);
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$user = new User($pdo);
$book = new Book($pdo);
$borrow = new Borrow($pdo);
$router = new Router($database, $user, $book, $borrow);


$router->get("/login", "viewLoginPage");
$router->get("/register", "viewRegistrationPage");
$router->post("/register", "handleRegistration");
$router->post("/login", "handleLogin");
$router->get("/dashboard", "viewDashboard");
$router->get("/logout", "handleLogout");
$router->get("/addbook", "viewAddbook");
$router->post("/addbook", "handleAddbook");
$router->get("/bookdetail", "viewBookdetail");
$router->get("/booklist", "viewBooklist");
$router->get("/borrow", "handleBorrowBook");
$router->get("/hrflibrary", "viewLibrary"); 
$router->get("/return", "handleReturn");
$router->get("/userprofile", "viewUserProfile");
$router->post("/editprofile", "handleEditProfile");
$router->get("/editprofile", "viewEditProfile");
$router->get("/uploadimage", "viewUploadImage");
$router->post("/uploadimage", "handleUploadImage");
$router->get("/deleteuser", 'handleDeleteUser');
//$router->get("/deleteuseruorrowdetails", 'handleDeleteUserBorrow');
$router->get("/userrecord", "viewUserRecord");
$router->get("/deletebook", "handleDeleteBook");
$router->get("/deleteBookBorrowDetails", 'handleDeleteBookBorrow');
$router->get("/editbook", "viewEditBook");
$router->post("/editbook", "handleEditBook");
$router->get("/searchbooks", "handleSearchBooks");
 










$router->handleRequest();