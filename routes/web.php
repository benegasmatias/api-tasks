<?php
use Illuminate\Support\Str;

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

//Editor

//Fin Editor


$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function(){
    return Str::random(32);
});



//Esto hace que el usuaro solo acceda si esta autenticado
$router->group(['middleware' => 'auth','prefix' => 'api'], function () use($router) {

     

    $router->get('/task', 'TasksController@idex');
    $router->post('/task/edit', 'TasksController@editTask');//delohue
    $router->post('/task/add', 'TasksController@addTask');//delohue
    $router->post('/task/delete', 'TasksController@deleteTask');//delohue
    

});

$router->group(['prefix' => 'api'], function () use ($router)
{
    //ruta para validar al usuario
    $router->post('/users/login','UsersController@getToken');
    
    $router->post('/users/client','UsersController@createUser');//Crea un administrador y su academia

   
});
