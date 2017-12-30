<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Cache;

class SetsModel extends Model
{

    /**
     * 读取配置
     *
     * @return void
     */
    public  function setlist()
    {
        $setConfig = Cache::get('setConfig');
        if(is_null($setConfig))
        {
            $setList = DB::table('sets')->where(['language'=>\App\Tools\admin_language()])->select()->get()->toArray();
            $array = array();
            foreach ($setList as $key => $value)
            {
                $array[$value->name]=$value->value;
            }
            Cache::put('setConfig',$array,60);
            return $array;
        }
        return $setConfig;
    }

    /**
     * 修改或新增配置
     *
     * @param  array  $res  配置项
     * @return void
     */
    public function saveSet($res)
    {
        $setList = DB::table('sets')->where(['language'=>\App\Tools\admin_language()])->select()->get()->toArray();
        if(empty($setList))
        {
            foreach ($res as $k => $v)
            {
                $return = DB::table('sets')->insert(['name' => $k,'value' => $v,'language'=>\App\Tools\admin_language()]);
            }
            return true;
        }
        else
        {
            foreach ($res as $k => $v)
            {
                $return = DB::table('sets')->where(['name'=>$k])->where(['language'=>\App\Tools\admin_language()])->update(['value' => $v]);
            }
            return true;
        }
    }
}
