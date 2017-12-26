<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-14 19:15:33 
 * @Last Modified by: zhangtao
 * @Last Modified time: 2017-12-25 22:03:28
 */

namespace App\Http\Controllers\Home;

use App\Tags;
use App\Posts;
use App\Navigate;
use App\PostsTags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Cache;
use \Symfony\Component\HttpKernel\Exception\HttpException;
class HomeController extends Controller
{
    /**
     * 前台数据缓存时间-分钟
     * 
     */
    protected $cacheTime = 0;   // 开发阶段暂设为0

    public function __construct(Request $request){
        // 读取最后三条标签信息
        $hotTags = Cache::get('hotTags');
        if(empty($hotTags) && is_null($hotTags))
        {
            $hotTags = Tags::getHotTags();
            Cache::put('hotTags', $hotTags, $this->cacheTime);
        }
        view()->share('hotTags', $hotTags);

        // 记录本次URL
        session()->flash('goback', $request->url());
        
        // 读取后台配置-视图间共享数据
        $sets = Cache::get('sets');
        if(is_null($sets))
        {
            $sets = (new \App\SetsModel)->setlist();
            Cache::put('sets',$sets,$this->cacheTime);
        }
        view()->share('sets',$sets);
        
        // 查询公共导航-视图间共享数据
        $navList = Cache::get('navList');
        if(is_null($navList))
        {
            $navList = Navigate::getHeaderNavigate();
            Cache::put('navList',$navList,$this->cacheTime);
        }        
        view()->share('navList',$navList);
        // 载入皮肤
        $this->theme = env('DEFAULT_THEM','Pithy');
        
    }

    /**
     * 根据文章id查找对应的文章信息
     *
     * @param Request $request
     * @return void
     */
    public function searchtags(Request $request)
    {
        if($request->ajax())
        {
            $tid      = intval($request->input('tid'));
            if(!empty($tid))
            {
                $ids      = array_column(PostsTags::getAllPostId($tid), 'post_id');// 获取所有文章id
                if(!empty($ids))
                {
                    $artList  = Posts::getAllPostsList($ids);
                    echo json_encode($artList);
                }
                else
                {
                    return \App\Tools\ajax_error();
                }
            }
            else
            {
                return \App\Tools\ajax_error();
            }
        }
    }


}
