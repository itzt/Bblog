<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Admins extends Model
{
    const START_STATUS = 1; // 正常状态
    const END_STATUS   = 0; // 禁用状态
    /**
     * 获取所有作者信息
     *
     * @return void
     */
    static public function getAuthorInfo()
    {
        return self::select('id', 'avatar', 'name', 'profession', 'address', 'introduce')
                    ->where(['status' => self::START_STATUS])
                    ->get();
    }
    //读取用户数据
    public function admin_select()
    {
        $name = Session::get('email');
        $data = DB::table('admins')->where('email','=',$name)->first();
        return $data;
    }
    //用户更改数据
    public function admin_save($data)
    {
        if(empty($data))
        {
            return false;
        }else
        {
            // var_dump($data);die;
            $up=\App\Admins::where('id',$data['id'])->update($data);
            if($up == true)
            {
                return 1;
            }else
            {
                return 2;
            }
        }
        
    }
    //重置密码
    public function userReset($request)
    {
        $name = DB::table('admins')->where('name',$request['name'])->first();
        if(empty($name))
        {
            return 0;
        }else
        {
            $name = DB::table('admins')->where('email',$request['email'])->first();
            if(empty($name))
            {
                return 0;
            }else
            {
                $up = \App\Admins::where('name',$request['name'])->update(['password'=>bcrypt($request['password'])]);
                if($up == true)
                {
                    return 1;
                }else
                {
                    return 2;
                }
                
            }
        }
    }
    //上传头像
    public function userAvatar($request)
    {
        
        // 1.是否有文件上传
        if($request->hasFile('image'))
        {
            $newFileName = $request->file('image')->getClientOriginalName();
            // 2.保存到该磁盘（通过检查/storage目录的.gitignore，了解该目录下的文件才能被提交，在软链接配置后直接可访问）
            // storage确认存储位置，file获取全部文件内容
            if(\Storage::disk('qiniu')->put($newFileName, \File::get($request->file('image')->path())))
            {
                $img = (\Storage::disk('qiniu')->getDriver()->downloadUrl($newFileName));
                $up = DB::table('admins')->where('id',$request->input('id'))->update(['avatar'=>$img->getUrl()]);
                // var_dump($up);die;
                return $up;
            }
        }else
        {
            return 2;
        }
    }
}
