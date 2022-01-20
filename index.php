<?php
ob_start();
require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;


$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\App");


$route->get("/", "App:home");

/**
 * APP
 */
$route->group("/app");
$route->get("/", "App:home");

$route->get("/sair", "App:logout");

/** FUNCTIONS CHALLENGE*/
$route->get("/seculo-ano", "App:centuryYear");
$route->post("/seculo-ano", "App:centuryYear");
$route->get("/primos", "App:primeNumbers");
$route->post("/primos", "App:primeNumbers");
$route->get("/nao-repetidos", "App:dontRepeat");
$route->post("/nao-repetidos", "App:dontRepeat");
$route->get("/sequencia-crescente", "App:increasingSequence");
$route->post("/sequencia-crescente", "App:increasingSequence");


/*
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();