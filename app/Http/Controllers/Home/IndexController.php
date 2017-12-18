<?php

namespace App\Http\Controllers\Home;

use App\Posts;
use App\Categories;
use App\Comments;
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
        $pid = $request->id;
        $artFind = (new Posts)->getOne(['post_id' => $pid]);
        $data=(new Comments)->getPrinmaryCate($pid);
        return view('Themes/'.$this->theme.'Home/details', ['artFind' => $artFind,'pid'=>$pid,'data'=>$data]);
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
