<?php

class URL {

    public static function createLink($module, $controller, $action, $options = null){
        // module=admin&controller=group&action=form
        $xhtml = '';
        if($options == null){
            $xhtml = ROOT_URL . 'index.php?module=' . $module . '&controller=' . $controller . '&action=' . $action;
        }
        return $xhtml;
    }

    public static function redirect($link){
        header('location: ' . $link);
        exit();
    }
}