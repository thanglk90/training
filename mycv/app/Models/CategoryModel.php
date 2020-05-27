<?php

namespace App\Models;

use App\Models\AdminModel;
use DB;
use Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class CategoryModel extends AdminModel
{
    public function __construct(){
        $this->table = 'category';
        $this->folderUpload = 'category';
        $this->fieldSearchAccepted = ['id','name'];
        $this->crudNotAccepted = ['_token'];
    }

    public function listItems($params, $options = null){
        $result = '';
        if($options['task'] == 'admin-list-items'){
            
            $query = $this->select('id','name', 'is_home', 'display', 'created','created_by','modified','modified_by','status');
            
            if(isset($params['filter']['status']) && $params['filter']['status'] !== 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }

            if($params['search']['value'] !== ''){
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });

                }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
                    $query->where($params['search']['field'], "LIKE", "%{$params['search']['value']}%");
                }
            }
            
            $result = $query->orderBy('id', 'desc')
                            ->paginate(($params['pagination']['totalItemsPerPage']));
        }

        if($options['task'] == 'category-list-items'){
            $query = $this->select('id','name')
                          ->where('status', '=', 'active')
                          ->limit(8);
            $result = $query->get()->toArray();
        }

        if($options['task'] == 'news-list-items-is-home'){
            $query = $this->select('id','name', 'display')
                          ->where('status', '=', 'active')
                          ->where('is_home', '=', '1')
                          ->limit(8);
            $result = $query->get()->toArray();
        }

        if($options['task'] == 'admin-list-items-in-selectbox'){
            $query = $this->select('id','name')
                          ->orderBy('name', 'asc')
                          ->where('status', '=', 'active');
            $result = $query->pluck('name', 'id')->toArray();
        }

        return $result;
    }

    public function countItems($params = null, $options = null){
        $result = '';
        if($options['task'] == 'admin-count-items-group-by-status'){
            // $result = self::select('status', DB::raw('count(id) as total'))
            //             ->groupBy('status')
            //             ->get()
            //             ->toArray();

            $query = $this::groupBy('status')
                          ->select( 'status', DB::raw('count(id) as total') );

            if($params['search']['value'] !== ''){
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });

                }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
                    $query->where($params['search']['field'], "LIKE", "%{$params['search']['value']}%");
                }
            }

            $result = $query->get()->toArray();
            
        }
        
        
        return $result;
    }

    public function saveItem($params, $options = null){
        if($options['task'] == 'change-status'){

            $active = ($params['currentStatus'] == 'active') ? 'inactive' : "active";
     
            self::where('id', $params['id'])
                ->update(['status' => $active]);

            $result = array('status' => $active, 'id' => $params['id']);
        }

        if($options['task'] == 'change-is-home'){

            $isHome = ($params['currentIsHome'] == '1') ? '0' : "1";
     
            self::where('id', $params['id'])
                ->update(['is_home' => $isHome]);

            $result = array('is_home' => $isHome, 'id' => $params['id']);
        }

        if($options['task'] == 'change-display'){

            $display = $params['currentDisplay'];
     
            self::where('id', $params['id'])
                ->update(['display' => $display]);

            $result = array('display' => $display, 'id' => $params['id']);
        }

        if($options['task'] == 'add-item'){
            
            $params['created_by'] = 'kthang';
            $params['created'] = date('Y-m-d H:m:i', time());
            
            $id = $this->insertGetId($this->prepareParams($params));

            $result = array('status' => 'success', 'id' => $id);
        }

        if($options['task'] == 'edit-item'){

            $params['modified'] = date('Y-m-d H:m:i', time()); 
            $params['modified_by'] = 'kthang';
            $params = $this->prepareParams($params);
            

            $this->where('id', $params['id'])->update($params);
            $result = array('id' => $params['id']);
        }


       return $result;
    }

    public function deleteItem($params, $options = null){
        if($options['task'] == 'delete-item'){
            self::where('id', $params['id'])->delete();
            
        }

        $result = ['id' => $params['id']];
        return $result;
    }

    public function getItem($params, $options = null){
        if($options['task'] == 'get-item'){
            $itemInfo = $this->select('id', 'name', 'status')
                        ->where('id', $params['id'])
                        ->first();
        }

        $result = $itemInfo;
        return $result;
        
    }

}
