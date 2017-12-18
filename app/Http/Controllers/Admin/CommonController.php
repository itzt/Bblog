<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-14 19:49:06 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-14 19:57:20
 */

namespace App\Http\Controllers\Admin;
use Config;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;

class CommonController extends Controller
{
    public function __construct()
    {
        $locale = \App\Tools\admin_language();     
        \App::setLocale($locale);
        
    }

    // public function language(Request $request)
    // {
    //     $name = 'language';
    //     if(isset($value))
    //     {
    //         // $request->session()->put('language',$lang);
    //         $cookie = cookie($name,$value,time()+365*30*24*60);
    //         return (new \Illuminate\Http\Response)->cookie($cookie);
    //     }
    //     else
    //     {
    //         $res = $request->cookie($name);
    //         var_dump($res);

    //     }
    // }

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