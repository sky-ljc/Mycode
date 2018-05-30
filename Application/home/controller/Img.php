<?php
namespace app\home\controller;
use app\home\model\Imgs;
use think\Controller;
use think\Db;

class Img extends Controller
{
 public function img(){
    $data=Db::table('bk_banner')->field('id,pic_name,pic_img')->select();
    foreach($data as $k=>$v){
        $v['pic_img']=explode('@@',$v['pic_img']);
        $data[$k]['pic_img']=$v['pic_img'];
    }
//     dump($data);
//     exit;
     return view('img',['data'=>$data]);
 }
}