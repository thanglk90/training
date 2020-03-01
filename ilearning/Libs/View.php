<?php

class View {
    protected $_module;

    function __construct($module){
        $this->_module = $module;
    }

    function render($viewFile){
        echo "<h1 style='color: red; font-size: 15px;'>Admin - View - " . __METHOD__ . "</h1>";
        $file = ADMIN_PATH . 'View' . SEPARATOR . $viewFile . '.php';
        if(file_exists($file)){
            require_once $file;
        }else{
            echo "Have an error!";
        }
    }
}