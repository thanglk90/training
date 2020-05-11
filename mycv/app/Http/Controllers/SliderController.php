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
    private $model;

    public function __construct(){
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $items = $this->model->listItems(null, ['task' => 'admin-list-items']);
        return view($this->pathViewController . 'index', [
            'items' => $items
        ]);
    }
}
