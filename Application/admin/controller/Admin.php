<?php
namespace app\admin\controller;

use app\admin\model\Role;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Admin extends Base
{
    //管理员列表
    public function adminlist(){
        if(input('post.')){
            $start=input('start');
            $end=input('end');
            $name=input('username');
            $admins=Db::table('bk_admin')->where('name','like',"{$name}%")
                ->whereTime('created_time','between',[$start,$end])
                ->select();
            $num=Db::table('bk_admin')->where('name','like',"{$name}%")
                ->whereTime('created_time','between',[$start,$end])
                ->count();
            $page=Db::table('bk_admin')->paginate(20);
            $adminss=Db::table('bk_admin')
                ->alias('a')
                ->join('bk_admin_role ar','ar.user_id=a.id')
                ->join('bk_role r','r.id=ar.role_id')
                ->select();
            foreach ($admins as $k=>$v){
                foreach($adminss as $kk=>$vv){
                    if($vv['user_id']==$v['id']){
                        $admins[$k]['role_name'][]=$vv['name'];
                    }
                }
            }
            return view('adminlist',['data'=>$admins,'num'=>$num,'page'=>$page]);
        }else{
            $num=Db::table('bk_admin')->count();
            $page=Db::table('bk_admin')->paginate(10);
            $admins=Db::table('bk_admin')->select();
            $adminss=Db::table('bk_admin')
                ->alias('a')
                ->join('bk_admin_role ar','ar.user_id=a.id')
                ->join('bk_role r','r.id=ar.role_id')
                ->select();
            foreach ($admins as $k=>$v){
                foreach($adminss as $kk=>$vv){
                    if($vv['user_id']==$v['id']){
                        $admins[$k]['role_name'][]=$vv['name'];
                    }
                }
            }

            return view('adminlist',['data'=>$admins,'num'=>$num,'page'=>$page]);
        }


    }

    //添加管理员
    public function adminadd()
    {
        if (input('post.')) {
            $data['name']=input('name');
            $data['email']=input('email');
            $data['created_time'] = time();
            $data['password'] = md5(input('pass'));
            $res = Db::name('bk_admin')->strict(true)->insertGetId($data);
            if ($id = $res){
                $ids = Request::instance()->post('ids/a');
                $sj=[];
                foreach ($ids as $k=>$v) {
                    $sj[$k]['user_id'] = $id;
                    $sj[$k]['role_id'] = $v;
                    $sj[$k]['created_time'] = time();
                }
                $res=Db::table('bk_admin_role')->insertAll($sj);
                if($res){
                    $arr['stat']=1;
                    $arr['msg']='添加成功';
                    return $arr;
                }else{
                    $arr['stat']=0;
                    $arr['msg']='添加失败';
                    return $arr;
                }
            }
        }else{
            $data = Db::table('bk_role')->select();
            return view('adminadd', ['data' => $data]);
        }
    }


    //管理员编辑
//    public function adminedit(){
//        $id=input('get.id');
//        if(input('post.')){
//            $data['id']=input('aid');
//            $data['name']=input('name');
//            $data['email']=input('email');
//            $data['updated_time'] = time();
//            $data['password'] = md5(input('pass'));
//            $res=Db::table('bk_admin')->update($data);
//            if($res) {
//                $ids = Request::instance()->post('ids/a');
//                $user_role_ids = Db::table('bk_admin_role')->where('user_id',$data['id'])->column('role_id');
//                $diffids = array_diff($user_role_ids,$ids);
//                if($diffids) {
//                    Db::table('bk_admin_role')->where('user_id', $data['id'])->where('role_id', 'in', $diffids)->delete();
//                }
//                $diffrentids = array_diff($ids, $user_role_ids);
//                $sj = [];
//                if($diffrentids){
//                    foreach($diffrentids as $k=>$v){
//                        $sj[$k]['role_id'] = $v;
//                        $sj[$k]['user_id'] = $data['id'];
//                    }
//                }
//                $res = Db::table('bk_admin_role')->insertAll($sj);
//            }
//        }else{
//            $data = Db::table('bk_role')->select();
//            $datas = Db::table('bk_admin')->where('id',$id)->find();
//            return view('adminedit',['data' => $data,'datas'=>$datas]);
//        }
//    }

    public function adminedit(){
        $id=input('get.id');
        if(input('post.')){
            $data['id']=input('aid');
            $data['name']=input('name');
            $data['email']=input('email');
            $data['updated_time'] = time();
            $data['password'] = md5(input('pass'));
            $res=Db::table('bk_admin')->update($data);
            if($res) {
                Db::table('bk_admin_role')->where('user_id',$data['id'])->delete();
                $ids = Request::instance()->post('ids/a');
                $sj = [];
                foreach ($ids as $k=>$v) {
                    $sj[$k]['user_id'] = $data['id'];
                    $sj[$k]['role_id'] = $v;
                    $sj[$k]['updated_time'] = time();
                }
                $res=Db::table('bk_admin_role')->insertAll($sj);
                if($res){
                    $arr['stat']=1;
                    $arr['msg']='修改成功';
                    return $arr;
                }else{
                    $arr['stat']=0;
                    $arr['msg']='修改失败';
                    return $arr;
                }
            }
        }else{
            $data = Db::table('bk_role')->select();
            $datas = Db::table('bk_admin')->where('id',$id)->find();
            $ids=Db::table('bk_admin_role')->where('user_id',$id)->column('role_id');
            return view('adminedit',['data' => $data,'datas'=>$datas,'role_ids'=>$ids]);
        }
    }

    //管理员启用禁用
    public function aonoff(){
        $id=input('rid');
        $act=input('act');
        $mes['id']=$id;
        $mes['sta']=0;
        $mes['stat']=1;
        switch ($act){
            case 1:
                $res=Db::table('bk_admin')->where('id',$id)->update(['status'=>$mes['sta']]);
                if($res){
                    return $mes;
                }else{
                    return $mes;
                }
                break;
            case 0:
                $res=Db::table('bk_admin')->where('id',$id)->update(['status'=>$mes['stat']]);
                if($res){
                    return $mes;
                }else{
                    return $mes;
                }
                break;
        }
    }

    //管理员删除
    public function addel(){
        $id=input('userid');
        $res=Db::table('bk_admin')->delete($id);
        Db::table('bk_admin_role')->where('user_id',$id)->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //管理员批量删除
    public function adalldel(){
        $ids=Request::instance()->post('ids/a');
        $res=Db::table('bk_admin')->delete($ids);
        Db::table('bk_admin_role')->where('user_id','in',$ids)->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //角色列表
    public function rolelist(){
        $num=Db::table('bk_role')->count();
        $data=Db::table('bk_role')->paginate(10);
        $rdata=Db::table('bk_role')->select();
        $rdatas=Db::table('bk_role')
            ->alias('r')
            ->join('bk_role_access ra','ra.role_id=r.id')
            ->join('bk_access a','a.id=ra.access_id')
            ->select();
        foreach ($rdata as $k=>$v){
            foreach($rdatas as $kk=>$vv){
                if($vv['role_id']==$v['id']){
                    $rdata[$k]['urls'][]=$vv['urls'];
                }
            }
        }
        return view('adminrole',['data'=>$data,'num'=>$num,'rdata'=>$rdata]);
    }

    //角色删除
    public function roledel(){
        $id=input('userid');
        $res=Db::table('bk_role')->delete($id);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //批量删除
    public function alldel(){
        $ids=Request::instance()->post('ids/a');
        $res=Db::table('bk_role')->delete($ids);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //角色启用禁用
    public function onoff(){
        $id=input('rid');
        $act=input('act');
        $mes['id']=$id;
        $mes['sta']=0;
        $mes['stat']=1;
        switch ($act){
            case 1:
                $res=Db::table('bk_role')->where('id',$id)->update(['status'=>$mes['sta']]);
                if($res){
                    return $mes['stat'];
                }else{
                    return $mes['sta'];
                }
                break;
            case 0:
                $res=Db::table('bk_role')->where('id',$id)->update(['status'=>$mes['stat']]);
                if($res){
                    return $mes['stat'];
                }else{
                    return $mes['sta'];
                }
                break;
        }
    }

    //添加角色
    public function roleadd(){
        if(input('post.')){
            $data['name']=input('name');
            $data['content']=input('content');
            $data['created_time']=time();
            $res=Db::table('bk_role')->insertGetId($data);
            if ($id = $res){
                $ids = Request::instance()->post('aid/a');
                $sj=[];
                foreach ($ids as $k=>$v) {
                    $sj[$k]['role_id'] = $id;
                    $sj[$k]['access_id'] = $v;
                    $sj[$k]['created_time'] = time();
                }
                $res=Db::table('bk_role_access')->insertAll($sj);
                if($res){
                    $arr['stat']=1;
                    $arr['msg']='添加成功';
                    return $arr;
                }else{
                    $arr['stat']=0;
                    $arr['msg']='添加失败';
                    return $arr;
                }
            }
        }else{
            $data=Db::table('bk_access')->select();
            return view('roleadd',['data'=>$data]);
        }
    }

    public function have(){
        $name=input('name');
        $have=Db::table('bk_role')->where('name',$name)->find();
        if($have){
            return 1;
        }else{
            return 0;
        }
    }

    //编辑角色
    public function roleedit(){
        $id=input('get.id');
        if(input('post.')){
            $data['id']=input('rid');
            $data['name']=input('name');
            $data['content']=input('content');
            $data['updated_time'] = time();
            $res=Db::table('bk_role')->update($data);
            if($res) {
                Db::table('bk_role_access')->where('role_id',$data['id'])->delete();
                $ids = Request::instance()->post('aid/a');
                $sj=[];
                foreach ($ids as $k=>$v) {
                    $sj[$k]['role_id'] = $data['id'];
                    $sj[$k]['access_id'] = $v;
                    $sj[$k]['updated_time'] = time();
                }
                $res=Db::table('bk_role_access')->insertAll($sj);
                if($res){
                    $arr['stat']=1;
                    $arr['msg']='修改成功';
                    return $arr;
                }else{
                    $arr['stat']=0;
                    $arr['msg']='修改失败';
                    return $arr;
                }
            }
        }else{
            $data = Db::table('bk_role')->where('id',$id)->find();
            $datas=Db::table('bk_access')->select();
            $access_ids=Db::table('bk_role_access')->where('role_id',$id)->column('access_id');
            return view('roleedit',['data' => $data,'datas'=>$datas,'access_ids'=>$access_ids]);
        }
    }


    //权限列表
    public function rulelist(){
        if(input('post.')){
            $data['urls']=input('cateid')."/".input('controller')."/".input('action');
            $data['title']=input('title');
            $data['created_time']=time();
            $res=Db::table('bk_access')->insert($data);
            if($res){
                $mess['sta']=1;
                $mess['msg']='添加成功';
                return $mess;
            }else{
                $mess['sta']=0;
                $mess['msg']='添加失败';
                return $mess;
            }
        }else{
            $num=Db::table('bk_access')->count();
            $data=Db::table('bk_access')->paginate(5,$num);
            return view('rulelist',['data'=>$data,'num'=>$num]);
        }
    }


    //权限删除
    public function ruledel(){
        $id=input('userid');
        $res=Db::table('bk_access')->delete($id);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    //权限批量删除
    public function ralldel(){
        $ids=Request::instance()->post('ids/a');
        $res=Db::table('bk_access')->delete($ids);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function info(){
        $admin = Session::get('admin');
        $id=$admin['id'];
        if(input('post.')){
            $data['id']=input('aid');
            $data['name']=input('name');
            $data['email']=input('email');
            $data['updated_time'] = time();
            $data['password'] = md5(input('pass'));
            $res=Db::table('bk_admin')->update($data);
            if($res) {
                Db::table('bk_admin_role')->where('user_id',$data['id'])->delete();
                $ids = Request::instance()->post('ids/a');
                $sj = [];
                foreach ($ids as $k=>$v) {
                    $sj[$k]['user_id'] = $data['id'];
                    $sj[$k]['role_id'] = $v;
                    $sj[$k]['updated_time'] = time();
                }
                $res=Db::table('bk_admin_role')->insertAll($sj);
                if($res){
                    $arr['stat']=1;
                    $arr['msg']='修改成功';
                    return $arr;
                }else{
                    $arr['stat']=0;
                    $arr['msg']='修改失败';
                    return $arr;
                }
            }
        }else{
            $data = Db::table('bk_role')->select();
            $datas = Db::table('bk_admin')->where('id',$id)->find();
            $ids=Db::table('bk_admin_role')->where('user_id',$id)->column('role_id');
            return view('adminedit',['data' => $data,'datas'=>$datas,'role_ids'=>$ids]);
        }
    }

}