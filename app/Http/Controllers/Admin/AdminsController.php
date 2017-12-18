<?php

namespace App\Http\Controllers\Admin;
use Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Admins;

class AdminsController extends Controller
{
  use AuthenticatesUsers;
   

  //登陆
  //  public function login(){
  //     return view('auth.login');
  //  }
   //注册
   public function register(){

   } 
   //重置密码
   public function reset(Request $request)
   {
      $data = (new Admins())->admin_select();
      // var_dump($data);die;
      return view('Admin.User.reset',['data'=>$data]);
      // return view('auth.passwords.reset');
   }

}
