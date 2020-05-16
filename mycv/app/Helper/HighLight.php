<?php

namespace App\Helper;
use Config;

class HighLight {

    public static function show($input, $paramsSearch, $field){

        if($paramsSearch['value'] == ''){
            return $input;
        }

        if($paramsSearch['field'] == 'all' || $paramsSearch['field'] == $field){
            $patt = '/' . preg_quote($paramsSearch['value'], '/') . '/i';
            //$patt = '/' . $paramsSearch['value'] . '/i';
            $replace = '<span class="highlight">$0</span>';

            return preg_replace($patt, $replace, $input);
        }
        return $input;

    }

    
}
