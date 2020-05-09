<?php
class IndexController extends Controller
{
 
    function indexAction(){
        //echo "<h1 style='color: red; font-size: 15px;'>" . __METHOD__ . "</h1>";
     
        $this->_templateObj->loadTemplate();
        $this->_viewObj->title = "<title>default - index/index </title>";

        /* Duyet item */
        //$arr = $this->_modelObj->listItems();
 
        /* Insert item*/
        // $arrAdd = array('name' => 'test0417', 'user_group' => "15", 'ordering' => '65', 'created' => date('Y-m-d H:m:i', time()));
        // $this->_modelObj->addItem($arrAdd);

        /* Update item*/
        // $arrUpdate = array('name' => 'test0417', 'user_group' => "15", 'ordering' => '65');
        // $arrWhere = array('name' => 'test04171', 'user_group' => "151");
        // $this->_modelObj->updateItem($arrUpdate, $arrWhere);

        /* Delete item*/
        $arrWhere = array('name' => 'test0417');
        $this->_modelObj->deleteItem($arrWhere);

        $this->_viewObj->render('index/index', true);

    }
}
