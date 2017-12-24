<?php
/*
 * @Author: zhangtao 
 * @Date: 2017-12-24 20:09:45 
 * @Last Modified by: zhangtao
 * @Last Modified time: 2017-12-24 20:36:49
 */


namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $primaryKey = 'tag_id';

    /**
     * 前台首页需要的标签列表
     *
     * @return void
     */
    static public function getSearchTagList()
    {
        return self::select()->get();
    }

    /**
     * 根据标签名称查询标签对象
     *
     * @param [type] $tagName
     * @return void
     */
    static public function getInfo($tagName)
    {
        return self::where(['tag_name' => $tagName])->first();
    }
}