<?php
namespace app\home\model;
use think\Model;

class HBanner extends Model{
    protected $table = 'bk_banner';
    //返回图片组
    public static function arrImg($arr)
    {
        if(is_object($arr)){
            $arr->pic_img = explode('@@',$arr->pic_img);
        }else{
            $arr['pic_img'] = explode('@@',$arr['pic_img']);
        }
        return $arr;
    }
}