<?php

namespace App\Http\Controllers\Admin;
use Config;
use App\Http\Controllers\Controller;
use App\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ResetsPasswords;
use \Symfony\Component\HttpKernel\Exception\HttpException;
use zgldh\QiniuStorage;

class AdminUsersController extends Controller
{
    use ResetsPasswords;
    //个人信息
    public function user_information(Request $request)
    {
        
         $data = $request->input();
        //  $file = $request->hasfile('image');
         $data=$request->except('_token','pass');
         if(empty($data))
         {
            $data = (new Admins())->admin_select();
            // var_dump($data);die;
            return view('Admin.User.information',['data'=>$data]);
         }else
         {
            $up = (new Admins())->admin_save($data);
            if($up ==true)
            {
                echo "<script>alert('更改成功');location.href='/admin/index'</script>";
            }
         }
    }
    //重置密码
    public function reset(Request $request)
    {
        $data = $request->input();
        $data=$request->except('_token','pass');
        $ret = (new Admins())->userReset($data);
        if($ret==0)
        {   
            return \App\Tools\ajax_exception();
        }
        else if($ret==1)
        {
            return \App\Tools\ajax_success();
        }
        if($ret==2)
        {
            return \App\Tools\ajax_error();
        }
        // return $ret;
        // var_dump(bcrypt($data['password']));die;
    }
    //头像上传
    public function images(Request $request)
    {
        // var_dump($request->input('image'));die;
        $ret = (new Admins())->userAvatar($request);
        if($ret==1)
        {
            return \App\Tools\ajax_success();
        }else if($ret==2)
        {
            return \App\Tools\ajax_error();
        }
    }
    
}


?>