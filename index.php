<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';
require 'utils/Auth.php';

// Use an autoload
function __autoload($class)
{
	require CORE . $class.".php";
}

$bootstrap = new Bootstrap();
$bootstrap->init();