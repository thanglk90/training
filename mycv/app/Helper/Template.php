<?php

namespace App\Helper;
use Config;

class Template {
    public static function showItemHistory($by, $time){
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s</p>
                            <p><i class="fa fa-clock-o"></i> %s</p>', $by, date(Config::get('zvn.format.long_time'), strtotime($time)));
        return $xhtml;
    }

    public static function showItemStatus($controllerName, $id, $status){

        $tmplStatus = [
            'active' => ['name' => 'Kích hoạt', 'class' => "btn-success"],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => "btn-info"]
        ];

        $currentStatus = $tmplStatus[$status];
        $link = route($controllerName . '/status', ['active' => $status, 'id' => $id]);

        $xhtml = sprintf(
                        '<a href="%s" 
                        type="button" class="btn btn-round %s">%s</a>', 
                        $link, $currentStatus['class'], $currentStatus['name']);

        return $xhtml;

        // <a href="http://proj_news.xyz/admin123/slider/change-status-active/3" type="button" class="btn btn-round btn-success">{{ $status }}</a>
    }

    public static function showItemThumb($controllerName, $thumbName, $thumbAlt){

        $imgLink = asset("images/$controllerName/$thumbName");
        $xhtml = sprintf(
                            '<img src="%s" alt="%s" class="zvn-thumb" />,',
                            $imgLink, $thumbAlt);
        return $xhtml;
    }

    public static function showButtonAction($controllerName, $id){

        $tmplButton = [
            'edit' => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => $controllerName . '/form'],
            'delete' => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => $controllerName . '/delete'],
            'info' => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => $controllerName . '/delete'],
        ];

        $buttonInArea = [
            'default' => ['edit' , 'delete'],
            'slider'  => ['edit', 'delete']
        ];

        $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : 'default';
        $listButtons = $buttonInArea[$controllerName];
        
        $xhtml = '<div class="zvn-box-btn-filter">';
        
        foreach($listButtons as $key => $value){

            $currentButton = $tmplButton[$value];

            $link =  route($currentButton['route-name'], ['id' => $id]);
            $class = $currentButton['class'];
            $title = $currentButton['title'];
            $icon = $currentButton['icon'];
            $xhtml .= sprintf('<a href="%s" type="button" class="btn btn-icon %s" 
                            data-toggle="tooltip" data-placement="top" data-original-title="%s">
                            <i class="fa %s"></i></a>',
                            $link, $class, $title, $icon);
            
        }
                    
        $xhtml .= '</div>';
        return $xhtml;
    }
}
