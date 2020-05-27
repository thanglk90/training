<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleModel as MainModel;
use App\Models\CategoryModel as CategoryModel;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ArticleRequest as MainRequest;

class ArticleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private $pathViewController = 'admin.pages.article.';
    private $controllerName = 'article';
    private $params;
    private $model;

    public function __construct(){
        $this->params['pagination']['totalItemsPerPage'] = 10;
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

        $categoryModel = new CategoryModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'admin-list-items-in-selectbox']);
        echo '<pre>';
        print_r($itemsCategory);
        echo '</pre>';
        return view($this->pathViewController . 'form', [
            'item' => $item,
            'itemsCategory' => $itemsCategory
        ]);
        
    }

    public function save(MainRequest $request){
       
       if($request->method() == 'POST'){
           $params = $request->all();

           $task = 'add-item';
           $notify = "Thêm phần tử thành công";

           if($params['id'] !== null){
               $task = 'edit-item';
               $notify = "Chỉnh sửa phần tử thành công";
           };
           $this->model->saveItem($params, ['task' => $task]);
           return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
       }
    }


    public function status(Request $request){
       
        $this->params['currentStatus'] = $request->status;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-status']);
        $notify = 'ID ' . $this->params['id'];
        $notify .= ' has been changed to ' . $result['status'] . '!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
    }

    public function isHome(Request $request){
       
        $this->params['currentIsHome'] = $request->is_home;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-is-home']);
        $notify = 'ID ' . $this->params['id'] . ' isHome';
        $notify .= ' has been changed to ' . $result['is_home'] . '!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
    }

    public function display(Request $request){
       
        $this->params['currentDisplay'] = $request->display;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-display']);
        $notify = 'ID ' . $this->params['id'] . ' display';
        $notify .= ' has been changed to ' . $result['display'] . '!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
    }

    public function type(Request $request){
       
        $this->params['currentType'] = $request->type;
        $this->params['id'] = $request->id;
        $result = $this->model->saveItem($this->params, ['task' => 'change-type']);
        $notify = 'ID ' . $this->params['id'] . ' type';
        $notify .= ' has been changed to ' . $result['type'] . '!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
    }


    public function delete(Request $request){
       
        $this->params['id'] = $request->id;
        $result = $this->model->deleteItem($this->params, ['task' => 'delete-item']);
        $notify = 'ID ' . $result['id'] . ' has been changed delete!!';
        return redirect()->route($this->controllerName)->with('zvn_notify', $notify);
    }

    


}
