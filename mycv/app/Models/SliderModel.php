<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $folderUpload = 'slider';
    public $timestamps = true;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    private $fieldSearchAccepted = [
        'id',
        'name',
        'description',
        'link'
    ];

    private $crudNotAccepted = [
        '_token',
        'thumb_current',
    ];

    public function listItems($params, $options = null){
        $result = '';
        if($options['task'] == 'admin-list-items'){
            
            $query = $this->select('id','name','description','link','thumb','created','created_by','modified','modified_by','status');
            
            /* Test */
            // $listStatus = Config::get('zvn.template.status');
            
            // $dbListStatus = $this->select('status')
            //                      ->groupBy('status')->get()->toArray();
            // $dbListStatus = array_flip(array_column($dbListStatus, 'status'));
            // $diffArrStatus1 = array_diff_key($dbListStatus, $listStatus);
            // $diffArrStatus2 = array_flip(array_diff_key($dbListStatus, $diffArrStatus1));
            
            // echo '<pre>';
            // print_r($diffArrStatus2);
            // echo '<pre>';
            
            /* /Test */

            if(isset($params['filter']['status']) && $params['filter']['status'] !== 'all'){
                $query->where('status', '=', $params['filter']['status']);
            // /* Test */
            //     if(!array_key_exists($params['filter']['status'], $dbListStatus)){
            //         $query->whereNotIn('status', $diffArrStatus2);
            //     }else{
            //         $query->where('status', '=', $params['filter']['status']);
            //     }
            // /* /Test */
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
            
            $thumb = $params['thumb'];
            $params['thumb'] = Str::random(10) . '.' . $thumb->extension();
            $thumb->storeAs($this->folderUpload, $params['thumb'], 'znv_storage_images');
            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            $params['created_by'] = 'kthang';
            $params['created'] = date('Y-m-d H:m:i', time());
            $id = $this ->insertGetId($params);

            $result = array('status' => 'success', 'id' => $id);
        }

        if($options['task'] == 'edit-item'){

            if(!empty($params['thumb'])){ // have uploaded new image
                // delete old image
                Storage::disk('znv_storage_images')->delete($this->folderUpload . '/' . $params['thumb_current']);
                //add new image
                $thumb = $params['thumb'];
                $params['thumb'] = Str::random(10) . '.' . $thumb->extension();
                $thumb->storeAs($this->folderUpload, $params['thumb'], 'znv_storage_images');
            }

            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            $params['modified'] = date('Y-m-d H:m:i', time()); 
            $paramss['modified_by'] = 'kthang';

            $this->where('id', $params['id'])->update($params);
            $result = array('id' => $params['id']);
        }


       return $result;
    }

    public function deleteItem($params, $options = null){
        if($options['task'] == 'delete-item'){
            $item = $this->getItem($params, ['task' => 'get-thumb']);
            Storage::disk('znv_storage_images')->delete($this->folderUpload . '/' . $item['thumb']);
            //File::delete(public_path('images/slider/' . $item['thumb']));
            self::where('id', $params['id'])->delete();
            
        }

        $result = ['id' => $params['id']];
        return $result;
    }

    public function getItem($params, $options = null){
        if($options['task'] == 'get-item'){
            $itemInfo = $this->select('id', 'name', 'description', 'status', 'link', 'thumb')
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
