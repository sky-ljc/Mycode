<?php
namespace app\admin\model;
use think\Model;

class BannerModel extends Model{
    protected $table = 'bk_banner';
    protected $createTime = 'created_time';
    protected $updateTime = 'updated_time';
    //获取一张图片
    public static function oneImg($arr)
    {
        foreach ($arr as $k=>$v){
            $v->pic_img = explode('@@',$v->pic_img)[0];
        }
        return $arr;
    }
}