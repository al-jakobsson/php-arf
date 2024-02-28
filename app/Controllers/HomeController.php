<?php

namespace Controllers;

use Arf\PageConfiguration;
use Arf\View;

class HomeController
{
    
    public static function home(): void
    {
        View::render('HomePage', ['heading' => 'Arf!']);
    }

}