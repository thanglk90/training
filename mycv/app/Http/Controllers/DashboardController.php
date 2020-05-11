<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $pathViewController = 'admin.pages.dashboard.';
    private $controllerName = 'slider';
    private $model;

    public function index(Request $request)
    {
        return view($this->pathViewController . 'index');
    }
}
