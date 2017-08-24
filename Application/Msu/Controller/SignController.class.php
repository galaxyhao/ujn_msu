<?php
namespace Msu\Controller;
use Think\Controller;
class SignController extends RootController
{                   
	public function night_sign()
	{
		$signs = D('Sign');
		$sign['name'] = $where['name'] = $_SESSION['uid'];
		$sign['time'] = date('Y-m-d H:i:s',time());
		$ip = $sign['ip'] = $_SERVER['REMOTE_ADDR'];
		$sign['note'] = I('post.note');
		$sign['type'] = $where['type'] = I('post.type');
		$time = date('Y-m-d');
		$where['time'] = array('like',"$time%");
		$hour = (int)date("H");

		$result = $signs -> where($where) -> select();
		if($_SESSION['gid'] == '维护员') 
		{
			if($ip == "202.194.64" || $ip == "202.194.67" || $ip == "202.194.68" || $ip == "127.0.0.1") 
			{
				if($hour>=0&&$hour<=23)
				{
					if(!$result)
					{
						$signs -> add($sign);
						$this -> ajaxreturn("success","eval");
					}
					else
						$this -> ajaxreturn("您今天已经签过到！","eval");
				}
				else
					$this -> ajaxreturn("签到时间不符合要求！","eval");
			}
			else
				$this -> ajaxreturn("ip地址不符合要求！","eval");
		}
		else
			$this -> ajaxreturn("所在用户组无法进行此项操作！","eval");
	}

	public function afternoon_sign()
	{
		$signs = D('Sign');
		$sign['name'] = $where['name'] = $_SESSION['uid'];
		$sign['time'] = date('Y-m-d H:i:s',time());
		$ip = $sign['ip'] = $_SERVER['REMOTE_ADDR'];
		$sign['note'] = I('post.note');
		$sign['type'] = $where['type'] = I('post.type');
		$time = date('Y-m-d');
		$where['time'] = array('like',"$time%");
		$hour = (int)date("H");

		$result = $signs -> where($where) -> select();
		if($_SESSION['gid'] == '维护员') 
		{
			if($ip == "202.194.64" || $ip == "202.194.67" || $ip == "202.194.68" || $ip == "127.0.0.1") 
			{
				if($hour>=17&&$hour<=19)
				{
					if(!$result)
					{
						$signs -> add($sign);
						$this -> ajaxreturn("签到成功！","eval");
					}
					else
						$this -> ajaxreturn("您今天已经签过到！","eval");
				}
				else
					$this -> ajaxreturn("签到时间不符合要求！","eval");
			}
			else
				$this -> ajaxreturn("ip地址不符合要求！","eval");
		}
		else
			$this -> ajaxreturn("所在用户组无法进行此项操作！","eval");
	}

	public function index()
	{
		$list = M('sign_view');
		$count_night = $list -> where("type = '晚班'") -> count();
		$count_adternoon = $list -> where("type = '下午班'") -> count();

		$Page_night = new \Think\Page($count_night,10);
		$show_night = $Page_night -> show();

		$list_night = $list -> where("type = '晚班'") -> order('time desc') -> limit($Page_night->firstRow.','.$Page_night->listRows) -> select();

		$Page_afternoon = new \Think\Page($count_adternoon,10);
		$show_afternoon = $Page_afternoon -> show();

		$list_afternoon = $list -> where("type = '下午班'") -> order('time desc') -> limit($Page_afternoon->firstRow.','.$Page_afternoon->listRows) -> select();

		$this -> assign('list_night',$list_night);
		$this -> assign('show_night',$show_night);
		$this -> assign('list_afternoon',$list_afternoon);
		$this -> assign('show_afternoon',$show_afternoon);
		$this -> display();
	}
	public function _before_delete()
	{
		$sign = M('sign');
		$id = I('get.id');

		$name = $sign -> where("id = $id") -> getField('name');
		if(!($_SESSION['gid']=='超级管理员'||$_SESSION['gid']=='缴费管理员'||$_SESSION['uid']=="$name"))
		{
			$this -> ajaxreturn("您无权进行此项操作！","eval");
		}
	}
	public function delete()
	{
		$sign = M("sign");

		$id = I('get.id');
		$result = $sign -> where("id = $id") -> delete();

		if($result)
			$this -> ajaxreturn("success","eval");
		else
			$this -> ajaxreturn('删除失败！',"eval");
	}

}
?>