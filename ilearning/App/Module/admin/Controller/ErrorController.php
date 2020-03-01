<?php

class ErrorController extends Controller
{
    function showIP(){
        
        
    }

    function showError($option = null){

        if($option == null){
            if (!empty($_SERVER['REMOTE_ADDR'])){
                $ip_address = $_SERVER['REMOTE_ADDR'];
                if($ip_address == "::1"){
                    echo "<h1 style='color: red; font-size: 15px;'>Sorry, your location is limited, your IP address: " 
                    . $ip_address . "</h1>";
                }else{
                    echo "<h1 style='color: red; font-size: 15px;'>" . "We have an unknow error" . "</h1>";
                }
            }
        }

        if($option['task'] == "Not Found"){
            echo "<h1 style='color: red; font-size: 15px;'>" . "This site can not found" . "</h1>";
        }
        
    }
}
