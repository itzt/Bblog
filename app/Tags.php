<?php
/*
 * @Author: zhangtao 
 * @Date: 2017-12-24 20:09:45 
 * @Last Modified by: zhangtao
 * @Last Modified time: 2017-12-25 17:11:34
 */


namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $primaryKey = 'tag_id';

    /**
     * 属于该标签的文章
     */
    public function posts()
    {
        return $this->belongsToMany('App\Posts','posts_tags','tag_id','post_id');
    }

    /**
     * 根据标签名获取标签记录
     *
     * @param string $tagName
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
        return self::where(['tag_name'=>$tagName])->first();
    }
    /**
     * 获取最后三条标签
     *
     * @return void
     */
    static public function getHotTags()
    {
        return self::select('tag_id', 'tag_name')
                     ->orderBy('tag_id', 'desc')
                     ->limit(3)
                     ->get();
    }

}
