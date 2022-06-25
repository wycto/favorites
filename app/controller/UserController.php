<?php
namespace app\controller;

use app\model\User;
use support\Request;

class UserController
{
    function login(Request $request){
        if($request->method()=='POST'){
            $email = $request->post('email');
            $password = $request->post('password');

            $user = User::where('email',$email)->first();
            if(empty($user)){
                return json(['code'=>201,'msg'=>'账号不存在']);
            }

            if($user->password!=md5($password)){
                return json(['code'=>201,'msg'=>'密码不正确']);
            }

            $user->token = md5($email.$password.time());
            if(!$user->save()){
                return json(['code'=>201,'msg'=>'更新token失败']);
            }

            if(!$user->fresh()){
                return json(['code'=>201,'msg'=>'刷新token失败']);
            }

            return json(['code'=>200,'msg'=>'登录成功','token'=>$user->token]);

        }else{
            return view('user/login');
        }
    }
}