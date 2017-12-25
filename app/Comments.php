<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Config;
class Comments extends Model
{
    protected $primaryKey='com_id';//表的主键 
    
     /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = ['nickname','email','content','user_id','post_id','ip','parent_id'];

    const PARENTID = 0;


    /**
     * 文章评论着的关联
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }   

    /**
     * 获取评论对应的博客文章
     *
     * @return void
     */
    public function post(){
        return $this->belongsTo('App\Posts','post_id');
    }    
    
    /**
     * 获取所有分类信息
     *
     * @return void
     */
    static public function getList($where=array())
    {
        // 只索引评论
        $map = array_merge($where,['parent_id'=>self::PARENTID]);
        $result = self::where($map)->orderBy('com_id','desc')->paginate(Config::get('constants.page_size'));

        return $result;
    }
    /** 
     * 有条件查询
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function getWhere($where)
    {
    	return $this->select('com_id')->whereIn('parent_id',$where)->get()->toArray();
    }
    /** 
     * 有条件删除
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function delWhere($where)
    {
    	return $this->whereIn('com_id',$where)->delete();
    }
    /**
     * 添加操作
     *
     * @param [type] $post
     * @return void
     */
    public function insertAdd($post)
    {
        return $this->insertGetId($post); // 返回自增id
    }




}