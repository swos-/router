<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require 'Framework.php';

\Framework\Framework::registerAutoloader();

$app = new \Framework\Framework();
$request = new \Framework\Request();