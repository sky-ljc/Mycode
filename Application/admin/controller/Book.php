<?php
namespace app\admin\controller;
use app\admin\model\Categorys;
use think\Db;
use think\Collection;
use think\Request;
use think\Session;
use think\View;

class Book extends Collection
{
    //发布
    public function haha(){
       $id = input('post.id');
        Db::table('bk_tag')->where('id',$id)->update(['tag_status'=>1]);
    }
    //发布
    public function haha2(){
        $id = input('post.id');
        Db::table('bk_tag')->where('id',$id)->update(['tag_status'=>0]);
    }



    //批量删除
    public function alldel(){
        //获取传递过来需要删除数据的ID,进行删除
        $id = input('post.id');
        if($id){
            $arr = explode(',',$id);
            $res = Db::table('bk_tag')->delete($arr);
//            var_dump($arr) ;
//            die();
            if($res){
                //删除成功
//                $did = BookModel::where('artid','in',$arr)->column('id');
                $did = Db::table('bk_discuss')->where('artid','in',$arr)->column('did');
//                $did =BookModel::diD($arr);
                Db::table('bk_discuss')->where('artid','in',$arr)->delete();
                Db::table('bk_praise')->where('discuss_id','in',$did)->delete();
                $a['code'] = '2';
                $a['msg'] = '删除成功';
                return $a;
            }else{
                $a['code'] = '3';
                $a['msg'] = '删除失败';
                return $a;
            }
        }else{
            //并没有勾选
            $a['code'] = '1';
            $a['msg'] = '请您进行勾选';
            return $a;
        }


    }


    //单个文章内容具体展示查看
    public function show(){
        //判断是修改还是查看操作
        if(input('get.edit')){  //修改
            //获取展示的ID，并展示当条数据 Db::table('goods')->where('goods_id',1)->find();
            $id = input('get.id');
//        dump($id);
            $lst = Db::table('bk_tag')->where('id',$id)->find();
            if($lst){
                $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
                $cates = Categorys::subtrees($data);

                $datas = Db::table('bk_tag')->where('id',$id)->field('tag_column')->select();
                $ids = $datas[0]['tag_column'];

                return view('edit',['lst'=>$lst,'cates'=>$cates,'ids'=>$ids]);
            }else{
                echo '没有数据';
            }

        }else{   //查看
            //获取展示的ID，并展示当条数据 Db::table('goods')->where('goods_id',1)->find();
            $id = input('get.id');
//        dump($id);
            $lst = Db::table('bk_tag')->where('id',$id)->find();
            if($lst){
                $datas = Db::table('bk_tag')->where('id',$id)->field('tag_column')->select();
                $ids = $datas[0]['tag_column'];
                $data = Db::table('bk_category')->where('id',$ids)->field('cat_name')->select();
                $zdata = $data[0]['cat_name'];
                return view('show',['lst'=>$lst,'data'=>$zdata]);
            }else{
                echo '没有数据';
            }
        }

    }

    //删除文章页面
    public function del(){
     //获取数据，进行删除 Db::table('表名')->delete(主键id值);
        if (input('post.')){
            $id = input('post.id');
//            return $id;
            Db::table('bk_tag')->delete($id);
            $did = Db::table('bk_discuss')->where('artid',$id)->column('id');
            Db::table('bk_discuss')->where('artid',$id)->delete();
            Db::table('bk_praise')->where('discuss_id','in',$did)->delete();

        }

    }

    //文章展示页面
    public function lst()
    {
        //获取数据传递到列表页，遍历展示文章列表
        if (input('get.username')){
            $tag_title = input('get.');
            $arr = Db::table('bk_tag')->where('tag_title',$tag_title['username'])->order('id','desc')->paginate(5);
//            dump($tag_title['username']);
            if ($arr){
                $num = Db::table('bk_tag')->where('tag_title',$tag_title['username'])->count();
//                dump($num);
                return view('lst',['arr'=>$arr,'num'=>$num]);
            }else{
                echo '没有数据';
            }
        }else{
            $arr = Db::table('bk_tag')->order('id','desc')->paginate(5);
            if ($arr){
                $num = Db::table('bk_tag')->count();
                return view('lst',['arr'=>$arr,'num'=>$num]);
            }else{
                echo '没有数据';
            }
        }


    }

    //文章添加页面
    public function add()
    {
        //判断提交方式，并获取数据
            if (input('post.')){
                //获取数据
                $input = input('post.');
                $input['tag_addtime'] = time();
                $input['tag_img'] = request()->file('tag_img');
                if ($input['tag_img']){
                    $info = $input['tag_img']->move(ROOT_PATH . 'public' .DS.'article');
//                return $info;
                    $input['tag_img'] = $info->getSaveName();
//                dump($info);
                    //添加数据库
                    $bool = Db::table('bk_tag')->insert($input);
                    if($bool){
                        _alert('Book/lst','添加成功！');
                    }else{
                        _callBack('添加失败!');
                    }
//                dump($input);
                }else{
                    $input['tag_img'] = 'moren.jpg';
                    //添加数据库
                    $bool = Db::table('bk_tag')->insert($input);
                    if($bool){
                        _alert('Book/lst','添加成功！');
                    }else{
                        _callBack('添加失败!');
                    }
                }

            }else{
                $data = Db::table('bk_category')->field('id,cat_name,parent_id')->select();
                $cates = Categorys::subtrees($data);
                return view('add',['cates'=>$cates]);

            }
    }

    //文章修改页面
    public function doedit()
    {

        //判断提交方式，并获取数据
        if (input('post.')){
            //获取数据
            $input = input('post.');
            $input['tag_addtime'] = time();
            $input['tag_img'] = request()->file('tag_img');
            if ($input['tag_img']){
                $info = $input['tag_img']->move(ROOT_PATH . 'public' .DS.'article');
//                return $info;
                $input['tag_img'] = $info->getSaveName();
//                dump($info);
                //添加数据库
                $bool = Db::table('bk_tag')->where('id',$input['id'])->update($input);
                if($bool){
                    _alert('Book/lst','修改成功！');
                }else{
                    _callBack('修改失败!');
                }
//                dump($input);
            }else{
                $input['tag_img'] = 'moren.jpg';
                //添加数据库
                $bool = Db::table('bk_tag')->where('id',$input['id'])->update($input);
                if($bool){
                    _alert('Book/lst','修改成功！');
                }else{
                    _callBack('修改失败!');
                }
            }

        }else{
            return redirect('Book/lst');

        }


    }


}