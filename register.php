<?php
include_once 'common.php';

$repository = new \App\Repository\UserRepository($db);
$service    = new \App\Service\UserService($repository);
$httpHandler= new \App\Http\HttpUserHandler($binder, $db);
$httpHandler->register($service, $_POST);
