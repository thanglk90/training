<?php

namespace App\Models;

use App\Models\AdminModel;
use DB;
use Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class ArticleModel extends AdminModel
{
    public function __construct(){
        $this->table = 'article';
        $this->folderUpload = 'article';
        $this->fieldSearchAccepted = ['name','content'];
        $this->crudNotAccepted = ['_token','thumb_current'];
    }

    public function listItems($params, $options = null){
        $result = '';
        if($options['task'] == 'admin-list-items'){
            $query = $this->select('id','name','status','content','thumb','created','created_by','modified','modified_by');

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

        if($options['task'] == 'news-list-items'){
            $query = $this->select('id','name','content','link','thumb')
                          ->where('status', '=', 'active')
                          ->limit(5);
            $result = $query->get()->toArray();
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

        if($options['task'] == 'add-item'){
            
            $params['thumb'] = $this->uploadThumb($params['thumb']);
            $params['created_by'] = 'kthang';
            $params['created'] = date('Y-m-d H:m:i', time());
            
            $id = $this->insertGetId($this->prepareParams($params));

            $result = array('status' => 'success', 'id' => $id);
        }

        if($options['task'] == 'edit-item'){

            if(!empty($params['thumb'])){ // have uploaded new image
                // delete old image
                $this->deleteThumb($params['thumb_current']);
                //add new image
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }
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
            $item = $this->getItem($params, ['task' => 'get-thumb']);
            $this->deleteThumb($item['thumb']);
            //File::delete(public_path('images/slider/' . $item['thumb']));
            self::where('id', $params['id'])->delete();
            
        }

        $result = ['id' => $params['id']];
        return $result;
    }

    public function getItem($params, $options = null){
        if($options['task'] == 'get-item'){
            $itemInfo = $this->select('id', 'name', 'content', 'status', 'thumb')
                        ->where('id', $params['id'])
                        ->first();
        }
        if($options['task'] == 'get-thumb'){
            $itemInfo = $this->select('id', 'thumb')
                        ->where('id', $params['id'])
                        ->first();
        }

        $result = $itemInfo;
        return $result;
        
    }

}
