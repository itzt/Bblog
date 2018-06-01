<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-14 11:47:40 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 18:26:07
 */

namespace App\Http\Controllers\Admin;
use Config;
use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Cache;
use \Symfony\Component\HttpKernel\Exception\HttpException;


class IndexController extends CommonController
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {

        return view('Admin/Index/index');
    }

    /**
     * 清除全站缓存
     *
     * @return void
     */
    public function clearCache()
    {
        Cache::flush();
        return \App\Tools\ajax_success();
    }

    /**
     * 设置选择的语言
     *
     * @return void
     */
    public function setLanguage(Request $request)
    {
        if($request->ajax()){
            $lang = (isset($request->lang)&&!empty($request->lang)) ? $request->lang : 'zh-CN';
            // 统一入口获取或设置选择的语言
            \App\Tools\admin_language($lang);
            
            // return $this->returnCode(200,'',$res);
        }
    }

    /**
     * 欢迎页
     *
     * @return void
     */
    public function welcome(Request $request)
    {
        if($request->ajax())
        {
            // 获取统计信息
            try
            {   
                // 读取缓存
                $result = Cache::get('everyMonthCount');
                if(is_null($result))
                {
                    // 获取查询月
                    $month = $this->getMothList();
                    //统计给定月阶段内文章数量
                    if(!$postsCount = $this->getMothPostsCount($month))
                    {
                        throw new HttpException(\Config::get('constants.http_status_server_error'),trans('common.server_exception'));
                    }
                    
                    //统计给定月阶段内评论数量
                    if(!$commentsCount = $this->getCommentsCount($month))
                    {
                        throw new HttpException(\Config::get('constants.http_status_server_error'),trans('common.server_exception'));
                    }

                    // 统计会员数
                    if(!$usersCount = $this->getUsersCount($month))
                    {
                        throw new HttpException(\Config::get('constants.http_status_server_error'),trans('common.server_exception'));
                    }

                    $result = [
                        'message'=>'',
                        'status'=>\Config::get('constants.status_success'),
                        'data'  =>[
                            'month' =>array_column($month,'show'),
                            'series'=>[
                                ['name'  =>trans('common.article'), 'data'  =>$postsCount],
                                ['name'  =>trans('common.comment'), 'data'  =>$commentsCount],
                                ['name'  =>trans('common.users'),   'data'  =>$usersCount],
                                
                                // ['name'  =>'访客','data'  =>[42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]],
                            ]
                        ]
                    ];    
                    // 设置缓存
                    Cache::put('everyMonthCount',$result,$this->out_cache_time);   
                }

                return $result;

            }
            catch(\Exception $e)
            {
                return \App\Tools\ajax_exception($e->getStatusCode(), $e->getMessage());
            }

        }

        return view('Admin/Index/welcome');
    }


    /**
     * 计算统计月列表
     * 计算方式：
     * 服务器当前月起,统计12个月,今年不足去年凑.
     * 
     * @return void
     */
    private function getMothList(){

        // 时区选择
        //date_default_timezone_get();

        $result = Cache::get('everyMonthDate');
        if(is_null($result))
        {

            $result = [];
            $nowMoth = date("m");
            $nowYear = date("Y");

            for($i=1; $i<=12; $i++)
            {
                if($nowMoth > 0)
                {
                    // 获取每月天数
                    $day = date("t",strtotime($nowYear.'-'.$nowMoth));
                    $beginMoth = mktime( 0, 0, 0, $nowMoth, 1, $nowYear);
                    $endMoth = mktime( 23, 59, 59, $nowMoth, $day, $nowYear);
                    
                }
                else
                {
                    // 本年内月不足12个月，从去年12月开始补位
                    $nowMoth = 12;
                    $nowYear -= 1;
                    $day = date("t",strtotime($nowYear.'-'.$nowMoth));
                    $beginMoth = mktime( 0, 0, 0, $nowMoth, 1, $nowYear);
                    $endMoth = mktime( 23, 59, 59, $nowMoth, $day, $nowYear);

                }
                
                $result[] = [
                    'show'  =>$nowYear.trans('common.year').$nowMoth.trans('common.month'),
                    'date'  =>['begin'=>date("Y-m-d H:i:s",$beginMoth),'end'=>date("Y-m-d H:i:s",$endMoth)],
                    'stamp' =>['begin'=>$beginMoth,'end'=>$endMoth]
                ];
                $nowMoth -= 1;
            }
            Cache::put('everyMonthDate',$result,$this->out_cache_time);
        }
 
       return $result;
        
    }

    /**
     * 统计指定时间内文章数
     *
     * @param array $searchDate     时间集合
     * @return void
     */    
    private function getMothPostsCount($searchDate)
    {
        $counts = [];
        $lang = \App\Tools\admin_language();
        if(is_array($searchDate) && !empty($searchDate))
        {
            foreach($searchDate as $key=>$value)
            {
                $counts[] = \App\Posts::where(['language'=>$lang])->whereBetween('created_at',[$value['date']['begin'],$value['date']['end']])->count();
            }
            return $counts;
        }
        return null;
    }

    /**
     * 统计指定时间内评论数
     *
     * @param array $searchDate     时间集合
     * @return void
     */
    private function getCommentsCount($searchDate)
    {
        $counts = [];
        if(is_array($searchDate) && !empty($searchDate))
        {
            foreach($searchDate as $key=>$value)
            {
                $counts[] = \App\Comments::whereBetween('created_at',[$value['date']['begin'],$value['date']['end']])->count();
            }
            return $counts;
        }
        return null;
    }

    /**
     * 统计指定时间段内会员数
     *
     * @param array $searchDate     时间集合
     * @return void
     */
    private function getUsersCount($searchDate)
    {
        $counts = [];
        if(is_array($searchDate) && !empty($searchDate))
        {
            foreach($searchDate as $key=>$value)
            {
                $counts[] = \App\User::whereBetween('created_at',[$value['date']['begin'],$value['date']['end']])->count();
            }
            return $counts;
        }
        return null;
    }
}
