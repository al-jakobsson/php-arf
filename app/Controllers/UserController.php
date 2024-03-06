<?php

namespace Controllers;

use Arf\Clean;
use Arf\HTTP;
use Arf\Session;
use Arf\View;
use Exception;
use Models\StatusMessage;
use Models\User;

class UserController
{
    const array STYLESHEETS = [
        '/css/user.css'
    ];
    
    public static function index()
    {
        new Session();

        $users = User::all();

        View::render(
            view: 'User/UserIndexPage',
            pageData: [
                'title' => 'Users',
                'stylesheets' => self::STYLESHEETS,
                'users' => $users,
                'statusMessage' => self::getUserOperationStatus()
            ]
        );

        echo Session::getCSRFToken();
    }
    
    public static function show(int $id): void
    {

        $user = User::getUserById($id);

        if ($user) {
            View::render(
                view: 'User/ShowUserPage',
                pageData: [
                    'title' => "User $user->id",
                    'stylesheets' => self::STYLESHEETS,
                    'user' => $user,
                ]
            );
        } else {
            View::render('User/UserNotFoundPage');
        }

    }
    
    public static function create()
    {

        View::render(
            view: 'User/CreateUserPage',
            pageData: ['title' => 'Create new user', 'stylesheets' => self::STYLESHEETS,]
        );
    }
    
    public static function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            new Session();

            $name = Clean::name($_POST['name']);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


            if (!Session::validCSRFToken()) {
                $_SESSION['user_operation_success'] = false;
                $_SESSION['user_operation_message'] = "Invalid CSRF token";

                HTTP::redirect('/users');
            }

            if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                try {
                    $createUserResult = User::createUser(name: $name, email: $email);
                    $_SESSION['user_operation_success'] = $createUserResult->success;
                    $_SESSION['user_operation_message'] = $createUserResult->message;
                } catch (Exception $e) {
                    $_SESSION['user_operation_success'] = false;
                    $_SESSION['user_operation_message'] = "Failed to create user: {$e->getMessage()}";
                }
            } else {
                $_SESSION['user_operation_success'] = false;
                $_SESSION['user_operation_message'] = "Invalid name or email used.";
            }

            HTTP::redirect('/users');
        }

    }
    
    public static function edit()
    {
    // Logic for handling edit route here
    }
    
    public static function update()
    {
    // Logic for handling update route here
    }
    
    public static function delete()
    {
    // Logic for handling delete route here
    }
    
    public static function destroy()
    {
    // Logic for handling destroy route here
    }

    private static function getUserOperationStatus(): ?StatusMessage
    {
        $userOperationSuccess = $_SESSION['user_operation_success'] ?? null;
        $userOperationMessage = $_SESSION['user_operation_message'] ?? null;

        unset($_SESSION['user_operation_success'], $_SESSION['user_operation_message']);

        if (is_null($userOperationSuccess) || is_null($userOperationMessage)){
            return null;
        }

        return new StatusMessage((bool)$userOperationSuccess, $userOperationMessage);
    }

}