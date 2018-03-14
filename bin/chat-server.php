<?php

// error_reporting(E_ALL && ~E_NOTICE);


if($_SERVER['SERVER_NAME'] == '18.216.2.71'){
    define('ENVIRONMENT', 'production');
}else{
    define('ENVIRONMENT', 'development');
}


use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Chat;

    require dirname(__DIR__) . '/vendor/autoload.php';

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Chat()
            )
        ),
        8080
    );

    $server->run();