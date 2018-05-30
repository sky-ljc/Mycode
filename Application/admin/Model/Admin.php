<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model{
    protected $table = 'bk_admin';
    // 定义时间戳字段名
    protected  $autoWriteTimestamp = true;
    protected $createTime = 'created_time';
    protected $updateTime = 'updated_time';
}