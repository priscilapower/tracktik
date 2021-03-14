<?php
require 'vendor/autoload.php';

$loader = new \Composer\Autoload\ClassLoader();

$map = require __DIR__ . '/autoload.php';
foreach ($map as $namespace => $path) {
    $loader->setPsr4($namespace, $path);
}
$loader->register(true);
