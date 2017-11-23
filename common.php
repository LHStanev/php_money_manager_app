<?php
session_start();
spl_autoload_register();
$dbArr      = parse_ini_file('Config/db.ini');
$pdo        = new PDO($dbArr['dsn'], $dbArr['user'], $dbArr['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$db         = new Database\PDODatabase($pdo);
$binder     = new \Core\DataBinder();
