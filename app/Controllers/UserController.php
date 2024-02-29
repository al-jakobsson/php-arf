<?php

namespace Controllers;

use Arf\View;

class UserController
{
    
    public static function index()
    {
        View::render('UserPage', ['title' => 'Useeers']);
    }
    
    public static function show(int $id)
    {
        View::render('UserShowPage', ['id' => $id]);
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