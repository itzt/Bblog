<?php

namespace App\Http\Controllers\Home;

use App\Posts;
use App\Categories;
use App\Http\Controllers\Controller;
class IndexController extends HomeController
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $artList = Posts::getArticleList(Posts::STATUS_PUBLISH, '', 10);
        $catList = (new Categories)->getList();
        return view('Themes/'.$this->theme.'Home/index', [
            'artList' => $artList,
            'catList' => $catList
        ]);
    }
}
