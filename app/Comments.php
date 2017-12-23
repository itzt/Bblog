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
    protected $fillable = ['nickname','email','content','post_id','ip','parent_id'];

    const PARENTID = 0;


    /**
     * 获取评论对应的博客文章
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
    /**
     * 层级关系分类列表
     */
    public function levelCatList()
    {
        return $this->getCategoryList($this->select()->get()->toArray());
    }

    /**
     * 递归实现无限极分类
     *
     * @param [type] $data
     * @param string $exclude
     * @param integer $parentId
     * @param integer $level
     * @return void
     */
    static public function recursion($data, $exclude = '', $parentId = 0, $level = 0)
    {
        static $arr = []; //静态数组
        foreach($data as $key => $val)
        {
            //判断当前父id是否和获取到的一致
            if($val->parent_id == $parentId && $val->com_id != $exclude)
            {
                $val->level = $level;
                $arr[] = $val;
                self::recursion($data, $exclude, $val->com_id, $level+1);
            }
        }
        return $arr;
    }

    /**
     * 添加需要的层级关系的分类列表
     *
     * @param array $data
     * @return void
     */
    static public function getCommentList($data = [])
    {
        $arr = [];
        $catList = self::recursion($data,'',$data[0]->parent_id);
        foreach($catList as $key => $val)
        {

        	$arr[$val->com_id]['content'] =$val->nickname."评论：".$val->content;
        	if($val->level!=0){        		
        		$arr[$val->com_id]['content'] = str_repeat("　　".$val->nickname."回复：", $val->level).$val->content;
        	}
        	$arr[$val->com_id]['created_at']=$val->created_at;
        	$arr[$val->com_id]['ip']=$val->ip;
        	$arr[$val->com_id]['email']=$val->email;
        	$arr[$val->com_id]['title']=$val->title;
        	$arr[$val->com_id]['level']=$val->level;            
        }
        return $arr;
    }

    static public function getHomeCommentList($data = [])
    {
        $arr = [];
        $catList = self::recursion($data,'',$data[0]->parent_id);
        foreach($catList as $key => $val)
        {

        	$arr[$val->com_id]['content'] =$val->nickname."评论：".$val->content;
        	if($val->level!=0){        		
        		$arr[$val->com_id]['content'] = $val->nickname."回复：".$val->content;
        	}
        	$arr[$val->com_id]['created_at']=$val->created_at;
        	$arr[$val->com_id]['ip']=$val->ip;
        	$arr[$val->com_id]['email']=$val->email;
        	$arr[$val->com_id]['title']=$val->title;
        	$arr[$val->com_id]['level']=$val->level;            
        }
        return $arr;
    }

     //查询顶级分类
     static function getPrinmaryCate($post_id){
        
               $top= self::where(['post_id'=>$post_id])->where(['parent_id'=>0])->orderBy('updated_at','asc')->select()->get()->toArray();   
                if(empty($top)){
                    return [];
                }
               $primary=[];
                foreach ($top as $com){
                    $primary[]=[
                        'com_id'=>$com['com_id'],
                        'nickname'=>$com['nickname'],
                        'content'=>$com['content'],
                        'created_at'=>$com['created_at'],
                        'children'=>self::getChild($com['com_id'])
                    ];
                }
        
                return $primary;
            }
        //递归找孩子
        static  function getChild($pid){
            static $children;     
            $data=self::where(['parent_id'=>$pid])->select()->get()->toArray();
          
            if(empty($data)){
                return [];
            }
            
          
            foreach($data as $key => $val)
            {
              $children[]=$val;
              self::getChild($val['com_id']);
            }
            return $children;
        }
}