<?php

class Bootstrap{

    private         $_params;
    protected       $_controllerObj;
    private         $_errType;

    function init(){
        $this->setParams();
        if (!empty($_SERVER['REMOTE_ADDR'])){
            $ip_address = $_SERVER['REMOTE_ADDR'];
            if($ip_address != "::1" && 5==1){
                $this->_errType['ip'] = $ip_address;
                $this->showError($this->_errType);
            }else{
                $controllerFileName = $this->_params['controller'] . 'Controller.php';
                $file = MODULE_PATH . $this->_params['module'] . DS . "Controller" . DS . $controllerFileName;

                if(file_exists($file)){
                    require_once $file;
                    $controllerClassName = ucfirst($this->_params['controller']) . "Controller";
                    $this->_controllerObj = new $controllerClassName($this->getParams());
                    
                    $action = $this->_params['action'] . "Action";
                    if(method_exists($this->_controllerObj, $action)){
                        $this->_controllerObj->$action();
                    }
                }else{
                    $this->loadDefaultController();
                }
                
            }
        }

        
    }

    function setParams(){  
        $this->_params = array_merge($_GET, $_POST);

        $this->_params['module'] = (isset($this->_params['module']) && !empty($this->_params['module'])) ? $this->_params['module'] : MODULE_DEFAULT;

        $this->_params['controller'] = (isset($this->_params['controller']) && !empty($this->_params['controller'])) ? $this->_params['controller'] : CONTROLLER_DEFAULT;

        $this->_params['action'] = (isset($this->_params['action']) && !empty($this->_params['action'])) ? $this->_params['action'] : ACTION_DEFAULT;
    }

    function getParams(){
        return $this->_params;
    }

    function showError($errType){
        $file = DEFAULT_PATH . "Controller/ErrorController.php";
        if(file_exists($file)){
            require_once $file;
            $this->_controllerObj = new ErrorController($this->getParams());
            if(method_exists($this->_controllerObj, 'showError')){
                if($errType['ip'] == "::1"){
                    $this->_controllerObj->showError($errType);
                }else{
                    $this->_controllerObj->showError(array('notFound' => true));
                }
                
            }
            
        }
    }

    function loadDefaultController(){
        
        $file = CONTROLLER_DEFAULT_PATH . $this->_params['controller'] . 'Controller.php';
        if(file_exists($file)){
            require_once $file;
            $controllerName = $this->_params['controller'] . 'Controller';
            $this->_controllerObj = new $controllerName($this->getParams());

            $controllerAction = $this->_params['action'] . 'Action';
            if(method_exists($this->_controllerObj, $controllerAction)){
                $this->_controllerObj->$controllerAction();
            }
        }else{
            $this->showError(array('notFound' => true));
        }
    }
}
