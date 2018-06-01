<?php

namespace App\Http\Controllers\Admin;
use Config;
use App\Http\Controllers\Controller;
use App\SetsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Cache;

class SystemController extends CommonController
{

    /**
     * 系统设置
     *
     * @author BING
     * @return void
     */
    public function setting(Request $request)
    {
        $setConfig = (new SetsModel())->setlist(); 
        // dd($setConfig);
        return view('Admin/System/setting',['array'=>$setConfig]);
    }

    /**
     * 系统设置更新
     *
     * @param Request $request
     * @return void
     */
    public function setadd(Request $request)
    {
        if($request->isMethod('POST'))
        {
            // 清除设置缓存
            Cache::forget('setConfig');
            $res = $request->all();
            $return= (new SetsModel())->saveSet($res);
            if($return)
            {
                return ['status'=>Config::get('constants.status_success'),'message'=>trans('common.message_success')];
            }
            else
            {
                return ['status'=>Config::get('constants.status_error'),'message'=>trans('common.message_failure')];
            }
        }
    }

}
