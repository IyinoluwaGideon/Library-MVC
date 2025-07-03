<?php

declare(strict_types=1);

namespace Core;

use App\Controllers\HandleAddbook;
use App\Controllers\HandleBorrowBook;
use App\Controllers\HandleDeleteBook;
use App\Controllers\HandleDeleteBookBorrow;
use App\Controllers\HandleDeleteUser;
use App\Controllers\HandleDeleteUserBorrow;
use App\Controllers\HandleEditBook;
use App\Controllers\HandleEditProfile;
use App\Controllers\HandleLogin;
use App\Controllers\HandleLogout;
use App\Controllers\HandleRegistration;
use App\Controllers\HandleReturn;
use App\Controllers\HandleSearchBooks;
// use App\Controllers\HandleUploadImage;
use App\Controllers\HandleUserProfile;
use App\Controllers\ViewAddbook;
use App\Controllers\ViewBookdetail;
use App\Controllers\ViewBookList;
use App\Controllers\ViewDashboard;
use App\Controllers\ViewEditBook;
use App\Controllers\ViewEditProfile;
use App\Controllers\ViewLibrary;
use App\Controllers\ViewLoginPage;
use App\Controllers\ViewRegistrationPage;
use App\Controllers\ViewUploadImage;
use App\Controllers\ViewUserProfile;
use App\Controllers\ViewUserRecord;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;

class Router
{
    private array $routes = [];

    private HandleRegistration $handleRegistration;
    private ViewRegistrationPage $viewRegistrationPage;
    private HandleLogin $handleLogin;
    private ViewLoginPage $viewLoginPage;
    private ViewDashboard $viewDashboard;
    private HandleLogout $handleLogout;
    private HandleAddbook $handleAddbook;
    private ViewAddbook $viewAddbook;
    private ViewBookdetail $viewBookdetail;
    private ViewBooklist $viewBooklist;
    private HandleBorrowBook $handleBorrowBook;
    private ViewLibrary $viewLibrary;
    private HandleReturn $handleReturn;
    private HandleUserProfile $handleUserProfile;
    private ViewUserProfile $viewUserProfile;
    private ViewEditProfile $viewEditProfile;
    private HandleEditProfile $handleEditProfile;
    // private HandleUploadImage $handleUploadImage;
    private ViewUploadImage $viewUploadImage;
    private HandleDeleteUser $handleDeleteUser;
    //private HandleDeleteUserBorrow $handleDeleteUserBorrow;
    private ViewUserRecord $viewUserRecord;
    private HandleDeleteBook $handleDeleteBook;
    private HandleDeleteBookBorrow $handleDeleteBookBorrow;
    private HandleEditBook $handleEditBook;
    private ViewEditBook $viewEditBook;
    private HandleSearchBooks $handleSearchBooks;
 
    public function __construct(Database $database, private User $user, private Book $book, private Borrow $borrow)
    {
        $this->viewRegistrationPage = new ViewRegistrationPage();
        $this->viewLoginPage = new ViewLoginPage();
        $this->handleRegistration = new HandleRegistration($database->getPDO(), $this, $this->user);
        $this->handleLogin = new HandleLogin($this,  $this->user);
        $this->viewDashboard = new ViewDashboard($this, $this->book, $this->borrow);
        $this->handleLogout = new HandleLogout($database->getPDO(), $this);
        $this->handleAddbook = new HandleAddbook($this, $this->book);
        $this->viewAddbook = new ViewAddbook($this);
        $this->viewBookdetail = new ViewBookdetail($this->book, $this);
        $this->viewBooklist = new ViewBooklist($this, $this->book);
        $this->handleBorrowBook = new HandleBorrowBook($this->borrow, $this, $this->book);
        $this->viewLibrary = new ViewLibrary($this, $this->book);
        $this->handleReturn = new HandleReturn($this->borrow, $this, $this->book);
        $this->handleUserProfile = new HandleUserProfile($this->user);
        $this->viewUserProfile = new ViewUserProfile($this->user, $this);
        $this->viewEditProfile = new ViewEditProfile();
        $this->handleEditProfile = new HandleEditProfile($this->user, $this);
        $this->viewUploadImage = new ViewUploadImage();
        // $this->handleUploadImage = new HandleUploadImage($this);
        $this->handleDeleteUser = new HandleDeleteUser($this->user, $this, $this->borrow);
        //$this->handleDeleteUserBorrow = new HandleDeleteUserBorrow($this->borrow, $this);
        $this->viewUserRecord = new ViewUserRecord($this, $this->user);
        $this->handleDeleteBook = new HandleDeleteBook($this->book, $this, $this->borrow);
        $this->handleDeleteBookBorrow = new HandleDeleteBookBorrow($this->borrow, $this);
        $this->handleEditBook = new HandleEditBook($this->book, $this);
        $this->viewEditBook = new ViewEditBook();
        $this->handleSearchBooks = new HandleSearchBooks($this->book, $this);
        }


    public function get(string $uri, string $class)
    {
        $this->addRoute('GET', $uri, $class);
    }

    public function post(string $uri, string $class)
    {
        $this->addRoute('POST', $uri, $class);
    }

    private function addRoute(string $method, string $uri, string $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function handleRequest()
    {
        [$uri] = explode("?", $_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controller = $route['controller'];
                $this->$controller->action();
            }
        }
    }

    public function redirect(string $url)
    {
        header('Location:' . $url);
        exit;
    }
}
