<?php
/*
 * @Author: zhangtao 
 * @Date: 2017-12-25 16:13:20 
 * @Last Modified by: zhangtao
 * @Last Modified time: 2017-12-25 21:43:24
 */



namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class PostsTags extends Model
{
    protected $primaryKey = ['tag_id', 'post_id'];
    public $incrementing = false;

    /**
     * 属于该标签的文章
     */
    public function posts()
    {
        return $this->belongsToMany('App\Posts','posts_tags','tag_id','post_id');
    }

    /**
     * 获取文章使用最多的标签数. 取三条.
     *
     * @return void
     */
    static public function getHotTags()
    {
        return self::select(DB::raw("count(tag_id) as num"), 'post_id')
                    ->groupBy('tag_id')
                    ->limit(3)
                    ->get();
    }
    /**
     * 获取该标签下所有文章id
     *
     * @param [type] $tid
     * @return void
     */
    static public function getAllPostId($tid = '')
    {
        if($tid == 'all' || $tid == '')
        {
            $query = self::select('post_id', 'tag_id');
        }
        else
        {
            $query = self::select('post_id', 'tag_id')->where(['tag_id' => $tid]);
        }
        return $query->get()->toArray();
    }
}
