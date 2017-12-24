<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-24 20:39:03 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-24 21:22:08
 */

namespace App;

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
     * @return void
     */
    static public function getInfo($tagName)
    {
        return self::where(['tag_name'=>$tagName])->first();
    }

}
