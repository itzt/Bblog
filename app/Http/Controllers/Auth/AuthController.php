<?php
namespace App\Http\Controllers\Auth;


use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    # 用户点击微信登录按钮后，调用此方法请求微信接口
    public function oauth()
    {
        return \Socialite::with('weixin')->redirect();
    }

    # 微信的回调地址
    public function callback(Request $request)
    {
        $oauthUser = \Socialite::with('weixin')->user();

        $opendId = $oauthUser->id;        
        $data = [
            'nickname'  => $oauthUser->nickname,
            'email'     => empty($oauthUser->email) ? '' : $oauthUser->email,
            'avatar'    => $oauthUser->avatar,
            'sex'       => $oauthUser->user['sex']
        ];
        
        // 接下来处理相关的业务逻辑
        $user = \App\User::where(['open_id'=>$opendId])->first();;
        if(is_null($user))
        {
            // 首次来-注册用户
            $result = \App\User::create(array_merge($data,['open_id'=>$opendId]));
        }
        else
        {
            // 注册过-更新头像、昵称  
            $result = \App\User::where('open_id', $opendId)->update($data);
        }
        // 记录Session
        $request->session()->put('users', $data);

        $goback = session('goback');
        return redirect($goback);

    }

}