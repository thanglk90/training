<?php

class ErrorController extends Controller
{
    function showIP(){
        
        
    }

    function showError($errType = null, $option = null){

        if(isset($errType['ip']) == true){
            if (!empty($_SERVER['REMOTE_ADDR'])){
                $ip_address = $errType['ip'];
                if($ip_address == "::1"){
                    echo "<h1 style='color: red; font-size: 15px;'>Sorry, your location is limited, your IP address: " 
                    . $ip_address . "</h1>";
                }else{
                    echo "<h1 style='color: red; font-size: 15px;'>" . "Sorry, we can find out your IP address" . "</h1>";
                }
            }
        }

        if(isset($errType['notFound']) == true){
            echo "<h1 style='color: red; font-size: 15px;'>" . "This site can not found" . "</h1>";
        }
        
    }
}
