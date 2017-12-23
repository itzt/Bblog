<?php
namespace App\Tools;

/*
 * 应用公共函数库
 * 
 * @Author: DingBing 
 * @Date: 2017-12-11 15:43:03 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 17:38:23
 */


/** 记录管理员选择的语言 */
function admin_language($value=null)
{
    if(isset($value))
    {
        // $request->session()->put('language',$lang);
        return response('')->cookie('language',$value,365*30*24*60)->send();
    }
    else
    {
        $language = request()->cookie('language');
        return empty($language) ? 'zh-CN' : $language;
    }

}

/** Ajax 操作成功响应消息 */
function ajax_success()
{
    return ['status'=>\Config::get('constants.status_success'),'message'=>trans('common.message_success')];                    
}

/** Ajax 操作失败响应消息 */
function ajax_error()
{
    return ['status'=>\Config::get('constants.status_error'),'message'=>trans('common.message_failure')];
}

/** Ajax 操作异常响应消息 */
function ajax_exception($statusCode,$message='')
{
    if(empty($message)) $message = trans('common.server_exception');
    $data = ['status'=>\Config::get('constants.status_danger'),'message'=>$message];
    return response()->json($data, $statusCode);
}



