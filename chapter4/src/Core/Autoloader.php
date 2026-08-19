<?php

spl_autoload_register(function($className){
  
  $prefix = "App\\";
  $baseDir = dirname(__DIR__) . '/';

  if (strpos($className, $prefix) !== 0) {
    return;
  }

  $relativeClass = substr($className, strlen($prefix));

  $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

  if (file_exists($file)) {
    require_once $file;
  }

 
});