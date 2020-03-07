<?php
class IndexController extends Controller
{
 
    function indexAction(){
        //echo "<h1 style='color: red; font-size: 15px;'>" . __METHOD__ . "</h1>";
     
        //$this->_viewObj->items = $this->_modelObj->listItems();
        $this->_templateObj->loadTemplate();
        $this->_viewObj->title = "<title>Tadmin - index/index </title>";
        $this->_viewObj->render('index/index');
    }
}
