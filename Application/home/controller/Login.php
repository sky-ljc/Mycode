<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{
    //登陆
    public function login()
    {
        //获取数据,并与数据库进行判断
        if (input('post.')){
            $input = input('post.');
            $bool = Db::table('bk_users')->where('email',$input['email'])->find();
            if ($bool){
                //邮箱正确，验证密码
                $pass = $bool['pass'];
                $pass2 = md5($input['pass']);
                if ($pass==$pass2){
                    //全部正确，讲将数据存入session并跳转
                    $info = ['id'=>$bool['id'],'name'=>$bool['username']];
                    Session::set('user',$info);
                    //进行跳转
                    return redirect('Index/index');
                }else{
                    //密码错误。返回并提示
                    _callBack('密码不正确！');
                }
            }else{
                //邮箱错误，返回并提示
                _callBack('该邮箱不存在！');
            }

        }else{
            return view();
        }

    }




    //注册
    public function lwre()
    {
        //判断是否点击注册
        if (input('post.')){
            //获取数据，判断数据是否存在，存入数据库
            $input = input('post.');
            $bool = Db::table('bk_users')->where('email',$input['email'])->find();
            if ($bool){
                //数据重复
                _callBack('该邮箱已注册！');
            }else{
                //可以进行添加
                $input['pass']=md5($input['pass']);
                $id = Db::table('bk_users')->insertGetId($input);
                if ($id){
                    //添加成功，数据存入session并跳回主页
                    $info = ['id'=>$id,'name'=>$input['username']];
                    Session::set('user',$info);
                    return redirect('Index/index');
                }else{
                    //添加失败，提示并返回
                    _callBack('注册失败！');
                }
            }
        }else{
            return view();
        }


    }




}