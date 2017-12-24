<?php

namespace App\Http\Controllers\Home;

use App\Posts;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ListController extends HomeController
{


    /**
     * 列表展示页
     *
     * @return void
     */
    public function index(Request $request)
    {             
        try
        {
            $param = $request->param;
            if(!isset($param) || empty($param))
            {
                throw new \Exception('error-404');
            }
            // 根据参数查询分类或标签文章 tag-xxx  category-xxx
            if(preg_match('/tag/',$param))
            {
                $paramArr = explode('-',$param);
                $tag = $paramArr[1];
                // 按标签查找-待开发
            }

            if(preg_match('/category/',$param))
            {
                $paramArr = explode('-',$param);
                $catInfo = Categories::getInfo($paramArr[1]);
                
                // 按分类查找
                $list = Posts::getPostList($catInfo->cat_id);
            
            }            

            return view('Themes/'.$this->theme.'Home/list',['artList' => $list]);

        }
        catch(\Exception $e)
        {
            return redirect('/error');
        }
    }
}
