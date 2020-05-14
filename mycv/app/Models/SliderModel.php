<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SliderModel extends Model
{
    protected $table = 'slider';
    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function listItems($params, $options = null){
        $result = '';
        if($options['task'] == 'admin-list-items'){
            
            $query = $this->select('id','name','description','link','thumb','created','created_by','modified','modified_by','status');
                        
            if(isset($params['filter']['status']) && $params['filter']['status'] !== 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }
            
            $result = $query->orderBy('id', 'desc')
                            ->paginate(($params['pagination']['totalItemsPerPage']));
        }
        
        return $result;
    }

    public function countItems($params = null, $options = null){
        $result = '';
        if($options['task'] == 'admin-count-items-group-by-status'){
            $result = self::select('status', DB::raw('count(id) as total'))
                        ->groupBy('status')
                        ->get()
                        ->toArray();
            
        }
        
        return $result;
    }



}
