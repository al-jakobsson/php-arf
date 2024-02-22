<?php

namespace Controllers;

use Arf\PageConfiguration;
use Arf\View;

class HomeController
{
    
    public static function home(): void
    {
        View::renderPage(
            new PageConfiguration(
                'HomePage',
                [
                    'title' => 'Welcome!',
                    'beforeContent' => [
                      'Components/Navbar' => []
                    ],
                    'pageData' => ['heading' => 'Arf!'],
                ]
            )
        );
    }

    public static function login(): void
    {
        View::render('LoginPage', []);
    }
}