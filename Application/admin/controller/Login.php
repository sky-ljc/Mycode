<?php
namespace app\admin\controller;
use app\admin\model\Admin;
use think\Config;
use think\Controller;
use think\Request;
use think\Session;
use think\Validate;

class Login extends Controller {
    //登陆
    public function index(Request $request)
    {
        if($request->isPost()){
            $validate = new Validate([
                'username' => 'require|max:20',
                'password' => 'require',
                'captcha'  => 'require|captcha'
            ]);
            $data=[
                'username' =>input('username'),
                'password' => md5(input('password')),
                'captcha'  => input('captcha')
            ];
            //如果格式不正确
            if(!$validate->check($data)){
                _callBack($validate->getError());
                die();
            }
            //开始验证码信息
            $admin = new Admin();
            $where['name'] = $data['username'];
            $where['password'] = $data['password'];
            $res = $admin->where($where)->field('id,name,is_admin')->find();
            if($res){
                $info = ['id'=>$res->id,'name'=>$res->name,'is_admin'=>$res->is_admin];
                Session::set('admin',$info);
                return redirect('Index/index');
            }else{
                _callBack('用户不存在!');
            }
        }else{
            return view('/login');
        }
    }
    public function code()
    {

    }

    //用户退出
    public function logout(){
        Session::delete('admin');
        return redirect(url('Login/index'));
    }
}