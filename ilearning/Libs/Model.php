<?php

class Model {

    protected $_host = DB_HOST;
    protected $_database = DB_DATABASE;
    protected $_username = DB_USERNAME;
    protected $_pass = DB_PASS;
    protected $_table = DB_TABLE;
    protected $_conn;

    function __construct(){
        //echo "<h1 style='color: red; font-size: 15px;'>" . __METHOD__ . "</h1>";

        if(!empty($this->_host) && !empty($this->_database) && !empty($this->_username) && isset($this->_pass) && !empty($this->_table)){
            $db = 'mysql:host=' . $this->_host . ';dbname=' . $this->_database;
            try{
                $this->_conn = new PDO($db, $this->_username, $this->_pass);
                $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Connection fails: " . $e->getMessage();
            }
        }else{
            echo "<h1 style='color: blue; font-size: 15px;'>" . 'Connect error' . "</h1>";
        } 
        
    }

    function createPlaceHolderArray($data = array(), $option = null){

        $arrPlaceHolder = array();
        if($option == 'key:key'){
            foreach($data as $key => $value){
                $arrPlaceHolder[] = $key . ' = :' . $key;
            }
        }
        if($option == ':key'){
            foreach($data as $key => $value){
                $arrPlaceHolder[] = ':' . $key;
            }
        }       
        return $arrPlaceHolder;
    }

    function addItem($data = array()){
        /*$form = [
                //'id' => null,
                'name' => 'test1'];*/
        if(count($data) > 0){
            $strPro = array();
            $arrVal = $this->createPlaceHolderArray($data, ":key");
            foreach($data as $key => $value){
                $strPro[] = $key;
            }

            $strPro = implode($strPro, ",");
            $strVal = implode($arrVal, ",");
            $sql = 'INSERT INTO user (' . $strPro .  ') values (' . $strVal  .')';
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute($data);
            return $stmt->rowCount();
        }
    }

    function createWhereSQL($data = array()){
        if(count($data) > 0){
            $arr = array();
            foreach($data as $key => $val){
                $arr[] = $key . ' = ' . $val;
            }
            $str = implode($arr, ' AND ');
        }

        return $str;
    }

    function updateItem($data = array(), $where = array()){
        if(count($data) > 0){
            $arr = $this->createPlaceHolderArray($data, 'key:key');
            $strValue = implode($arr, ", ");
            $Where = $this->createWhereSQL($where);
            $sql = 'UPDATE ' . $this->_table . " SET $strValue WHERE $Where"; 
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute($data);
            return $stmt->rowCount();
        }
    }
    
    function createDeleteSQL($where = array()){
 
        $arrWhere = $this->createPlaceHolderArray($where, "key:key");
        $strWhere = implode($arrWhere, " AND ");
        $sql = 'DELETE FROM ' . $this->_table . ' WHERE ' . $strWhere;
        return $sql;
    }

    function deleteItem($where = array()){
        if(count($where) > 0){
            $sql = $this->createDeleteSQL($where);
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute($where);
            return $stmt->rowCount();
        }
        
    }

    function listItems(){
        //Tạo Prepared Statement
        $stmt = $this->_conn->prepare('SELECT * from ' . $this->_table);

        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //Gán giá trị và thực thi
        $stmt->execute();

        //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
        while($row = $stmt->fetch()) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    function setHost($hostname){
        $this->_host = $hostname;
    }

    function getHost(){
        return $this->_host;
    }

    function setDatabase($dbname){
        $this->_database = $dbname;
    }

    function getDatabase(){
        return $this->_database;
    }

    function setUserName($username){
        $this->_username = $username;
    }

    function getUserName(){
        return $this->_username;
    }

    function setPass($pass){
        $this->_pass = $pass;
    }

    function getPass(){
        return $this->_pass;
    }

    function setTable($table){
        $this->_table = $table;
    }

    function getTable(){
        return $this->_table;
    }
    
}