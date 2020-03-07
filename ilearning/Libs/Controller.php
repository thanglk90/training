<?php

class Controller{
    protected $_arrParams;
    protected $_viewObj;
    protected $_modelObj;
    protected $_templateObj;

    function __construct($arrParams){
        $this->_arrParams = $arrParams;
        $this->setViewObj();
        $this->setModelObj();
    }

    function setViewObj(){
        $this->_viewObj = new View($this->_arrParams['module']);
    }

    function getViewObj(){
        return $this->_viewObj;
    }

    function setModelObj(){
        $modelName = ucfirst($this->_arrParams['action']) . 'Model';
        $file = MODULE_PATH . $this->_arrParams['module'] . DS . 'Model' . DS . $modelName . '.php';
        if(file_exists($file)){
            require_once $file;
            $this->_modelObj = new $modelName();
        }
        
        
    }

    function getModelObj(){
        return $this->_modelObj;
    }

    function setTemplateObj(){
        $this->_templateObj = new Template();
    }

    function getTemplateObj(){
        return $this->_templateObj;
    }
    
}
