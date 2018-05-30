<?php
namespace app\admin\validate;
use think\Validate;

class Cate extends Validate
{
    protected  $rule=[
        'username'=>'require|min:2|max:8',
        'sex'=>'require',
        'pass'=>'require|min:5|max:16',
        'phone'=>'require',
        'address'=>'require',
        'email'=>'require'
    ];
    protected  $message=[
        'username.require'=>'请填写您的姓名',
        'username.min'=>'用户名最少填写两个字',
        'username.max'=>'用户名最多填写八个字',
        'sex.require'=>'性别必须填写',
        'pass.require'=>'密码必须填写',
        'pass.min'=>'密码最少6位',
        'pass.max'=>'密码最多16位',
        'phone.require'=>'手机号必填',
        'address'=>'地址必填',
        'emial'=>'邮箱必填'
    ];
}