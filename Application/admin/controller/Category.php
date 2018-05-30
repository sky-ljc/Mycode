<?php
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Validate;
use app\admin\model\Categorys;

class Category extends Base{
    public function index(Request $request)
    {
        if($request->isPost()){
            $start=input('start');
            $end=input('end');
            $where = [];
            if(input('?cat_name')){
                $dis_content = input('cat_name');
                $where['cat_name'] = ['like',"%{$dis_content}%"];
            }
            if($start!='' || $end!=''){
                $where['created_time'] = ['>',$start];
                $where['created_time'] = ['<',$end];
            }
            $cate = new Categorys();
            $data = $cate->where($where)->order('created_time','desc')->paginate('5');
            $data = Categorys::fideFather($data);
            $num = $cate->where($where)->count();
            return view('index',['data'=>$data,'num'=>$num]);
        }else{
            $cate = new Categorys();
            $data = $cate->order('created_time','desc')->paginate('5');
            $data = Categorys::fideFather($data);
            $num = Db::table('bk_category')->count();
            return view('index',['data'=>$data,'num'=>$num]);
        }
    }
    public function add()
    {
        $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
        $cates = Categorys::subtrees($data);
        return view('add',['cates'=>$cates]);
    }
    public function doAdd()
    {
        $res = array();
        $input = input('post.');
        if($input){
            $validate = new Validate([
                'cat_name' => 'require|max:12',
                'cat_keyword' => 'require',
                'remark' => 'require|max:100',
            ]);
            $data=[
                'cat_name' => $input['cat_name'],
                'cat_keyword' => $input['cat_keyword'],
                'remark'  => $input['remark'],
            ];
            //如果格式不正确
            if(!$validate->check($data)){
                $res = ['error'=>0,'mess'=> '数据有误，添加失败！'];
                return $res;
            }
            $bool = Categorys::create($input);
            if($bool){
                $res = ['error'=>1,'mess'=> '添加成功！'];
                return $res;
            }else{
                $res = ['error'=>0,'mess'=> '添加失败！'];
                return $res;
            }
        }else{
            $res = ['error'=>0,'mess'=> '数据有误，添加失败！'];
            return $res;
        }
    }
    //单个删除
    public function oneDel()
    {
        $id = input('id');
        $res = array();
        if($id){
            $bool = Db::table('bk_category')->delete($id);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
        }else{
            $res = ['error'=>0,'mess'=>'没有id穿过来!'];
        }
        return $res;
    }
    //批量删除
    public function dataDel(Request $request)
    {
       $ids = input('post.ids/a');
       if($ids){
            $bool = Categorys::destroy($ids);
           if($bool){
               $res = ['error'=>1,'mess'=>'删除成功!'];
           }else{
               $res = ['error'=>0,'mess'=>'删除失败!'];
           }
       }else{
           $res = ['error'=>2,'mess'=>'请选择需要删除的栏目!'];
       }
       return $res;
    }
    public function update()
    {
        $id = input('id');
        if($id){
            $cate= Categorys::get($id)->toArray();
            if($cate){
                $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
                $cates = Categorys::subtrees($data);
                return view('update',['cate'=>$cate,'cates'=>$cates]);
            }else{
                _callBack('未找到图片信息!');
            }
        }else{
            _callBack('未找到图片信息!');
        }
    }
    public function doupdate(Request $request)
    {
        if($request->isPost()) {
            $input = input('post.');
            $validate = new Validate([
                'cat_name' => 'require|max:12',
                'cat_keyword' => 'require',
                'remark' => 'require|max:100',
            ]);
            $data=[
                'cat_name' => $input['cat_name'],
                'cat_keyword' => $input['cat_keyword'],
                'remark'  => $input['remark'],
            ];
            //如果格式不正确
            if(!$validate->check($data)){
                $res = ['error'=>0,'mess'=> '数据有误，修改失败！'];
                return $res;
            }
            //开始更改
            $banner = Categorys::get($input['id']);
            $bool = $banner->allowField(true)->save($input);
            if ($bool) {
                $res = ['error'=>1,'mess'=> '修改成功！'];
            } else {
                $res = ['error'=>0,'mess'=> '修改失败！'];
            }
        }else{
            $res = ['error'=>0,'mess'=> '数据有误，修改失败！'];
        }
        return json($res);
    }
    //测试
    public function test()
    {
        $admin = Db::table('bk_admin')->select();
        $roles = Db::table('bk_admin_role')->alias('arole')
                    ->join('bk_role','arole.role_id=bk_role.id')
                    ->select();
        //dump($roles);
        foreach ($admin as $k=>$v){
            foreach ($roles as $vv){
                if($vv['user_id']==$v['id']){
                    $admin[$k]['roles'][] = $vv['name'];
                }
            }
        }
        //dump($admin);
    }
}