<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
            ->withServiceAccount('taskmanager-44fb3-firebase-adminsdk-pyuxe-0c8c5bace5.json')
            ->withDatabaseUri('https://taskmanager-44fb3-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>