<?php

namespace Controllers;

use Core\View;

class HomeController
{
    public const EMPTY_PATH = '/';
    public const HOME_PATH = '/home';
    
    public static function home()
    {
        View::render('HomePage', ['title' => 'Welcome!', 'heading' => 'Welcome Home']);
    }
}