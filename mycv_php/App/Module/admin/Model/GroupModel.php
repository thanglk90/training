<?php

class GroupModel extends Model{
    
    private $columns = array('id', 'name', 'status', 'group_acp', 'ordering', 
                        'created_time', 'created_by', 'modified_time', 'modified_by');

    public function form($arrParams, $options = array()){

        $task = $options['task'];
        if($task == "save-close"){
            if(!empty($arrParams)){
                $arrParams = array_intersect_key($arrParams, array_flip($this->columns));
                $strPro = array();
                $arrVal = $this->createPlaceHolderArray($arrParams, ":key");
                foreach($arrParams as $key => $value){
                    $strPro[] = $key;
                }
    
                $strPro = implode($strPro, ",");
                $strVal = implode($arrVal, ",");
    
                // INSERT INTO user (name,user_group,ordering) values (:name,:user_group,:ordering)
                $sql = 'INSERT INTO ' . $this->_table . '(' . $strPro .  ') values (' . $strVal  .')';
                $stmt = $this->_conn->prepare($sql);
                $stmt->execute($arrParams);
                return $this->_conn->lastInsertId();
            }
        }

    }
}

