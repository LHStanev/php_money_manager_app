<?php
include_once 'common.php';
$operationRepository = new \App\Repository\OperationRepository($db);
$reasonRepository    = new \App\Repository\ReasonRepository($db);
$service             = new \App\Service\OperationService($operationRepository,$reasonRepository);
$httpHandler         = new \App\Http\HttpOperationHandler($binder, $db);
$httpHandler->editOperation($service, $_GET['id']);