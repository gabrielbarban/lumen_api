<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/teste', function () use ($router) {
    return "ola, esse é um teste";
});

$router->get('/vocetai', function () use ($router) {
    return "Olá, eu sou a API da titã. Estou sendo desenvolvida utilizando Lumen 5.8";
});


$router->get('mensagem/{id}', 'MostraDadosController@exibemsg');