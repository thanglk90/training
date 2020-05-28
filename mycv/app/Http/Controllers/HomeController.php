<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\SliderModel as SliderModel;
use App\Models\CategoryModel as CategoryModel;
use App\Models\ArticleModel as ArticleModel;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private $pathViewController = 'news.pages.home.';
    private $controllerName = 'home';
    private $params = [];
    private $model;

    public function __construct(){
        View::share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        $sliderModel = new SliderModel();
        $categoryModel = new CategoryModel();
        $articleModel = new ArticleModel();

        $itemsSlider = $sliderModel->listItems(null, ['task' => 'news-list-items']);
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items-is-home']);
        $itemsFeatured = $articleModel->listItems(null, ['task' => 'news-list-items-featured']);
        $itemsLatest = $articleModel->listItems(null, ['task' => 'news-list-items-latest']);

        foreach($itemsCategory as $key => $category){
            $itemsCategory[$key]['article'] = $articleModel->listItems(['category_id' => $category['id']], ['task' => 'news-list-items-in-category']);
        }
        echo '<pre>';
        print_r($itemsCategory);
        echo '</pre>';

        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'itemsSlider' => $itemsSlider,
            'itemsCategory' => $itemsCategory,
            'itemsFeatured' => $itemsFeatured,
            'itemsLatest' => $itemsLatest
            
            
        ]);
    }

    


}
