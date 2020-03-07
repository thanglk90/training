<?php
class IndexController extends Controller
{
 
    function indexAction(){
        echo "<h1 style='color: red; font-size: 15px;'>" . __METHOD__ . "</h1>";
     
        $this->_viewObj->items = $this->_modelObj->listItems();
        
        $arr = array('name' => 'id333', 'user_group' => 333); 
        $where = array('id' => 10, 'ordering' => 2); 
        echo $this->_modelObj->updateItem($arr, $where);      

        if(count($this->_viewObj->items) < 1){
            echo "items no elements";
        }
        $this->_viewObj->title = "<title>admin - index/index </title>";
        $this->_viewObj->render('index/index');
    }
}
