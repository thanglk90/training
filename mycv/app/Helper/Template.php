<?php

namespace App\Helper;
use Config;

class Template {

    public static function showButtonFilter($controllerName, $itemsStatusCount, $currentFilterStatus){
        $xhtml = '';
        $tmplStatus = Config::get('zvn.template.status');

        if(count($itemsStatusCount) > 0){
            $all = [
                'status' => 'all',
                'total'  => array_sum(array_column($itemsStatusCount, 'total'))
            ];
            array_unshift($itemsStatusCount, $all);

            foreach($itemsStatusCount as $item){
                $statusValue = array_key_exists($item['status'], $tmplStatus) ? $item['status'] : 'default';
                $currentTemplateStatus = $tmplStatus[$statusValue];
                $link = route($controllerName) . '?filter_status=' . $statusValue;
                $class = ($statusValue == $currentFilterStatus) ? 'btn-danger' : 'btn-primary';
                
                $xhtml .= sprintf('<a href="%s" type="button" 
                                        class="btn %s">
                                        %s
                                        <span class="badge bg-white">%s</span>
                                    </a>',
                                    $link, $class, $currentTemplateStatus['name'], $item['total']
                                );
            }
        }
        return $xhtml;

        // <a href="?filter_status=all" type="button" class="btn btn-primary">All <span class="badge bg-white">4</span></a>
        // <a href="?filter_status=active" type="button" class="btn btn-success">Active <span class="badge bg-white">2</span></a>
        // <a href="?filter_status=inactive" type="button" class="btn btn-success">Inactive <span class="badge bg-white">2</span></a>
    }

    public static function showItemHistory($by, $time){
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s</p>
                            <p><i class="fa fa-clock-o"></i> %s</p>', $by, date(Config::get('zvn.format.long_time'), strtotime($time)));
        return $xhtml;
    }

    public static function showItemStatus($controllerName, $id, $status){

        $tmplStatus = Config::get('zvn.template.status');

        $statusValue = array_key_exists($status, $tmplStatus) ? $status : 'default';

        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link = route($controllerName . '/status', ['active' => $status, 'id' => $id]);

        $xhtml = sprintf(
                        '<a href="%s" 
                        type="button" class="btn btn-round %s">%s</a>', 
                        $link, $currentTemplateStatus['class'], $currentTemplateStatus['name']);

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
