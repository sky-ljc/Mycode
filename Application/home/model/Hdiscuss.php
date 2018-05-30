<?php
namespace app\home\model;
use think\Model;

class Hdiscuss extends Model
{
    protected $table = 'bk_discuss';
    // 定义时间戳字段名
    protected  $autoWriteTimestamp = true;
    protected $createTime = 'created_time';
    protected $updateTime = 'updated_time';
}