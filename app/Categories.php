<?php
/*
 * @Author: zhangtao 
 * @Date: 2017-12-04 15:23:26 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-24 21:31:02
 */

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    const PARENTID = 0;
    protected $primaryKey = 'cat_id';

    /**
     * 获取分类下的所有文章。
     */
    public function posts()
    {
        return $this->hasMany('App\Posts','cat_id','cat_id');
    }  

    /**
     * 获取前台首页需要的分类列表
     *
     * @return void
     */
    static public function getSearchCat()
    {
        return self::select('cat_id', 'cat_name')->where(['parent_id' => self::PARENTID])->limit(6)->get();
    }
    /**
     * 获取所有分类信息
     *
     * @return void
     */
    public function getList()
    {
        return $this->select('cat_id', 'cat_name')->get()->toArray();
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
            if($val['parent_id'] == $parentId && $val['cat_id'] != $exclude)
            {
                $val['level'] = $level;
                $arr[] = $val;
                self::recursion($data, $exclude, $val['cat_id'], $level+1);
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
    static public function getCategoryList($data = [])
    {
        $arr = [];
        $catList = self::recursion($data);
        
        foreach($catList as $key => $val)
        {
            $arr[$val['cat_id']] = str_repeat("　　|", $val['level']).$val['cat_name'];
        }
        return $arr;
    }

    /**
     * 根据分类名称查询分类对象
     *
     * @param string $catName
     * @return void
     */
    static public function getInfo($catName)
    {
        return self::where(['cat_name'=>$catName])->first();
    }

    /**
     * 活跃的分类
     *
     * @return void
     */
    static public function activeCategories()
    {
        $categories =  self::select('cat_id', 'cat_name')->get()->toArray();
        $data = [];
        if(is_array($categories))
        {
            foreach($categories as $key=>$category)
            {
                $data[$key]['href'] = '/list/category-'.$category['cat_name'];
                $data[$key]['name'] = $category['cat_name'];
            }
        }
        return $data;        
    }
    
}