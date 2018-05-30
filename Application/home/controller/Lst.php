<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Lst extends Controller
{
    //列表
    public function lst(){
        //获取需要展示的栏目的id
        $id = input('id');
        //展示列表
        if ($id){
            $data = Db::table('bk_tag')->where('tag_column',$id)->where('tag_status',1)->paginate(3);
            $num = Db::table('bk_tag')->where('tag_column',$id)->where('tag_status',1)->count();
            //判断能否查询到数据
            if($data){
                //跳转列表页并携带数据
                $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
                return view('lst',['column'=>$column,'data'=>$data,'num'=>$num]);
            }else{
                //获取栏目信息
                $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
                return view('lst',['column'=>$column]);
            }
        }else{
            //获取栏目信息
            $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
            return view('lst',['column'=>$column]);
        }

    }

}