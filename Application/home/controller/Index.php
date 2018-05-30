<?php
namespace app\home\controller;
use app\admin\model\BannerModel;
use app\home\model\Harticle;
use app\home\model\HBanner;
use app\home\model\Hdiscuss;
use app\home\model\Hreply;
use think\cache\driver\Redis;
use think\Controller;
use think\Db;
use think\Session;
use think\Validate;

class Index extends Controller
{
    //主页
    public function index()
    {
        //获取banner图
        $banner = new BannerModel();
        $banners = $banner->where(['is_banner'=>1,'bstatus'=>1])->field('id,pic_img')->order('created_time','desc')->find()->toArray();
        $banners = HBanner::arrImg($banners);
        $num = count($banners['pic_img']);
        //获取火热文章
        $hotart = Db::table('bk_tag')->field('id,tag_title,tag_content,tag_addtime')->order('tag_click','desc')->limit($num)->select();
        if($hotart){
           $hotart = Harticle::subText($hotart);
        }
        //获取单个文章信息
        $article = Db::table('bk_tag')->alias('t')
                    ->join('bk_users','t.tag_uid=bk_users.id')->field('t.id,t.tag_title,t.tag_content,t.tag_addtime,t.tag_img,bk_users.username')->find();
        //获取栏目信息
        $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
        //获取一天内的火热文章
        $hotArticle = $this->getHotArt();
        //获取友情链接
        $links = Db::table('bk_links')->field('id,link_name,link_url')->where('link_status',1)->select();
        return view('index',['banners'=>$banners,'hotart'=>$hotart,'article'=>$article,'column'=>$column,'hotArticle'=>$hotArticle,'links'=>$links]);
    }
    //首页noslider
    public function noslider()
    {
        //获取所有的文章信息
//        //热词
//        if($keyword = input('keyword')){
//            $where['tag_title'] = ['like',"%{$keyword}%"];
//        }else{
//            $where = [];
//        }
//        $article = Db::table('bk_tag')->field('id,tag_title,tag_content,tag_addtime,tag_img')->where($where)->find();
        //获取栏目信息
        $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
        //获取一天内的火热文章
        $hotArticle = $this->getHotArt();
        //获取友情链接
        $links = Db::table('bk_links')->field('id,link_name,link_url')->where('link_status',1)->select();
        return view('index-noslider',['column'=>$column,'hotArticle'=>$hotArticle,'links'=>$links]);
    }
    //首页nosidebar
    public function nosidebar()
    {
        //获取banner图
        $banner = new BannerModel();
        $banners = $banner->where(['is_banner'=>1,'bstatus'=>1])->field('id,pic_img')->order('created_time','desc')->find()->toArray();
        $banners = HBanner::arrImg($banners);
        $num = count($banners['pic_img']);
        //获取火热文章
        $hotart = Db::table('bk_tag')->field('id,tag_title,tag_content,tag_addtime')->order('tag_click','desc')->limit($num)->select();
        if($hotart){
            $hotart = Harticle::subText($hotart);
        }
        //获取栏目信息
        $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
        //获取一天内的火热文章
        $hotArticle = $this->getHotArt();
        return view('index-nosidebar',['banners'=>$banners,'hotart'=>$hotart,'column'=>$column,'hotArticle'=>$hotArticle]);
    }
    //首页standard
    public function standard()
    {
        //获取banner图
        $banner = new BannerModel();
        $banners = $banner->where(['is_banner'=>1,'bstatus'=>1])->field('id,pic_img')->order('created_time','desc')->find()->toArray();
        $banners = HBanner::arrImg($banners);
        $num = count($banners['pic_img']);
        //获取火热文章
        $hotart = Db::table('bk_tag')->field('id,tag_title,tag_content,tag_addtime')->order('tag_click','desc')->limit($num)->select();
        if($hotart){
            $hotart = Harticle::subText($hotart);
        }
        //获取栏目信息
        $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
        //获取一天内的火热文章
        $hotArticle = $this->getHotArt();
        //获取友情链接
        $links = Db::table('bk_links')->field('id,link_name,link_url')->where('link_status',1)->select();
        return view('index-standard',['banners'=>$banners,'hotart'=>$hotart,'column'=>$column,'hotArticle'=>$hotArticle,'links'=>$links]);
    }
    public function article()
    {
        //获取文章信息
        //数据总数
        $total = Db::table('bk_tag')->field('id')->count();
        //每页展示条数
        $shownum = 10;
        //要显示的页数
        // $showPage = 5;
        //页数
        $pageNum = ceil($total/$shownum);
        //获取当前页
        if(input('?page')){
            $page = input('page');
        }else{
            $page = 1;
        }
        //热词
        if($keyword = input('keyword')){
            $where['t.tag_title'] = ['like',"%{$keyword}%"];
        }
        //limit的条件
        $startNum = ($page-1)*$shownum;
        $where['t.tag_status'] = 1;
        $data = Db::table('bk_tag')->alias('t')
                ->join('bk_users','t.tag_uid=bk_users.id')->order('tag_addtime','desc')
                ->field('t.*,bk_users.username')
                ->where($where)->limit($startNum,$shownum)->select();
        if($data){
            foreach ($data as $k=>$v){
                if(empty($v['tag_img'])){
                    $data[$k]['tag_img'] = 'moren.jpg';
                }
                $data[$k]['tag_content'] = mb_substr($v['tag_content'],0,60);
                $data[$k]['tag_addtime'] = date('Y/m/d',$v['tag_addtime']);
            }
        }
        //分页数据
        $res = array();
        if($data){
            $res = [
                'code'      => 2000,
                'total'     => $total,
                'data'      => $data,
                'pageNum'   => $pageNum,
                'page'      => $page,
                //'startPage' => $startPage,
               // 'endPage'   => $endPage
            ];
        }
        return json($res);
    }
    //文章详情页
    public function detail()
    {
        $id  = input('id');
        if($id){
            $article = Db::table('bk_tag')->alias('tag')->join('bk_users','tag.tag_uid=bk_users.id')->field('tag.*,bk_users.username')->where('tag.id',$id)->find();
            if($article){
                //获取栏目信息
                $column = Db::table('bk_category')->field('id,cat_name')->where('parent_id',0)->limit(4)->select();
                //获取评论信息
                $discuss = Db::table('bk_discuss')->alias('dis')->join('bk_users','bk_users.id=dis.uid')->where('dis.artid',$id)->field('dis.did,dis.uid,dis.dis_content,dis.child_num,dis.praise_num,dis.created_time,bk_users.username,bk_users.member_photo')->order('praise_num','desc')->select();
               //所有评论的id
                $pids = array_column($discuss,'did');
                foreach ($pids as $k=>$v) {
                    //二级评论信息
                    $repdata = Db::table('bk_reply')->alias('r')->join('bk_users','bk_users.id=r.user_id')->where('r.pid',$v)->where('r.aid',$id)->field('bk_users.username,r.rcontent,r.created_time,r.user_id')->select();
                    $discuss[$k]['reply'] = $repdata;
                    $discuss[$k]['num'] = count($repdata);
                    $discuss[$k]['created_time'] = date('Y-m-d',$discuss[$k]['created_time']);
                }
                //当前用户点赞信息
                if(Session::has('user')) {
                    $uid = Session::get('user')['id'];
                    $praise_id = Db::table('bk_praise')->where('user_id',$uid)->field('discuss_id')->select();
                    $praise_id = array_column($praise_id,'discuss_id');
                }else{
                    $praise_id = [];
                }
                //评论总数
                $disnum = count($discuss);
                //获取友情链接
                $links = Db::table('bk_links')->field('id,link_name,link_url')->where('link_status',1)->select();
                //获取一天内的火热文章
                $hotArticle = $this->getHotArt();
                return view('index/article',['article'=>$article,'column'=>$column,'disnum'=>$disnum,'discuss'=>$discuss,'praise_id'=>$praise_id,'links'=>$links,'hotArticle'=>$hotArticle]);
            }else{
                die('没有此文章信息');
            }
        }else{
            easyBack();
        }
    }
    //处理评论
    public function discuss()
    {
        if(Session::has('user')){
            $input = input('post.');
            $input['uid'] = Session::get('user')['id'];
            $res = Hdiscuss::create($input,true);
            if($res){
                Session::flash('dis_error','评论成功!');
                easyBack();
            }else{
                Session::flash('dis_error','评论失败!');
                easyBack();
            }
        }else{
            Session::flash('dis_error','请先进行登陆!');
            easyBack();
        }
    }
    //Ajax 添加二级评论
    public function twodiscuss()
    {
        $res = array();
        if(Session::has('user')){
            $input = input('post.');
            if($input){
                $validate = new Validate([
                    'rcontent' => 'require|max:120',
                    'pid' => 'require'
                ]);
                $data=[
                    'rcontent' => $input['rcontent'],
                    'pid' => $input['pid'],
                ];
                //如果格式不正确
                if(!$validate->check($data)){
                    $res = ['error'=>0,'mess'=>'数据有误,回复失败!'];
                    return $res;
                }
                $input['user_id'] =  Session::get('user')['id'];
                //开始加入数据库
                $bool = Hreply::create($input,true);
                if($bool){
                    $user = Db::table('bk_users')->field('id,username')->find($input['user_id']);
                    if($user['id']==$input['uid']){
                        $indetity = '<span class="am-icon-user am-monospace">作者:</span>';
                    }else{
                        $indetity = '<span class="am-monospace">用户:</span>';
                    }
                    $username = $user['username'];
                    $content = $input['rcontent'];
                    $time = date('Y-m-d',time());
                    $res = ['error'=>1,'mess'=>'回复成功!','name'=>$username,'content'=>$content,'addtime'=>$time,'indetity'=>$indetity];
                }else{
                    $res = ['error'=>0,'mess'=>'回复失败!'];
                }
            }else{
                $res = ['error'=>0,'mess'=>'没有内容信息,添加失败!'];
            }
        }else{
            $res = ['error'=>0,'mess'=>'您还未登陆,请先登录!'];
        }
        return json($res);
    }
    //点赞
    public function topraise()
    {
        $res = array();
        if(Session::has('user')){
            $input = input('post.');
            if($input){
                $input['user_id'] =  Session::get('user')['id'];
                //开始加入数据库
               $bool = Db::table('bk_praise')->insert($input);
                if($bool){
                    Db::table('bk_discuss')->where('did',$input['discuss_id'])->setInc('praise_num');
                    $res = ['error'=>1,'mess'=>'点赞成功!'];
                }else{
                    $res = ['error'=>0,'mess'=>'点赞失败!'];
                }
            }else{
                $res = ['error'=>1,'mess'=>'没有获得一级评论id!'];
            }
        }else{
            $res = ['error'=>0,'mess'=>'您还未登陆,请先登录!'];
        }
        return json($res);
    }
    //获取一天热点计量文章
    public function getHotArt($time=86400)
    {
        $redis = new \Redis();
        $redis->connect('localhost',6379);
        if($redis->exists('hotArt')){
            $hotArticle = array();
            $hot = $redis->zRevRange('hotArt',0,-1,true);
            foreach ($hot as $hk=>$hv){
                $hotArticle[] = json_decode($hk,true);
            }
        }else{
            $hotArticle = Db::table('bk_tag')->field('id,tag_describe,tag_click')->order('tag_click','desc')->limit(5)->select();
            foreach ($hotArticle as $hk=>$hv){
                $data = json_encode($hv);
                $redis->zAdd('hotArt',$hv['tag_click'],$data);
            }
            $redis->expire('hotArt',$time);
        }
        return $hotArticle;
    }
    //test
    public function test()
    {
        $redis = new \Redis();
        $redis->connect('localhost',6379);
//        $redis->zAdd('class',10,'user1');
//        $redis->zAdd('class',20,'user2');
//        $redis->zAdd('class',50,'user3');
//        $data = $redis->zRange('class',0,100);
        $redis->delete('hotArt');
        //$redis->expire('class',5);
        //var_dump($redis->exists('class'));
        //var_dump($redis->zRange('hotArt',0,-1));
        //dump($data);
        //Session::delete('dis_error');
        //$hots = Db::table('bk_discuss')->group('artid')->order()
    }
}