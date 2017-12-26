<?php

namespace App\Http\Controllers\Home;
use App\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
class CommentsController extends HomeController
{
    protected $userInfo = null;

    public function __construct(Request $request)
    {
        try
        {
            parent::__construct($request);            

            // 检测是否登录-暂且必须登录方可评论-后面可根据配置要求
            if(true)
            {
                // 主动执行中间间拿到SESSION
                $this->middleware(function ($request, $next) {
                    // dd($request->session()->all());
                    if(!$request->session()->has('users'))
                    {
                        // 未登录-弹出登录二维码
                        throw new HttpException('401','请先登录.');
                    }
                    $this->userInfo =  $request->session()->get('users');

                    return $next($request);
                });  
            }
        
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(),$e->getMessage());
        }
    }
    /**
     * 回复
     *
     * @param Request $request
     * @return void
     */
    public function replay(Request $request)
    {
        try
        {
                        
            if($request->ajax())
            {

                //表中admin_id字段没有修改
                $all = $request->all();
                $all = $request->except('_token');
                $all['ip'] = $request->getClientIp();
                $all['nickname'] = $this->userInfo['nickname'];  
                $all['email'] = $this->userInfo['email'];  
                $all['user_id'] = $this->userInfo['user_id'];

                // 数据入库
                $result = \App\Comments::create($all);

                if($result)
                {   
                    return \App\Tools\ajax_success('回复成功');
                }
                else
                {
                    return \App\Tools\ajax_error('回复失败');
                }
            }
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(),$e->getMessage());
        }
    }

    /**
     * 文章评论
     *
     * @param Request $request
     * @return void
     */
    public function comment(Request $request)
    {
        try
        {            
            if($request->ajax())
            {

                $all = $request->all();    

                $all = $request->except('_token');
                $all['ip'] = $request->getClientIp();
                $all['nickname'] = $this->userInfo['nickname'];
                $all['email'] = $this->userInfo['email'];
                $all['user_id'] = $this->userInfo['user_id'];

                // 评论数据入库
                if(\App\Comments::create($all))
                {   
                    return \App\Tools\ajax_success('评论成功',$this->userInfo);
                }
                else
                {
                    return \App\Tools\ajax_error('评论失败',$this->userInfo);
                }
            }
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(),$e->getMessage());
        }

    }
}
