<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-11 15:50:57 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 18:54:41
 */

namespace App;

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Navigate extends Model
{
    const ROOT = 0;     // 顶级导航

    protected $primaryKey = 'nav_id';

    /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = ['nav_name','jump_url','is_open','parent_id','language'];

    /**
     * 获取导航树-后台下拉框使用
     *
     * @param integer $pid
     * @param integer $level
     * @return array
     */
    public static function getNavigateTree($pid=self::ROOT,$level=1)
    {
        static $result = [];
        $list = self::where(['parent_id'=>$pid,'language'=>\App\Tools\admin_language()])->get()->toArray(); 
        if(is_array($list))
        {
            foreach($list as $key=>$value)
            {
                $value['level'] = $level;
                $result[] = $value;
                self::getNavigateTree($value['nav_id'],$level+1);
            }
        }
        return $result;
    }

    /**
     * 获取前台二级导航
     *
     * @param integer $pid
     * @return void
     */
    public static function getHeaderNavigate($pid=self::ROOT)
    {
        $list = self::where(['parent_id'=>$pid,'language'=>\App\Tools\home_language()])->orderby('sort','ASC')->get()->toArray(); 
        if(is_array($list))
        {
            foreach($list as $key=>$value)
            {
                $list[$key]['son'] = self::getHeaderNavigate($value['nav_id']);
            }
        }
        return $list;        
    }

}
