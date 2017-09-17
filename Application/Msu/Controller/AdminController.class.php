<?php
namespace Msu\Controller;
use Think\Controller;
class AdminController extends Controller 
{
    public function index()
    {
    	$building = M('building');
        $dns = M('dns');

        $build['show'] = 'yes';
    	$count = $building -> where($build) -> count();
    	$Page = new \Think\Page($count,20);
    	$show = $Page -> show();
    	$list = $building -> where($build) -> limit($Page->firstRow.','.$Page->listRows) -> order('name') -> select();

        $dnss = $dns -> select();

        $this -> assign('dnss',$dnss);
    	$this -> assign('list',$list);
    	$this -> assign('show',$show);
        $this -> display();//显示模板
    }

    //添加位置信息
    public function add_building()
    {
    	$build = D('Building');

        $building['name'] = I("post.name");
        $building['type'] = I("post.type");
        $building['campus'] = I("post.campus");

        if(!$build -> create($building))
        {
            exit($build->getError());
        }
        else
        {
            $result = $build -> add($building);
            if($result)
                $this -> success("添加成功！");
            else
                $this -> error("添加失败！");
        }
    }
    //修改位置信息
    public function save_building()
    {
        $build = D('Building');

        $building['name'] = I("post.name");
        $building['type'] = I("post.type");
        $building['campus'] = I("post.campus");
        $id = I("post.id");

        if(!$build -> create($building))
        {
            exit($build->getError());
        }
        else
        {
            $result = $build -> where("id = $id") -> save($building);
            if($result)
                $this -> success("修改成功！");
            else
                $this -> error("修改失败！");
        }
    }
    //删除位置信息
    public function delete_building()
    {
        $build = D("Building");

        $id = I("get.id");
        $building['show'] = 'no';
        $result = $build -> where("id = $id") -> save($building);

        if($result)
            $this -> success("删除成功！");
        else
            $this -> error("删除失败！");
    }
    //修改DNS
    public function save_DNS()
    {
        $dns = D('Dns');

        $value['DNS_first'] = I('post.DNS_first');
        $value['DNS_second'] = I('post.DNS_second');

        if(!$dns -> create($value))
            exit($dns->getError());
        else
        {
            $result = $dns -> where("id = 1") -> save($value);
            if($result)
                $this -> success("修改成功！");
            else
                $this -> error("修改失败！");
        }

    }
}