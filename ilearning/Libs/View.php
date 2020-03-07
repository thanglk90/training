<?php

class View {
    protected $_module;
    protected $_templatePath;

    function __construct($module){
        $this->_module = $module;
    }

    function render($viewFile, $full = false){
        $path = ADMIN_PATH . 'View' . DS . $viewFile . '.php';
        if($full == true){
            if(file_exists($path)){
                $this->_fileInclude = $path;
                require_once $this->_templatePath;
            }else{
                echo "Path file not exists";
            }
        }else{
            require_once $path;
        }     
    }

    function setTemplatePath($path){
        if(file_exists($path)){
            $this->_templatePath = $path;
        }
    }

    function getTemplatePath(){
        return $this->_templatePath;
    }

    function createCssLink($file){
        $str = "<link rel='stylesheet' type='text/css' href=$file>";
        return $str;
    }

    function createJsLink($path, $file){
        echo '<pre>';
        print_r($file);
        echo '<pre>';

        $xhtml = "";
        if(count($file) > 0){
            foreach($file as $val){
                $xhtml .= '<script src=' . $path  . DS . $val . '></script>';
            }
        }
        return $xhtml;
    }
}