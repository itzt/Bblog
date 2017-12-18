<?php

namespace App\Http\Controllers\Home;

use App\Posts;
use App\Categories;
use App\Http\Controllers\Controller;
use \Symfony\Component\HttpFoundation\Request;
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

    /**
     * get find article info
     *
     * @param Request $request
     * @return void
     */
    public function details(Request $request)
    {
        $title = $request->title;
        $artFind = (new Posts)->getOne(['title' => $title]);
        return view('Themes/'.$this->theme.'Home/details', ['artFind' => $artFind]);
    }

    /**
     * show article all list
     *
     * @return void
     */
    public function archive()
    {
        return view('Themes/'. $this->theme. 'Home/archive');
    }
}
