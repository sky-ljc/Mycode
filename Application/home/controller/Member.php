<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;

class Member extends Controller
{
    public function member(){
        $user=Session::get('user');
        $id=$user['id'];
        if($id){
            $data=Db::table('bk_users')->where('id',$id)->find();
            $datas=Db::table('bk_tag')->where('tag_uid',$id)->paginate(5);
            $pldatas=Db::table('bk_discuss')
                ->alias('d')
                ->join('bk_tag t','t.id=d.artid')
                ->where('uid',$id)
                ->select();
            $count=count($pldatas);
            return view('member',['data'=>$data,'datas'=>$datas,'pldatas'=>$pldatas,'count'=>$count]);
        }else{
           return view('Login/login');
        }

    }

    //个人信息修改
    public function edit(){
        if($user=Session::get('user')){
            $id=$user['id'];
        }else{
           $id=input('id');
        }
        $data=Db::table('bk_users')->where('id',$id)->find();
        return view('edit',['data'=>$data]);
    }


//个人信息修改
    public function doedit(){
        $user=Session::get('user');
        $id=$user['id'];
        if(input('post.')){
             $data=input('post.');
             $file = request()->file('member_photo');
             $data['pass']=md5(input('pass'));
             if($file){
                 $info=$file->move(ROOT_PATH.'public'.DS.'user');
                 $data['member_photo']=$info->getSaveName();
             }
             $res=Db::table('bk_users')->where('id',$id)->strict(false)->update($data);
             if($res){
                 _msg('Member/member','修改成功！');
             }else{
                 _callBack('修改失败!');
             }
        }else{
            $data=Db::table('bk_users')->where('id',$id)->find();
            return view('edit',['data'=>$data]);
        }

    }


    //添加文章
    public function addtag()
    {
        $tag_uid = Session::get('user')['id'];

        //判断提交方式，并获取数据
        if (input('post.')){
            //获取数据
            $input = input('post.');
            $input['tag_addtime'] = time();
            $input['tag_uid'] = $tag_uid;
            $input['tag_img'] = request()->file('tag_img');
            if ($input['tag_img']){
                $info = $input['tag_img']->move(ROOT_PATH . 'public' .DS.'article');
//                return $info;
                $input['tag_img'] = $info->getSaveName();
//                dump($info);
//                die();
                //添加数据库
                $bool = Db::table('bk_tag')->insert($input);
                if($bool){
                    _alert('Member/member','添加成功！');
                }else{
                    _callBack('添加失败!');
                }
//                dump($input);
            }else{
                $input['tag_img'] = 'moren.jpg';
                //添加数据库
                $bool = Db::table('bk_tag')->insert($input);
                if($bool){
                    _alert('Member/member','添加成功！');
                }else{
                    _callBack('添加失败!');
                }
            }

        }else{
            $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
            $cates = Categorys::subtree($data);
            return view('add',['cates'=>$cates]);

        }
    }
}