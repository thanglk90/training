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
        $this->params['pagination']['totalItemsPerPage'] = 2;
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $itemsStatusCount = $this->model->countItems(null, ['task' => 'admin-count-items-group-by-status']);
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        
        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount
            
        ]);
    }
}
