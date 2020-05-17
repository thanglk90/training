<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderModel as MainModel;
use Illuminate\Support\Facades\View;

class SliderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private $pathViewController = 'admin.pages.slider.';
    private $controllerName = 'slider';
    private $params;
    private $model;

    public function __construct(){
        $this->params['pagination']['totalItemsPerPage'] = 5;
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field'] = $request->input('search_field', '');
        $this->params['search']['value'] = $request->input('search_value', '');
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        
        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount
            
        ]);
    }

    public function form(Request $request){
        $item = null;
        if($request->id !== null){
            $params['id'] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
            
        }
        
        return view($this->pathViewController . 'form', [
            'item' => $item
        ]);
        
    }


    public function status(Request $request){
       
        $this->params['currentStatus'] = $request->status;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-status']);
        $message = 'ID ' . $this->params['id'];
        $message .= ' has been changed to ' . $result['status'] . '!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $message);
    }

    public function delete(Request $request){
       
        $this->params['id'] = $request->id;
        $result = $this->model->deleteItem($this->params, ['task' => 'delete-item']);
        $message = 'ID ' . $result['id'] . ' has been changed delete!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $message);
    }
}
