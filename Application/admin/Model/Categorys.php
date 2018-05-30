<?php
namespace app\admin\model;
use think\Model;

class  Categorys extends Model{
    protected $table = 'bk_category';
    protected  $autoWriteTimestamp = true;
    protected $createTime = 'created_time';
    protected $updateTime = 'updated_time';
    //2. 找子孙树
    // ①、用静态变量
    static public function subtree($arr,$id=0,$lev=0) {
        static $subs = array(); // 子孙数组
        foreach($arr as $v) {
            if($v['parent_id'] == $id) {
                $v['lev'] = $lev;
                $subs[] = $v;
                self::subtree($arr,$v['id'],$lev+1);
            }
        }
        return $subs;
    }
    //2. 找子孙树
    // ①、用静态变量
    static public function subtrees($arr,$id=0,$lev=0) {
        static $subs = array(); // 子孙数组
        foreach($arr as $v) {
            if($v['parent_id'] == $id) {
                $v['lev'] = $lev;
                if($v['lev']>1){
                    break;
                }
                $subs[] = $v;
                self::subtrees($arr,$v['id'],$lev+1);
            }
        }
        return $subs;
    }
    /*
    *家谱树的应用 ,如面包屑导航
    *只要parent!=0,就继续找
    */
    // 递归找家谱树
    static public function familytree($arr,$id) {
        $tree = array();
        foreach($arr as $v) {
            if($v['id'] == $id) {// 判断要不要找父栏目
                if($v['parent_id'] > 0) { // parent>0,说明有父栏目
                    $tree = array_merge($tree,self::familytree($arr,$v['parent_id']));
                }
//                $tree[] = $v;
                $tree[] = $v['cat_name'];
            }
        }
        return $tree;
    }
    /*
     * @param arr 分页后的数据
     * @param arr 分类表中全部数据
     * return  添加path 下标的新数组
     * */
    static public function fideFather($arr)
    {
        if(is_object($arr)){
            foreach ($arr as $k=>$v){
                if($v->parent_id == 0){
                    $v->path = '顶级栏目';
                }else{
                    $v->path = '顶级栏目-||'.implode('-||',Categorys::familytree($arr,$v->id));
                }
            }
        }else{
            foreach ($arr as $k=>$v){
                if($v['parent_id'] == 0){
                    $arr[$k]['path'] = '顶级栏目';
                }else{
                    $arr[$k]['path'] = '顶级栏目-||'.implode('-||',Categorys::familytree($arr,$v['id']));
                }
            }
        }
        return $arr;
    }

}