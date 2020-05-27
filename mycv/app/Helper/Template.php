<?php

namespace App\Helper;
use Config;

class Template {

    public static function showAreaSearch($controllerName, $paramsSearch){
        $tmplField = Config::get('zvn.template.search');

        $fieldInController = Config::get('zvn.config.search');
        $controllerName = array_key_exists($controllerName, $fieldInController) ? $controllerName : 'default';
        $xhtmlField = '';
        foreach($fieldInController[$controllerName] as $field){
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>',
                                    $field, $tmplField[$field]['name']);
        }

        $searchField = (in_array($paramsSearch['field'], $fieldInController[$controllerName])) ? $paramsSearch['field'] : 'all';

        $xhtml = sprintf('<div class="input-group">
                            <div class="input-group-btn">
                                <button type="button"
                                        class="btn btn-default dropdown-toggle btn-active-field"
                                        data-toggle="dropdown" aria-expanded="false">
                                   %s <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                   %s
                                </ul>
                            </div>
                            <input type="text" class="form-control" name="search_value" value="%s">
                            <span class="input-group-btn">
                                <button id="btn-clear" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
                                <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                            </span>
                            <input type="hidden" name="search_field" value="%s">
                        </div>', $tmplField[$searchField]['name'], $xhtmlField, $paramsSearch['value'], $searchField);
        return $xhtml;
    }

    public static function showButtonFilter($controllerName, $itemsStatusCount, $currentFilterStatus, $paramsSearch){
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
                if(!empty($paramsSearch['value'])){
                    $link .= '&search_field=' . $paramsSearch['field'] . '&search_value=' . $paramsSearch['value'];
                }
                $class = ($statusValue == $currentFilterStatus) ? 'btn-danger' : 'btn-primary';
                
                $xhtml .= sprintf('<a href="%s" type="button" 
                                        class="button-filter btn %s">
                                        %s
                                        <span class="badge bg-white">%s</span>
                                    </a>',
                                    $link, $class, $currentTemplateStatus['name'], $item['total']
                                );
            }
        }else {
            // Test
            $statusValue = 'none';
            $currentTemplateStatus = $tmplStatus[$statusValue];
            $link = route($controllerName);
            $item = 0;
            $class = 'btn-danger';

            $xhtml .= sprintf('<a href="%s" type="button" 
                                        class="button-filter btn %s">
                                        %s
                                        <span class="badge bg-white">%s</span>
                                    </a>',
                                    $link, $class, $currentTemplateStatus['name'], $item
                                );
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

    public static function showItemStatus($controllerName, $id, $statusValue){

        $tmplStatus = Config::get('zvn.template.status');

        $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';

        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link = route($controllerName . '/status', ['status' => $statusValue, 'id' => $id]);

        $xhtml = sprintf(
                        '<a href="%s" 
                        type="button" class="btn btn-round %s">%s</a>', 
                        $link, $currentTemplateStatus['class'], $currentTemplateStatus['name']);

        return $xhtml;
    }

    public static function showItemIsHome($controllerName, $id, $isHomeValue){

        $tmplIsHome = Config::get('zvn.template.is_home');

        $isHomeValue = array_key_exists($isHomeValue, $tmplIsHome) ? $isHomeValue : 'yes';

        $currentTemplateIsHome = $tmplIsHome[$isHomeValue];
        $link = route($controllerName . '/isHome', ['is_home' => $isHomeValue, 'id' => $id]);

        $xhtml = sprintf(
                        '<a href="%s" 
                        type="button" class="btn btn-round %s">%s</a>', 
                        $link, $currentTemplateIsHome['class'], $currentTemplateIsHome['name']);

        return $xhtml;
    }

    public static function showItemSelect($controllerName, $id, $displayValue, $fieldName){

       $link = route($controllerName . '/' . $fieldName, [$fieldName => 'value_new', 'id' => $id]);
       $tmplDisplay = Config::get('zvn.template.' . $fieldName);
       $xhtml = sprintf('<select name="select_change_attr" data-url="%s" class="form-control">', $link);

       foreach($tmplDisplay as $key => $value){
            $xhtmlSelected = '';
            if($key == $displayValue){
                $xhtmlSelected  = 'selected="selected"';
            }
            $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
       }

       $xhtml .= '</select>';

        return $xhtml;
    }

    public static function showItemThumb($controllerName, $thumbName, $thumbAlt){

        $imgLink = asset("images/$controllerName/$thumbName");
        $xhtml = sprintf(
                            '<img src="%s" alt="%s" class="zvn-thumb" />,',
                            $imgLink, $thumbAlt);
        return $xhtml;
    }

    public static function showButtonAction($controllerName, $id){

        $tmplButton = Config::get('zvn.template.button');

        $buttonInArea = Config::get('zvn.config.button');

        $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : 'default';
        $listButtons = $buttonInArea[$controllerName];
        
        $xhtml = '<div class="zvn-box-btn-filter">';
        
        foreach($listButtons as $key => $value){

            $currentButton = $tmplButton[$value];

            $link =  route($controllerName . $currentButton['route-name'], ['id' => $id]);
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
