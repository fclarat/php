<?php

require 'core/bootstrap.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$app['router']->add('', function() {
    echo 'Not found';
});

$app['router']->add('/', function () {
    echo 'Home';
});

$app['router']->add('/user/delete', function () use ($app) {
    require 'controllers/users.php';
    $users = new Users();
    echo $users->delete($app, $_GET['id']);
});

$app['router']->add('/user', function () use ($app) {
    require 'controllers/users.php';
    $users = new Users();
    echo $users->getOne($app, $_GET['id']);
});

$app['router']->add('/users', function () use ($app) {
    require 'controllers/users.php';
    $users = new Users();
    header('Content-Type: application/json');
    echo $users->getAll($app);
});


$app['router']->execute();
