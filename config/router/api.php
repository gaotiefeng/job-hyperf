<?php

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/api', 'App\Controller\IndexController@index');

Router::addServer('http',function (){
    Router::addGroup('/user/',function (){
        Router::get('index','App\Controller\Api\UserController@index');
    });
});