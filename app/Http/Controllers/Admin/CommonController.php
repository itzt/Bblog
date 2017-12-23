<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-14 19:49:06 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 18:24:33
 */

namespace App\Http\Controllers\Admin;
use Config;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;

class CommonController extends Controller
{
    /**
     * 后台数据缓存时间
     * 
     */
    protected $out_cache_time = 1;  // 分钟

    public function __construct()
    {
        // 获取管理员选择的语言
        \App::setLocale(\App\Tools\admin_language());
        
        // 验证是否登录 
        $this->middleware('auth');
        
    }

    /**
     * 重写基类-自定义验证失败返回格式
     *
     * @param Validator $validator
     * @return void
     */
    protected function formatValidationErrors(Validator $validator)
    {
        return ['status'=>Config::get('constants.http_status_no_accept'),'message'=>implode("\n",$validator->errors()->all())];
    }

}