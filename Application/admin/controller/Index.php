<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;

class Index extends Base{
    public function index(Request $request)
    {
        $data=Session::get('admin');
//        dump($data);
//        die();
        if($data){
            return view('index',['data'=>$data]);
        }else{
            return redirect(url('Login/index'));
        }
    }

    public function welcome(){
        $data['ip']=$this->request->ip();
        $data['server']=$_SERVER;
        $data['server']['jm']=gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data['file']=__FILE__;
        $data['os']=PHP_OS;
        $data['base']=basename(dirname(__FILE__));
        $data['time']=time();
        $today=date("Y-m-d H:i:s",strtotime('today'));
        $tomorrow=date("Y-m-d H:i:s",strtotime('tomorrow'));
        $yesterday=date("Y-m-d H:i:s",strtotime('yesterday'));
        $weekstart=date("Y-m-d H:i:s",strtotime('this week Monday'));
        $weekend=date("Y-m-d H:i:s",strtotime('this week Sunday'));
        $monthstart=date("Y-m-d H:i:s",mktime(0, 0, 0, date('m'), 1, date('Y')));
        $monthend=date("Y-m-d H:i:s",mktime(23, 59, 59, date('m'), date('t'), date('Y')));
        $num['admin']['today']=Db::table('bk_admin')
            ->whereTime('created_time','between',[$today,$tomorrow])
            ->count();
        $num['admin']['yesterday']=Db::table('bk_admin')
            ->whereTime('created_time','between',[$yesterday,$today])
            ->count();
        $num['admin']['thisweek']=Db::table('bk_admin')
            ->whereTime('created_time','between',[$weekstart,$weekend])
            ->count();
        $num['admin']['thismonth']=Db::table('bk_admin')
            ->whereTime('created_time','between',[$monthstart,$monthend])
            ->count();
        $num['admin']['total']=Db::table('bk_admin')->count();

        $num['user']['today']=Db::table('bk_users')
            ->whereTime('created_at','between',[$today,$tomorrow])
            ->count();
        $num['user']['yesterday']=Db::table('bk_users')
            ->whereTime('created_at','between',[$yesterday,$today])
            ->count();
        $num['user']['thisweek']=Db::table('bk_users')
            ->whereTime('created_at','between',[$weekstart,$weekend])
            ->count();
        $num['user']['thismonth']=Db::table('bk_users')
            ->whereTime('created_at','between',[$monthstart,$monthend])
            ->count();
        $num['user']['total']=Db::table('bk_users')->count();

        $num['tag']['today']=Db::table('bk_tag')
            ->whereTime('tag_addtime','between',[$today,$tomorrow])
            ->count();
        $num['tag']['yesterday']=Db::table('bk_tag')
            ->whereTime('tag_addtime','between',[$yesterday,$today])
            ->count();
        $num['tag']['thisweek']=Db::table('bk_tag')
            ->whereTime('tag_addtime','between',[$weekstart,$weekend])
            ->count();
        $num['tag']['thismonth']=Db::table('bk_tag')
            ->whereTime('tag_addtime','between',[$monthstart,$monthend])
            ->count();
        $num['tag']['total']=Db::table('bk_tag')->count();

        return view('welcome',['data'=>$data,'num'=>$num]);
    }
    //柱状图
    public function graph()
    {
        return view('echart/graph');
    }
    //make 柱状图
    public function makeGraph()
    {
        //获取所有的一级栏目
       // $columns = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->select();
       // $ids = array_column($columns,'id');
       //$ids = implode(',',$ids);
       // dump($ids);
        //dump($ids);
        //获取点击量
       // $clickNum = Db::table('bk_tag')->field('id,tag_title,tag_click,num("tag_column")')->group('tag_column')->select();
        //dump($clickNum);
       //$sql = "select t.id,t.tag_title,sum(t.tag_click),c.cat_name from bk_tag as t left join bk_category as c where t.tag_column=c.id group by t.tag_column";
       // $sql = "select id,tag_title,sum(tag_click) from bk_tag where tag_column in('.$ids.') group by tag_column";
        $res = Db::table('bk_tag')->alias('t')
                ->join('bk_category','t.tag_column=bk_category.id')
                ->field('t.id,sum(t.tag_click) as click,bk_category.cat_name')
                //->whereTime('t.tag_addtime','w')
                ->group('t.tag_column')
                ->select();
        if($res){
            $data['status'] = 2000;
            $data['column'] = array_column($res,'cat_name');
            $data['click'] = array_column($res,'click');
        }else{
            $data['status'] = 5000;
        }
        //dump($data);
        return json($data);
    }

}