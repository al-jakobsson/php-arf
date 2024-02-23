<?php

namespace Models;

class User 
{
    // Initialize member variables here

    public function __construct(
    // You can also initialize member variables in the signature of the constructor
    ){}
    
    public static function all()
    {
    // Implement logic here to get all instances of User from the database
    }
    
    public static function getUserById(int $id)
    {
    // Implement logic here to get one instance of User from the database by an id
    }
    
    // Implement other methods here

}