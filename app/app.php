<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Lolnot\Application\Service\SignUpUser;

$app = new Application();

$app->get('/', function () {
    return 'Home page';
});

$app->post('/user/signup', function () {
    $service = new SignUpUser();
    $user = $service->execute();
    return 'SignUp page';
})
    ->before(function () {
        // TODO user params validation?
    })
    ->after(function () {
        // TODO redirect to user page as logged or execute SignIn service for that.
    });

return $app;