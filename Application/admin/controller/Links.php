<?php
namespace app\admin\controller;
use app\admin\model\LinkModel;
use think\Db;
use think\Request;

class Links extends Base
{
   public function index(Request $request)
   {
       if($request->isPost()){
           $link_name = input('link_name');
           $where['link_name'] = ['like',"%{$link_name}%"];
           $data = Db::table('bk_links')->where($where)->order('created_time')->paginate(5);
           return view('links/index',['data'=>$data]);
       }else{
           $data = Db::table('bk_links')->order('created_time')->paginate(5);
           return view('links/index',['data'=>$data]);
       }
   }
   public function add(Request $request)
   {
       if($request->isPost()){
           $input = $request->param();
           $res = LinkModel::create($input);
           if($res){
               _alert('Links/index','添加成功！');
           }else{
               _alert('Links/index','添加失败！');
           }
       }else{
           return view('links/add');
       }
   }
   public function update()
   {
       $id = input('id');
       if($id){
           $link = LinkModel::get($id);
           if($link){
              return view('Links/update',['link'=>$link]);
           }else{
               _alert('Links/index','未找到此链接!');
           }
       }else{
           easyBack();
       }
   }
   public function doupdate()
   {
       $input = input('post.');
       $link = LinkModel::get($input['id']);
       $res = $link->save($input);
       if($res){
           _alert('Links/index','修改成功!');
       }else{
           _alert('Links/index','修改失败!');
       }
   }
    //屏蔽
    public function hidden()
    {
        $id = input('post.id');
        $bool = Db::table('bk_links')->where('id',$id)->update(['link_status'=>0]);
        if($bool){
            $res = ['error'=>1,'mess'=>'已屏蔽!'];
        }else{
            $res = ['error'=>0,'mess'=>'屏蔽失败!'];
        }
        return json($res);
    }
    //展示
    public function active()
    {
        $id = input('post.id');
        $bool = Db::table('bk_links')->where('id',$id)->update(['link_status'=>1]);
        if($bool){
            $res = ['error'=>1,'mess'=>'已展示!'];
        }else{
            $res = ['error'=>0,'mess'=>'展示失败!'];
        }
        return json($res);
    }
    public function oneDel()
    {
        $id = input('id');
        if($id){
            $bool = Db::table('bk_links')->delete($id);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
            return json($res);
        }else{
            easyBack();
        }
    }
    public function dataDel()
    {
        $ids = input('post.ids/a');
        if($ids){
            $bool = LinkModel::destroy($ids);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
        }else{
            $res = ['error'=>2,'mess'=>'请选择需要删除的链接!'];
        }
        return $res;
    }
}