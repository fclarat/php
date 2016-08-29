<?php

require 'core/bootstrap.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$app['router']->add('/user/delete', function () use ($app)
{
    require 'controllers/user.php';
    $User = new User();
    echo $User->delete($app, $_GET['id']);
});

$app['router']->add('/user', function () use ($app)
{
    require 'controllers/user.php';
    $User = new User();
    echo $User->getOne($app, $_GET['id']);
});

$app['router']->add('/user/update', function () use ($app)
{
    require 'controllers/user.php';
    $User = new User();
    echo $User->update($app, $_GET['id'], $_GET['field'], $_GET['value']);
});

$app['router']->add('/user/upload', function () use ($app)
{
    if(isset($_FILES['photo']))
    {
        require 'controllers/user.php';
        $User = new User();
        echo $User->upload($app, $_GET['id'], $_FILES['photo']);
    }
    else
    {
        echo "El archivo debe llamarse photo";
    }

});

$app['router']->add('/users', function () use ($app)
{
    require 'controllers/user.php';
    $User = new User();
    header('Content-Type: application/json');
    echo $User->getAll($app);
});


$app['router']->execute();
