<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Silex\Application;

$app = new Application();

var_dump($_SERVER);



$app->get('/login', function () {
	echo 'login done!';
	exit;
});
	
// /lolnotifications/app/web/app.php is the root directory
$app->get('/', function () {
	return require '/login.html';
	exit;
});
	
// Execute app!
return $app->run();




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

var_dump('end');
return $app;
