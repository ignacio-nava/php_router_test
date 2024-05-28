<?php

require "functions.php";
require "core/Router.php";

// Se crea la instancia del router
$router = new Router;

// Se definen las rutas
$router->add("/", "HomeController@index");
$router->add("/about", "HomeController@about");
$router->add("/contact", "HomeController@contact");

// Se ejecuta el router
$router->dispatch($_SERVER['REQUEST_URI']);




