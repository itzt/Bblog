<?php

namespace App\Http\Controllers\Home;
use App\Tags;
use App\Posts;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ListController extends HomeController
{


    /**
     * 分类、标签列表展示页
     *
     * @return void
     */
    public function index(Request $request)
    {
        $catList = Categories::getSearchCat();
        try
        {
            $param = $request->param;
            if(!isset($param) || empty($param))
            {
                throw new \Exception('error-404');
            }

            $paramArr = explode('-',$param);

            // 根据参数查询标签文章 tag-xxx
            if(preg_match('/tag/',$param))
            {
                // 按标签查找-待开发
                $tag = Tags::getInfo($paramArr[1]);
                $list = $tag->posts;
            }
            // 根据参数查询分类文章 category-xxx
            if(preg_match('/category/',$param))
            {
                $category = Categories::getInfo($paramArr[1]);   
                // 按分类查找
                $list = $category->posts;
            
            }            
            return view('Themes/'.$this->theme.'Home/list',['artList' => $list]);

        }
        catch(\Exception $e)
        {
            return redirect('/error');
        }
    }

    public function getMore()
    {
        
    }
}
