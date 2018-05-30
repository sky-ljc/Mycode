<?php
namespace app\admin\model;
use think\Model;

class Users extends Model{
    protected $table = 'bk_users';
    // 定义时间戳字段名
    protected  $autoWriteTimestamp = true;
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    public function getSexAttr($val){
        switch ($val){
            case 0:
                return '女';
                break;
            case 1:
                return '男';
                break;
            default:
                return '未知';
                break;
        }
    }
}