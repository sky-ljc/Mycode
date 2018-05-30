<?php
namespace app\admin\controller;
use app\admin\model\BannerModel;
use app\admin\model\Categorys;
use think\Db;
use think\Image;
use think\Request;
use think\Session;
use think\Validate;

class Banner extends Base{
    //展示
    public function index(Request $request)
    {
        if($request->isPost()){
            $start=input('start');
            $end=input('end');
            $where = [];
            $cwhere = [];
            if(input('?pic_name')){
                $dis_content = input('pic_name');
                $where['b.pic_name'] = ['like',"%{$dis_content}%"];
                $cwhere['pic_name'] = ['like',"%{$dis_content}%"];
            }
            if($start!='' || $end!=''){
                $where['b.created_time'] = ['>',$start];
                $cwhere['created_time'] = ['>',$start];
                $where['b.created_time'] = ['<',$end];
                $cwhere['created_time'] = ['<',$end];
            }
            $banner = new BannerModel();
            $total = $banner->where($cwhere)->count();
            $data = $banner->alias('b')
                ->join('bk_category','b.cate_id=bk_category.id')
                ->field('b.*,bk_category.cat_name')
                ->where($where)
                ->order('b.created_time','desc')->paginate(5);
            $data = BannerModel::oneImg($data);
            return view('index',['data'=>$data,'total'=>$total]);
        }else{
            $banner = new BannerModel();
            $total = $banner->count();
            $data = $banner->alias('b')
                ->join('bk_category','b.cate_id=bk_category.id')
                ->field('b.*,bk_category.cat_name')
                ->order('b.created_time','desc')->paginate(5);
            $data = BannerModel::oneImg($data);
            return view('index',['data'=>$data,'total'=>$total]);
        }
    }
    //图册展示
    public function show()
    {
        $id = input('id');
        $img = BannerModel::get($id)->toArray();
        if($img){
            $pic = explode('@@',trim($img['pic_img'] ,'@@'));
            $total = count($pic);
            $offset = ceil($total/4);
            if($pic[0]==''){
                _callBack('没有图片信息！');
            }else{
                return view('show',['img'=>$pic,'total'=>$total,'offset'=>$offset]);
            }
        }else{
            _callBack('没有图片信息！');
        }
    }
    //添加
    public function add(Request $request)
    {
        if($request->isPost()){
            $input = input('post.');
            if(isset($input['img'])){
                $input['pic_img'] = implode('@@',$input['img']);
            }
            $validate = new Validate([
                'pic_name' => 'require|max:32',
                'pic_remark' => 'require|max:100'
            ]);
            $data=[
                'pic_name' => $input['pic_name'],
                'pic_remark' => $input['pic_remark'],
            ];
            //如果格式不正确
            if(!$validate->check($data)){
                _callBack('数据有误，添加失败!');
                die();
            }
            //添加数据库
            $model = new BannerModel($input);
            $bool = $model->allowField(true)->save();
            if($bool){
               _alert('index','添加成功！');
            }else{
                _callBack('添加失败!');
            }
        }else{
            $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
            $cates = Categorys::subtrees($data);
            return view('add',['cates'=>$cates]);
        }
    }
    //单个删除
    public function oneDel()
    {
        $id = input('id');
        $res = array();
        if($id){
            $img = Db::table('bk_banner')->where('id',$id)->value('pic_img');
            $arr = explode('@@',$img);
            if(!empty($arr)){
                foreach ($arr as $v){
                    if(file_exists($v)){
                        unlink($v);
                    }
                }
            }
            $bool = Db::table('bk_banner')->delete($id);
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
            $img = Db::table('bk_banner')->where('id','in',$ids)->field('pic_img')->select();
            foreach ($img as $v){
                $arr = explode('@@',$v['pic_img']);
                if(!empty($arr)){
                    foreach ($arr as $vv){
                        if(file_exists($vv)){
                            unlink($vv);
                        }
                    }
                }
            }
            $bool = BannerModel::destroy($ids);
            if($bool){
                $res = ['error'=>1,'mess'=>'删除成功!'];
            }else{
                $res = ['error'=>0,'mess'=>'删除失败!'];
            }
        }else{
            $res = ['error'=>2,'mess'=>'请选择需要删除的栏目!'];
        }
        return json($res);
    }
    //图册启用停用
    public function actstate()
    {
       $input = input('get.');
       $res = array();
       if($input){
           if($input['sta']==0){
               //进行启用
               $banner = BannerModel::get($input['id']);
               $banner->bstatus=1;
               $bool = $banner->save();
               if($bool){
                   $res = ['error'=>1,'id'=>$input['id'],'sta'=>1];
               }else{
                   $res = ['error'=>0,'id'=>$input['id'],'sta'=>0];
               }
           }elseif($input['sta']==1){
               //进行停用
               $banner = BannerModel::get($input['id']);
               $banner->bstatus=0;
               $bool = $banner->save();
               if($bool){
                   $res = ['error'=>1,'id'=>$input['id'],'sta'=>0];
               }else{
                   $res = ['error'=>0,'id'=>$input['id'],'sta'=>1];
               }
           }
       }else{
           $res = ['error'=>0,'id'=>$input['id'],'sta'=>$input['sta']];
       }
       return json($res);
    }
    //图册编辑
    public function update(Request $request)
    {
        $id = input('id');
        if($id){
            if($request->isPost()){
                $input = input('post.');
                $validate = new Validate([
                    'pic_name' => 'require|max:32',
                    'pic_remark' => 'require|max:100'
                ]);
                $data=[
                    'pic_name' => $input['pic_name'],
                    'pic_remark' => $input['pic_remark'],
                ];
                //如果格式不正确
                if(!$validate->check($data)){
                    _callBack('数据有误，添加失败!');
                    die();
                }
                //开始更改
               $banner = BannerModel::get($input['id']);
               if(!input('?is_banner')){
                   $input['is_banner'] = 0;
               }
                if(input('?img')){
                    $input['pic_img'] = $banner->pic_img.'@@'.implode('@@',$input['img']);
                }
                $bool = $banner->allowField(true)->save($input);
                if($bool){
                    _alert('Banner/index','修改成功！');
                }else{
                    _callBack('修改失败!');
                }
            }else{
                $banner = BannerModel::get($id)->toArray();
                if($banner){
                    $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
                    $cates = Categorys::subtrees($data);
                    return view('update',['banner'=>$banner,'cates'=>$cates]);
                }else{
                    _callBack('未找到图片信息!');
                }
            }
        }else{
            _callBack('未找到图片信息!');
        }
    }
    //图片上传
    public function picupload(Request $request)
    {
        $file = $request->file('filename');
        if($file){
            $info = $file->validate(['ext'=>'jpg,jpeg,png,gif'])->move(ROOT_PATH . 'Public'.DS.'uploads',true,false);
            //存储新图片信息
            $data = array();
            $data['name'] = $info->getSaveName();
            //$imgurl = './uploads/thumb/'.$data['name'];
            //$image = Image::open($imgurl);
           // $image->thumb(800,429)->save($imgurl);//生成缩略图、删除原图
            //$this->ajaxReturn($data);
            // echo json_encode($data);
            return json($data);
        }
    }
    public function test()
    {
        $img = Db::table('bk_banner')->where('id','in',[1,2,3])->field('pic_img')->select();
        dump($img);
       // echo ROOT_PATH;
    }
    public function preview()
    {
        /**
         * 此页面用来协助 IE6/7 预览图片，因为 IE 6/7 不支持 base64
         */
        #!! 注意
        #!! 此文件只是个示例，不要用于真正的产品之中。
        #!! 不保证代码安全性。
        #!! IMPORTANT:
        #!! this file is just an example, it doesn't incorporate any security checks and
        #!! is not recommended to be used in production environment as it is. Be sure to
        #!! revise it and customize to your needs.
        $DIR = 'preview';
// Create target dir
        if (!file_exists($DIR)) {
            @mkdir($DIR);
        }

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        if ($cleanupTargetDir) {
            if (!is_dir($DIR) || !$dir = opendir($DIR)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $DIR . DIRECTORY_SEPARATOR . $file;

                // Remove temp file if it is older than the max age and is not the current file
                if (@filemtime($tmpfilePath) < time() - $maxFileAge) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }

        $src = file_get_contents('php://input');

        if (preg_match("#^data:image/(\w+);base64,(.*)$#", $src, $matches)) {

            $previewUrl = sprintf(
                "%s://%s%s",
                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                $_SERVER['HTTP_HOST'],
                $_SERVER['REQUEST_URI']
            );
            $previewUrl = str_replace("preview.php", "", $previewUrl);


            $base64 = $matches[2];
            $type = $matches[1];
            if ($type === 'jpeg') {
                $type = 'jpg';
            }

            if (!in_array($type, array("jpg", "png", "gif", "bmp"))) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 200, "message": "un recoginized image source"}, "id" : "id"}');
            }

            $filename = md5($base64).".$type";
            $filePath = $DIR.DIRECTORY_SEPARATOR.$filename;

            if (file_exists($filePath)) {
                die('{"jsonrpc" : "2.0", "result" : "'.$previewUrl.'preview/'.$filename.'", "id" : "id"}');
            } else {
                $data = base64_decode($base64);
                file_put_contents($filePath, $data);
                die('{"jsonrpc" : "2.0", "result" : "'.$previewUrl.'preview/'.$filename.'", "id" : "id"}');
            }

        } else {
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "un recoginized source"}}');
        }
    }
}