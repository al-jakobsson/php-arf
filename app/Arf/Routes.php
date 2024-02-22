<?php 
namespace Arf;

return [
    new Route("GET", "user", "User", "index"),
    new Route("GET", "user/:id", "User", "show"),
    new Route("GET", "user/new", "User", "new"),
    new Route("POST", "user/store/:id", "User", "store"),
    new Route("GET", "user/edit/:id", "User", "edit"),
    new Route("PUT", "user/update/:id", "User", "update"),
    new Route("GET", "user/delete/:id", "User", "delete"),
    new Route("DELETE", "user/destroy/:id", "User", "destroy"),
];