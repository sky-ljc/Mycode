<?php
namespace app\admin\controller;
use app\admin\model\Users;
use think\Db;
use think\Request;
use think\Loader;
class User
{
//    会员展示页面
   public function show(Request $request){
       if($request->isPost()){
           $start=input('start');
           $end=input('end');
           $where = [];
           if(input('?username')){
               $dis_content = input('username');
               $where['username'] = ['like',"%{$dis_content}%"];
           }
           if($start!='' || $end!=''){
               $where['created_at'] = ['>',$start];
               $where['created_at'] = ['<',$end];
           }
           $use=new Users();
           $data= $use->where($where)->paginate(10);
           $cont=$use->where($where)->count();
           $state=['1'=>'已启用','0'=>'已停用'];
           return view('show',['data'=>$data,'cont'=>$cont,'state'=>$state]);
       }else{
           $use=new Users();
           $data= $use->paginate(10);
           $cont=$use->count();
           $state=['1'=>'已启用','0'=>'已停用'];
           return view('show',['data'=>$data,'cont'=>$cont,'state'=>$state]);
       }
   }
//   状态启用禁用
    public function state(){
        $input = input('get.');
        $res = array();
        if($input){
            if($input['sta']==0){
                //进行启用
                $banner = Users::get($input['id']);
                $banner->state=1;
                $bool = $banner->save();
                if($bool){
                    $res = ['error'=>1,'id'=>$input['id'],'sta'=>1];
                }else{
                    $res = ['error'=>0,'id'=>$input['id'],'sta'=>0];
                }
            }elseif($input['sta']==1){
                //进行停用
                $banner = Users::get($input['id']);
                $banner->state=0;
                $bool = $banner->save();
                if($bool){
                    $res = ['error'=>1,'id'=>$input['id'],'sta'=>0];
                }else{
                    $res = ['error'=>0,'id'=>$input['id'],'sta'=>1];
                }
            }
        }else{
            $res = ['error'=>0,'id'=>$input['id'],'sta'=>$input['sta']];
        }
        return json($res);
    }



//   会员添加页面
   public function add(){
       if(Request::instance()->isPost()){
           $arr=input('post.');
           if(!empty($arr)){
               $data=[
                   'username'=>input('username'),
                   'pass'=>input('pass'),
                   'sex'=>input('sex'),
                   'address'=>input('address'),
                   'phone'=>input('phone'),
                   'email'=>input('email'),
                   'created_at'=>time()
               ];
            $validate=Loader::validate('Cate');
               if($validate->check($data)){
                    if(Db('bk_users')->insert($data)){
                       return redirect('User/show');
                    }else{
                        _callBack('添加失败!');
                    }
               }else{
                   _callBack('数据有误，添加失败!');
               }

           }


       }else{
           return view('add');
       }

   }
//   会员编辑
   public function edit(){
       if(Request::instance()->isPost()){


       }elseif(Request::instance()->isGet()) {
           $id=input('id');
           $use=new Users();
           $arr=$use->select($id);
           return view('edit',['arr'=>$arr]);
       }
   }
//   会员修改密码
    public function pwd(){
       if(Request::instance()->isPost()){

       }else{
           return view('pwd');
       }
    }
//    会员删除
    public function del(){
       $input=input('post.');
       $id=Users::get($input['id']);
       $bol=$id->delete();
       if($bol){
            $res=['mage'=>1];
       }
        return json($res);
    }
//    会员批量删除
    public function delall(){
        $res = [];
       if(Request::instance()->isPost()){
           $input=input('data/a');
          if($input){
              $bool = Users::destroy($input);
              if($bool){
                  $res=['message'=>1];
              }else{
                  $res=['message'=>0];
              }
          }else{
              $res=['message'=>2];
          }
       }else{
           $res=['message'=>0];
       }
       return json($res);
    }



}
