<?php

namespace Models;

class Company 
{
    // Initialize member variables here

    public function __construct(
    // You can also initialize member variables in the signature of the constructor
    ){}
    
    public static function all()
    {
    // Implement logic here to get all instances of Company from the database
    }
    
    public static function getCompanyById(int $id)
    {
    // Implement logic here to get one instance of Company from the database by id
    }
    
    // Implement other methods here

}