<?php

namespace App\Http\Controllers\Home;
use App\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
class CommentsController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax()){
           
                 //默认前台用户是没有登录的
                  //表中admin_id字段没有修改
                  $all = $request->all();    
                   
                  $all = $request->except('_token');
                  $all['ip']=$_SERVER['REMOTE_ADDR'];
                  $all['nickname']='哈哈';      
                  // 数据入库
                  $result = \App\Comments::create($all);
              
                  if($result)
                  {   
                      return \App\Tools\ajax_success();
                  }
                  else
                  {
                      return \App\Tools\ajax_error();
                  }
              }
   
    }

    /**
     * 文章评论
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request)
    {
        try
        {
            if($request->ajax())
            {
                $usersData = session('users');
                // 检测是否登录-后面待加上可根据配置要求-暂且必须登录方可评论
                if(true)
                {
                    if(!isset($usersData))
                    {
                        // 未登录-弹出登录二维码
                        throw new HttpException('401','请先登录.');
                    }
                }
                //表中admin_id字段没有修改
                $all = $request->all();    

                $all = $request->except('_token');
                $all['ip'] = $request->getClientIp();
                $all['nickname'] = $usersData['nickname'];
                $all['email'] = $usersData['email'];
                $all['user_id'] = $usersData['user_id'];

                // 评论数据入库
                if(\App\Comments::create($all))
                {   
                    return \App\Tools\ajax_success('评论成功',$usersData);
                }
                else
                {
                    return \App\Tools\ajax_error('评论失败',$usersData);
                }
            }
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(),$e->getMessage());
        }

    }
}
