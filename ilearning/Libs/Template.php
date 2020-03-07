<?php

class Template{
    
    protected $_folderTemplate = 'default';
    protected $_fileConfig = 'config.ini';
    protected $_fileTemplate = 'index.php';
    private $_controllerObj;

    function __construct($obj){
        echo "<h1 style='color: red; font-size: 15px;'>" . __METHOD__ . "</h1>";
        $this->_controllerObj = $obj;
    }

    function setFolderTemplate($folder){
        $this->_folderTemplate = $folder;
    }

    function getFolderTemplate(){
        return $this->_folderTemplate;
    }

    function setfileConfig($file){
        $this->_fileConfig = $file;
    }

    function getfileConfig(){
        return $this->_fileConfig;
    }

    function setFileTemplate($file){
        $this->_fileTemplate = $file;
    }

    function getFileTemplate(){
        return $this->_fileTemplate;
    }

    function loadTemplate(){  
        $configPath     = TEMPLATE_PATH . $this->_folderTemplate . DS . $this->_fileConfig;
        if(file_exists($configPath)){
            $config         = parse_ini_file($configPath);
            $dirJs          = $config['dirJs'];
            $fileJs         = $config['fileJs'];
            $dirCss         = $config['dirCss'];
            $fileCss        = $config['fileCss'];
            
            $viewObj = $this->_controllerObj->getViewObj();
            $viewObj->cssFile = $viewObj->createCssLink('file');
 
            $viewObj->jsFile = $viewObj->createJsLink(TEMPLATE_URL . $this->_folderTemplate . DS . $dirJs, $fileJs);
            
            $templatePath   = TEMPLATE_PATH . $this->_folderTemplate . DS . $this->_fileTemplate;           
            $viewObj->setTemplatePath($templatePath);
            
        }
    }
}