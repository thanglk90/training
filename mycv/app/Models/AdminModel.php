<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class AdminModel extends Model
{
    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = '';
    protected $folderUpload = '';
    private $fieldSearchAccepted = [
        'id',
        'name',
    ];

    private $crudNotAccepted = [
        '_token',
        'thumb_current'
    ];

    public function deleteThumb($thumbName){
        Storage::disk('znv_storage_images')->delete($this->folderUpload . '/' . $thumbName);
    }

    public function uploadThumb($thumbObj){
        $thumbName = Str::random(10) . '.' . $thumbObj->extension();
        $thumbObj->storeAs($this->folderUpload, $thumbName, 'znv_storage_images');

        return $thumbName;
    }

    public function prepareParams($params){
        $params = array_diff_key($params, array_flip($this->crudNotAccepted));

        return $params;
    }

}
