<?php

require 'define.php';

function __autoload($className){
    $file = LIBS_PATH . "{$className}.php";
    if(file_exists($file)){
        require_once $file;
    }
}

$controllerObj = new Bootstrap();
$controllerObj->init();



