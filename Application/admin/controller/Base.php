<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Base extends Controller{
    public function _initialize()
    {
        $request=  Request::instance();
        $controller=$request->controller();
        $module=$request->module();
        $action=$request->action();
        $active_url=$module.'/'.$controller.'/'.$action;
        //判断是否登录
        if(!$this->check_login()){
            return view('/login');
        }
        $admin = Session::get('admin');
        if($admin['is_admin'] ==1){

        }else{
            $id = $admin['id'];
            //获取角色role_id;
            $role_ids = Db::table('bk_admin_role')->where('user_id',$id)->column('role_id');
            //根据角色role_id获取权限access_id
            $access_ids = DB::table('bk_role_access')->where('role_id','in',$role_ids)->column('access_id');
            //得到权限access_id,获取所有的权限地址
            $urls = DB::table('bk_access')->where('id','in',$access_ids)->column('urls');
            Session::set('url',$active_url);
            Session::set('urls',$urls);
            if(!in_array($active_url,$urls)){
                die('没有权限');
            }
        }
    }

    public function check_login()
    {
        //判断用户是否登录，不登录，不让看后台
        if(Session::has('admin')){
            return true;
        }else{
            return false;
        }
    }

}