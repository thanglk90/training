<?php
class GroupController extends Controller
{
    function __construct($obj){
        parent::__construct($obj);
        $this->_templateObj->setFolderTemplate('admin');
        $this->_templateObj->loadTemplate();    
        $this->_modelObj->setTable("user_group");
    }
 
    function indexAction(){
        $this->_viewObj->title = "<title>admin - Group/index </title>";
        $this->_viewObj->listItems = $this->_modelObj->listItems();
        $this->_viewObj->render('group/index', true);

    }

    function formAction(){
        $this->_viewObj->title = "<title>admin - Group/form-add </title>";
        if(!empty($this->_arrParams['form'])){
            $lastId = $this->_modelObj->form($this->_arrParams['form'], array('task' => 'save-close'));
            if(!empty($lastId)){
                URL::redirect(URL::createLink('admin', 'group', 'index'));
            }
        }
        
        $this->_viewObj->render('group/form', true);

    }
}
