<?php

namespace Controllers;

use Arf\View;
use Models\User;

class UserController
{
    
    public static function index()
    {
        $users = User::all();
        View::render('User/UserIndex', ['title' => 'Users', 'users' => $users]);
    }
    
    public static function show(int $id)
    {
        $user = User::getUserById($id);

        if ($user) {
            View::render('User/ShowUser', ['user' => $user]);
        } else {
            View::render('User/UserNotFound');
        }

    }
    
    public static function create()
    {
    // Logic for handling create route here
    }
    
    public static function store()
    {
    // Logic for handling store route here
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
    

}