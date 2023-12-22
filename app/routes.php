<?php

use App\Core\App;

//Se a opção de configuração de rotas de notação de matriz em config.php estiver definida como true, vamos usar o roteamento de notação de matriz.
if (App::get('config')['options']['array_routing']) {

    $router->getArray([
        '' => 'IndexController@index',
        'about' => 'IndexController@about',
        'contact' => 'IndexController@contact',

        'register' => 'RegistersController@index',
        'login' => 'AuthController@login',

        'users' => 'UsersController@index',
        'users/{page}' => 'UsersController@index',
        'user/{id}' => 'UsersController@show',
        'user/delete/{id}' => 'UsersController@delete',
    ]);

    $router->postArray([
        'users' => 'UsersController@store',
        'user/update/{id}' => 'UsersController@update',
        'register' => 'RegistersController@store',
        'register/update/{id}' => 'RegistersController@update',
    ]);

} else {
    $router->get('', 'IndexController@index');
    $router->get('login', 'AuthController@login');
    $router->get('about', 'IndexController@about');
    $router->get('contact', 'IndexController@contact');

    $router->get('users', 'UsersController@index');
    $router->get('users/{page}', 'UsersController@index');
    $router->get('user/{id}', 'UsersController@show');
    $router->get('user/delete/{id}', 'UsersController@delete');
    $router->post('users', 'UsersController@store');
    $router->post('user/update/{id}', 'UsersController@update');

    $router->get('register', 'RegistersController@index');
    $router->post('register', 'RegistersController@store');
}