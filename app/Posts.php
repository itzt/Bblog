<?php
/*
 * @Author: zhangtao 
 * @Date: 2017-12-04 15:55:48 
 * @Last Modified by: zhangtao
 * @Last Modified time: 2017-12-24 21:42:08
 */
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Config;
use zgldh\QiniuStorage;
use Illuminate\Http\Request;

class Posts extends Model
{
    const STATUS_PUBLISH  = 'PUBLISH'; // 已发布
    const STATUS_DRAFT    = 'DRAFT';   // 草稿
    protected $primaryKey = 'post_id';
    protected $fillable   = ['title','cat_id','author','status','is_allow','is_page','markdown','html','language'];
    /**
     * get article list
     *
     * @param [type] $type   is PUBLISH or DRAFT
     * @param string $title  has the search where
     * @param string $limit  has the limit
     * @return void
     */
    static public function getArticleList($type, $title = '', $limit = '')
    {
        $query = self::select('post_id','title','author','cat_id','read_num','updated_at','status', 'html')
            ->where(['status' => $type, 'language' => \App\Tools\admin_language()]);
        if(!empty($title))
        {
           $query = $query->where('title', 'like', "%$title%");
        }
        if(!empty($limit))
        {
            $query = $query->limit($limit);
        }
        $arr = $query->orderBy('post_id', 'desc')->paginate(Config::get('constants.page_size'));
        return $arr;
    }

    /**
     * 前台首页数据  最近的帖子  展示6条
     *
     * @return void
     */
    static public function getRecentList()
    {
        return self::select('post_id', 'title', 'updated_at')
                    ->where(['status' => self::STATUS_PUBLISH, 'language' => \App\Tools\admin_language()])
                    ->orderBy('post_id', 'desc')
                    ->limit(6)
                    ->get();
    }
    /**
     * 获取前台文章信息
     *
     * @param [type] $type
     * @param string $title
     * @param string $limit
     * @return void
     */
    static public function getArchiveList($type, $title = '', $limit = '')
    {
        $query = self::select('post_id','title','author','cat_id','read_num','updated_at','status', 'html')
            ->where(['status' => $type, 'language' => \App\Tools\admin_language()]);
        if(!empty($title))
        {
           $query = $query->where('title', 'like', "$title%");
        }
        if(!empty($limit))
        {
            $query = $query->limit($limit);
        }
        return $query->orderBy('post_id', 'desc')->get();
    }
    /**
     * 根据作者 获取相对应的文章信息
     *
     * @param [type] $author
     * @param string $limit
     * @return void
     */
    static public function getAuthorList($author, $limit = '')
    {
        $query = self::select('post_id','title','author','cat_id','read_num','updated_at','status', 'html')
            ->where(['author' => $author, 'language' => \App\Tools\admin_language()]);
        if(!empty($limit))
        {
            $query = $query->limit($limit);
        }
        return $query->orderBy('read_num', 'desc')->get();
    }
    /**
     * 分类的关联
     *
     * @return void
     */
    public function cat()
    {
        return $this->belongsTo('App\Categories', 'cat_id', 'cat_id');
    }
    /**
     * 文章作者的关联  默认管理员
     *
     * @return void
     */
    public function admin()
    {
        return $this->belongsTo('App\Admins', 'author', 'id');
    }
    /**
     * 文章评论的关联
     *
     * @return void
     */
    public function comments()
    {
        return $this->belongsTo('App\Comments', 'post_id', 'post_id');
    }
    /**
     * 文章标签 多对多关系
     *
     * @return void
     */
    public function postsTags()
    {
        return $this->belongsToMany('App\Tags', 'posts_tags', 'post_id', 'tag_id');
    }
    /**
     * 获取一条
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function getOne($where){
        return $this->select('post_id','title','author','cat_id','read_num','like_num','updated_at','status', 'html')
            ->where($where)->first();
    }
    /**
     * 获取文章详情页的上一条和下一条信息
     *
     * @return void
     */
    public function getPrevAndNextInfo($where){
        return $this->select('title','author')
            ->where($where)
            ->orderBy('post_id', 'desc')
            ->limit(2)
            ->get();
    }
    /**
     * 获取对应的文章名称
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getPost($data)
    {
        foreach ($data as $key => $value) {
            $title=$this->getOne(['post_id'=>$value->post_id]);
            $data[$key]->title=$title->title;
        }
        return $data;        
    }

    /**
     * 获取根据分类获取文章列表
     *
     * @param string  $catId
     * @param integer $limit
     * @return void
     */
    static public function getPostList($catId, $limit = 10)
    {
        return self::select('post_id','title','author','cat_id','read_num','updated_at','status', 'html')
            ->where(['status' => self::STATUS_PUBLISH, 'language' => \App\Tools\admin_language()])
            ->where(['cat_id'=>$catId])
            ->limit($limit)
            ->orderBy('post_id', 'desc')
            ->get();
            
    }    

   

}