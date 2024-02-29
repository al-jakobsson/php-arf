<?php 
namespace Arf;

return [
    new Route("GET", "/", "HomeController", "home"),
    new Route("GET", "/users", "UserController", "index"),
    new Route("GET", "/users/:id", "UserController", "show"),
    new Route("GET", "/users/new", "UserController", "new"),
    new Route("POST", "/users/store/:id", "UserController", "store"),
    new Route("GET", "/users/edit/:id", "UserController", "edit"),
    new Route("PUT", "/users/update/:id", "UserController", "update"),
    new Route("GET", "/users/delete/:id", "UserController", "delete"),
    new Route("DELETE", "/users/destroy/:id", "UserController", "destroy"),
];