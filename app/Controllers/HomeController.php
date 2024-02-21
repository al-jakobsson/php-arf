<?php

namespace Controllers;

use Arf\View;

class HomeController
{
    public const EMPTY_PATH = '/';
    public const HOME_PATH = '/home';

    public const LOGIN_PATH = '/login';
    
    public static function home()
    {
        View::render('HomePage', ['title' => 'Welcome!', 'heading' => 'Welcome Home']);
    }

    public static function login()
    {
        View::render('LoginPage', []);
    }
}