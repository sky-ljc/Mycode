<?php
namespace app\admin\controller;
use app\admin\model\DiscussModel;
use think\Db;
use think\Request;
use think\Session;

class Adiscuss extends Base
{
    public function index(Request $request)
    {
        if($request->isPost()){
            $start=input('start');
            $end=input('end');
            $where = [];
            $cwhere = [];
            if(input('?dis_content')){
                $dis_content = input('dis_content');
                $where['d.dis_content'] = ['like',"%{$dis_content}%"];
                $cwhere['dis_content'] = ['like',"%{$dis_content}%"];
            }
            if($start!='' || $end!=''){
                $where['d.created_time'] = ['>',$start];
                $cwhere['created_time'] =  ['>',$start];
                $where['d.created_time'] = ['<',$end];
                $cwhere['created_time'] =  ['<',$end];
            }
            $arr = Db::table('bk_discuss')->alias('d')
                ->join('bk_users','d.uid=bk_users.id')
                ->join('bk_tag','d.artid=bk_tag.id')
                ->field('d.*,d.did as id,bk_users.username,bk_tag.tag_title')->where($where)->order('created_time')->paginate(5);
            $num = Db::table('bk_discuss')->where($cwhere)->count();
            return view('discuss/lst',['arr'=>$arr,'num'=>$num]);
        }else{
            $arr = Db::table('bk_discuss')->alias('d')
                ->join('bk_users','d.uid=bk_users.id')
                ->join('bk_tag','d.artid=bk_tag.id')
                ->field('d.*,d.did as id,bk_users.username,bk_tag.tag_title')->order('created_time')->paginate(5);
            if(session('?disnum')){
                $num = session('disnum');
            }else{
                $num = Db::table('bk_discuss')->count();
                session('disnum',$num);
            }
            return view('discuss/lst',['arr'=>$arr,'num'=>$num]);
        }
    }
    //屏蔽
    public function hidden()
    {
        $id = input('post.id');
        $bool = Db::table('bk_discuss')->where('did',$id)->update(['dis_status'=>0]);
        if($bool){
            $res = ['error'=>1,'mess'=>'已屏蔽!'];
        }else{
            $res = ['error'=>0,'mess'=>'屏蔽失败!'];
        }
        return json($res);
    }
    //展示
    public function active()
    {
        $id = input('post.id');
        $bool = Db::table('bk_discuss')->where('did',$id)->update(['dis_status'=>1]);
        if($bool){
            $res = ['error'=>1,'mess'=>'已展示!'];
        }else{
            $res = ['error'=>0,'mess'=>'展示失败!'];
        }
        return json($res);
    }
    public function oneDel()
    {
        $id = input('id');
        if($id){
            $bool = Db::table('bk_discuss')->delete($id);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
            return json($res);
        }else{
            easyBack();
        }
    }
    public function dataDel()
    {
        $ids = input('post.ids/a');
        if($ids){
            $bool = DiscussModel::destroy($ids);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
        }else{
            $res = ['error'=>2,'mess'=>'请选择需要删除的留言!'];
        }
        return $res;
    }
    public function reply()
    {
        $id = input('id');
        if($id){
            $arr = Db::table('bk_reply')->alias('d')
                ->join('bk_users','d.user_id=bk_users.id')
                ->join('bk_tag','d.aid=bk_tag.id')
                ->field('d.*,bk_users.username,bk_tag.tag_title')->order('d.rid')
                ->where('pid',$id)
                ->select();
            if(session('?replynum')){
                $num = session('replynum');
            }else{
                $num = Db::table('bk_reply')->where('pid',$id)->count();
                session('replynum',$num);
            }
            return view('discuss/reply',['num'=>$num,'arr'=>$arr]);
        }else{
            easyBack();
        }
    }
    public function repdelone()
    {
        $id = input('id');
        if($id){
            $bool = Db::table('bk_reply')->delete($id);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
            return json($res);
        }else{
            easyBack();
        }
    }
    public function repdatedel()
    {
        $ids = input('post.ids/a');
        if($ids){
            $bool = Db::table('bk_reply')->delete($ids);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
        }else{
            $res = ['error'=>2,'mess'=>'请选择需要删除的回复!'];
        }
        return $res;
    }
}