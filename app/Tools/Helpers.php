<?php
namespace App\Tools;

/*
 * 应用公共函数库
 * 
 * @Author: DingBing 
 * @Date: 2017-12-11 15:43:03 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 19:18:38
 */

use \Illuminate\Support\Facades\Cache;

/** 记录前台用户选择的语言 */
function home_language($value=null)
{
    if(isset($value))
    {
        return Cache::put('home_language',$value,100);
    }
    else
    {
        
        $language = Cache::get('home_language');
        return empty($language) ? 'zh-CN' : $language;
    }

}

/** 记录后台管理员选择的语言 */
function admin_language($value=null)
{
    if(isset($value))
    {
        return Cache::put('admin_language',$value,100);
    }
    else
    {
        $language = Cache::get('admin_language');
        return empty($language) ? 'zh-CN' : $language;
    }

}

/**
 * 格式化显示时间
 *
 * @param string  $datetime  日期如：2017-12-25 17:34:11
 * @return void
 */
function beautify_date($datetime)
{
    $difference = time() - strtotime($datetime);
    if($difference > 7*24*3600)
    {
        return '7 days ago';
    }
    else if($difference > 6*24*3600)
    {
        return '6 days ago';
    }
    else if($difference > 5*24*3600)
    {
        return '5 days ago';
    }
    else if($difference > 4*24*3600)
    {
        return '4 days ago';
    }
    else if($difference > 3*24*3600)
    {
        return '3 days ago';
    }
    else if($difference > 2*24*3600)
    {
        return '2 days ago';
    }
    else if($difference > 1*24*3600)
    {
        return '1 days ago';
    }
    else if($difference > 3600)
    {
        return '1 hour ago';
    }
    else if($difference > 1800)
    {
        return '30 minutes ago';
    }
    else if($difference > 1200)
    {
        return '20 minutes ago';
    }
    else if($difference > 600)
    {
        return '10 minutes ago';
    }
    else if($difference > 300)
    {
        return '5 minutes ago';
    }
    else if($difference > 240)
    {
        return '4 minutes ago';
    }
    else if($difference > 180)
    {
        return '3 minutes ago';
    }
    else if($difference > 120)
    {
        return '2 minutes ago';
    }
    else if($difference > 60)
    {
        return '1 minutes ago';
    }
    else if($difference > 1)
    {
        return 'Just a moment';
    }                                                      

}

/** Ajax 操作成功响应消息 */
function ajax_success($message='',$data=[])
{
    $message = empty($message) ? trans('common.message_success') : $message;
    return ['status'=>\Config::get('constants.status_success'),'message'=>$message,'data'=>$data];  
}

/** Ajax 操作失败响应消息 */
function ajax_error($message='',$data=[])
{
    $message = empty($message) ? trans('common.message_failure') : $message;
    return ['status'=>\Config::get('constants.status_error'),'message'=>$message];
}

/** Ajax 操作异常响应消息 */
function ajax_exception($statusCode,$message='')
{
    if(empty($message)) $message = trans('common.server_exception');
    $data = ['status'=>\Config::get('constants.status_danger'),'message'=>$message];
    return response()->json($data, $statusCode)->send();exit;
}



