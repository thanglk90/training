<?php

class Model {

    protected $_host = DB_HOST;
    protected $_database = DB_DATABASE;
    protected $_username = DB_USERNAME;
    protected $_pass = DB_PASS;
    protected $_table = DB_TABLE;
    protected $_conn;

    function __construct(){
        echo "<h1 style='color: red; font-size: 15px;'>" . __METHOD__ . "</h1>";

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