<?php

namespace App\Http\Controllers\Home;
use App\Tags;
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
        $data = $this->indexCommon();
        return view('Themes/'.$this->theme.'Home/index', [
            'artList' => $data['artList'],
            'catList' => $data['catList'],
            'tagList' => $data['tagList'],
            'recList' => $data['recList'],
            'title'   => $data['title']
        ]);
    }

    public function search(Request $request)
    {
        $data    = $this->indexCommon();
        $title   = $request->title;
        return view('Themes/'.$this->theme.'Home/index', [
            'artList' => $data['artList'],
            'catList' => $data['catList'],
            'tagList' => $data['tagList'],
            'recList' => $data['recList'],
            'title'   => $data['title']
        ]);
    }
    /**
     * 首页信息展示 和 搜索公共方法
     *
     * @return void
     */
    private function indexCommon()
    {
        $data['title']   = '';
        $data['artList'] = Posts::getArchiveList(Posts::STATUS_PUBLISH, $data['title'], 10);
        $data['catList'] = Categories::getSearchCat();
        $data['tagList'] = Tags::getSearchTagList();
        $data['recList'] = Posts::getRecentList();
        return $data;
    }

    /**
     * get find article info
     *
     * @param Request $request
     * @return void
     */
    public function details(Request $request)
    {
        try
        {
            // 获取title值
            $title   = $request->title; 
            if(!isset($title) || empty($title))
            {
                throw new \Exception('error');
            }
            Posts::where(['title' => $title])->increment('read_num', 1); // 每次点击当前文章阅读量自增1
            
            $artFind = (new Posts)->getOne(['title' => $title]); // 根据标题获取此信息
            
            $where   = ['cat_id' => $artFind->cat_id, 'status' => Posts::STATUS_PUBLISH, 'language' => \App\Tools\home_language()];
            $prevNext= (new Posts)->getPrevAndNextInfo($where); // 获取详情页的同类信息 2条
            $data = [];
            
            // 文章关联标签
            $tags = $artFind->postsTags;
            
            //$data=(new Comments)->getPrinmaryCate($artFind->post_id);
            // dd($data);
            return view('Themes/'.$this->theme.'Home/details', ['artFind'=>$artFind, 'prevNext'=>$prevNext, 'data'=>$data, 'tags'=>$tags]);
        }
        catch(\Exception $e)
        {
            return redirect('/error');
        }

    }

    /**
     * show article all list
     *
     * @return void
     */
    public function archive()
    {
        $title = '';
        $artList = Posts::getArchiveList(Posts::STATUS_PUBLISH, $title, 6);

        return view('Themes/'. $this->theme. 'Home/archive', ['artList' => $artList]);
    }

    /**
     * 404页面
     *
     * @return void
     */
    public function error()
    {
        return view('Themes/'. $this->theme. 'Home/404');
    }


}
