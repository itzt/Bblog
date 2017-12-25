<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-14 19:15:33 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-25 11:10:42
 */

namespace App\Http\Controllers\Home;

use App\Navigate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Cache;
class HomeController extends Controller
{
    /**
     * 前台数据缓存时间-分钟
     * 
     */
    protected $cacheTime = 0;   // 开发阶段暂设为0


    public function __construct(Request $request){
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


}
