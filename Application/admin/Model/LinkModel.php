<?php
namespace app\admin\model;
use think\Model;

class LinkModel extends Model
{
    protected $table = 'bk_links';
    protected  $autoWriteTimestamp = true;
    protected $createTime = 'created_time';
    protected $updateTime = 'updated_time';
}