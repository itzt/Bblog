<?php
/*
 * @Author: DingBing 
 * @Date: 2017-12-11 15:49:44 
 * @Last Modified by: DingBing
 * @Last Modified time: 2017-12-23 19:19:10
 */
namespace App\Http\Controllers\Admin;
use Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Symfony\Component\Console\Input\Input;
use \Symfony\Component\HttpKernel\Exception\HttpException;
class NavigateController extends CommonController
{

    /**
     * 导航列表展示
     *
     * @return void
     */
    public function show(Request $request)
    {
        $navName = $request->input('nav_name',null);
        $result = \App\Navigate::where('nav_name','like',"%$navName%")->where(['language'=>\App\Tools\admin_language()])->orderBy('nav_id','desc')->paginate(Config::get('constants.page_size'));
        return view('Admin/Navigate/show',['result'=>$result,'navName'=>$navName]);
    }
    /**
     * 切换导航前台展示状态
     *
     * @param Request $request
     * @return void
     */
    public function switchIsNewOpen(Request $request)
    {
        try
        {
            $navId = $request->input('nav_id',null);
            $value = $request->input('value',null);
            if(!isset($navId) || !isset($value))
            {
                throw new HttpException(\Config::get('constants.http_status_no_accept'),trans('common.paramer_exception'));
            }
            if(!$navigate = \App\Navigate::find($navId))
            {
                throw new HttpException(\Config::get('constants.http_status_no_accept'),trans('common.none_record'));
            }
            $navigate->is_open = $value;
            if($navigate->save())
            {
                return \App\Tools\ajax_success();
            }
            else
            {
                return \App\Tools\ajax_error();
            }
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(), $e->getMessage());
        }
    }
    /**
     * 导航创建
     *
     * @return void
     */
    public function create(Request $request)
    {
        if($request->isMethod('post'))
        {
            // 验证数据
            $this->validate($request, [
                'nav_name' => 'required|unique:navigates|max:30',
                'jump_url' => 'required',
            ]);
            $all = $request->all();
            $all['is_open'] = $request->has('is_open') ? 1 : 0;
            $all['language'] = \App\Tools\admin_language();
            // 数据入库
            $result = \App\Navigate::create($all);
            if($result)
            {   
                return \App\Tools\ajax_success();
            }
            else
            {
                return \App\Tools\ajax_error();
            }
        }
        // 上级导航
        $navTree = \App\Navigate::getNavigateTree();
        return view('Admin/Navigate/create')->with(['navTree'=>$navTree]);
    }
    
    
    /**
     * 导航修改
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        try
        {
            $nid = $request->id;
            $navigate = \App\Navigate::find($nid);
            if($request->ajax() && $request->isMethod('post'))
            {
                if(!$navigate)
                {
                    throw new HttpException(\Config::get('constants.http_status_no_accept'),trans('common.none_record'));
                }
                // 自己不能选择自己
                if($request->parent_id == $nid)
                {
                    throw new HttpException(\Config::get('constants.http_status_no_accept'),trans('common.parent_myself'));
                }
                // 验证数据
                $this->validate($request, [
                    'nav_name' => 'required|max:30',
                    'jump_url' => 'required',
                ]);

                $all = $request->except('_token');
                $all['is_open'] = $request->has('is_open') ? 1 : 0;
                // 数据入库
                $result = \App\Navigate::where('nav_id',$nid)->update($all);
                if($result)
                {   
                    return \App\Tools\ajax_success();
                }
                else
                {
                    return \App\Tools\ajax_error();
                }
            }
            // 上级导航
            $navTree = \App\Navigate::getNavigateTree();            
            return view('Admin/Navigate/update',['navigate'=>$navigate])->with(['navTree'=>$navTree]);
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(), $e->getMessage());
        }
    }
    /**
     * 导航删除
     *
     * @return void
     */
    public function delete(Request $request)
    {
        try
        {
            if($request->ajax() && $request->isMethod('post'))
            {
                $nid = $request->input('nid');
                if(!$navigate = \App\Navigate::find($nid))
                {
                    throw new HttpException(\Config::get('constants.http_status_no_accept'),trans('common.none_record'));
                }
                if($res = $navigate->delete())
                {
                    return \App\Tools\ajax_success();
                }
                else
                {
                    return \App\Tools\ajax_error();
                }
            }
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(), $e->getMessage());
        }
    }
    /**
     * 导航批量删除
     */
    public function batchDelete(Request $request)
    {
        try
        {
            if($request->ajax() && $request->isMethod('post'))
            {
                $navids = $request->input('navids');
                if($result = \App\Navigate::destroy($navids))
                {
                    return \App\Tools\ajax_success();
                }
                else
                {
                    return \App\Tools\ajax_error();
                }
            }
        }
        catch(\Exception $e)
        {
            return \App\Tools\ajax_exception($e->getStatusCode(), $e->getMessage());
        }        
    }

    /**
     * 根据类型获取导航数据
     *
     * @return void
     */
    public function getType(Request $request)
    {
        try
        {
            if($request->ajax() && $request->isMethod('get'))
            {
                $type = $request->input('type','');
                if($type == 'tag')
                {
                    return \App\Tools\ajax_success('',\App\Tags::activeTags());
                }
                else if($type == 'page')
                {
                    return \App\Tools\ajax_success('',\App\Posts::activePages());
                }                
                else if($type == 'category')
                {
                    return \App\Tools\ajax_success('',\App\Categories::activeCategories());
                }
                else if($type == 'link')
                {
                    return \App\Tools\ajax_success();
                }

            }
        }
        catch(\Exception $e)
        {
            dd($e);
            return \App\Tools\ajax_exception($e->getStatusCode(), $e->getMessage());
        }           
    }
}