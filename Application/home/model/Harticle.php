<?php
namespace app\home\model;
use think\Model;

class Harticle extends Model{
    protected $table = 'bk_tag';
    //获取截取的文字
    public static function subText($arr)
    {
        if(is_object($arr)){
            foreach ($arr as $k=>$v){
                $v->tag_content = mb_substr($v->tag_content,0,20);
            }
        }else{
            foreach ($arr as $k=>$v){
                $arr[$k]['tag_content'] = mb_substr($v['tag_content'],0,20);
            }
        }
        return $arr;
    }
}