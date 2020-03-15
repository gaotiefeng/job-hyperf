<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/api', 'App\Controller\IndexController@index');

Router::addServer('http', function () {
    Router::addGroup('/user/', function () {
        Router::post('login', 'App\Controller\Api\UserController@login');
        Router::post('register', 'App\Controller\Api\UserController@register');
        Router::get('index', 'App\Controller\Api\UserController@index');
    });
});
