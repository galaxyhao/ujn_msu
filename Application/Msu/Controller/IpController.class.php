<?php
namespace Msu\Controller;
use Think\Controller;
class IpController extends Controller
{
	//学院管理员显示页面
    public function org_display()
	{
		$ip_assign = D("ip_assign");
		$ip_range = D("ip_range");
		$organization = D("organization");

		if($_SESSION['gid'] == '学院管理员')
			$org = $_SESSION['organization'];
		else
			$org = I('get.org');

		$admin_org = $organization -> where("id = $org") -> getField("organization");
		$range = $ip_range -> where("organization = $org") -> select();

		$count = $ip_assign -> where("organization = $org") -> count();
		$Page = new \Think\Page($count,10);
		$show = $Page -> show();
		$list = $ip_assign -> where("organization = $org") -> order('ip') -> limit($Page->firstRow.','.$Page->listRows) -> select();
		
		$this -> assign('list',$list);
		$this -> assign('orgid',$org);
		$this -> assign('org',$admin_org);
		$this -> assign('range',$range);
		//dump($range);
		$this -> display();
	}
	//操作前置判断
	public function _before_root_display()
	{
		if(!($_SESSION['gid'] == '超级管理员' || $_SESSION['gid'] == '缴费管理员'))
		{
			$this -> error("您无权进行该项操作！");
		}
	}
	//系统管理员显示页面
	public function root_display()
	{
		$org = M("organization");
		$user = M("user");
		$ip_range = M('ip_range');

		$count = $org -> count();
		$Page = new \Think\Page($count,10);
		$show = $Page -> show();
		$list = $org -> order('id') -> limit($Page->firstRow.','.$Page->listRows) -> select();

		$num = count($list); 	//算出每页记录的条数，主要是最后一页不满10条的情况

		for($i=0; $i<$num; $i++) 
			$organization[$i] = $list[$i]['id']; 

		//查找组织机构的IP管理员
		for($j=0; $j<$num; $j++) 
		{ 
			$list[$j]['name'] = $user -> where("gid = '学院管理员' AND organization = $organization[$j]") -> getField('name');
			$list[$j]['numbers'] =  $user -> where("gid = '学院管理员' AND organization = $organization[$j]") -> getField('numbers');
		}
		//查找组织机构的起始IP地址和配置信息（网关和子网掩码）
		for($k=0; $k<$num; $k++) 
		{ 
			$list[$k]['start'] = $ip_range -> where("organization = $organization[$k]") -> getField('start');
			$list[$k]['finish'] = $ip_range -> where("organization = $organization[$k]") -> getField('finish');
			$list[$k]['note'] = $ip_range -> where("organization = $organization[$k]") -> getField('note');
			$list[$k]['gateway'] = $ip_range -> where("organization = $organization[$k]") -> getField('gateway');
			$list[$k]['mask'] = $ip_range -> where("organization = $organization[$k]") -> getField('mask');
		}
		
		$this -> assign('list',$list);
		$this -> assign('show',$show);
		$this -> display();
	}
	//添加ip分配记录
	public function assign_add()
	{
		$ip_assign = D("IpAssign");
		$ip_range = D("ip_range");

		$ips = $ip['ip'] = I("post.ip");
		$ip['user'] = I("post.user");
		$ip['number'] = I("post.number");
		$ip['note'] = I("post.note","无");
		$organization = $ip['organization'] = I('post.organization');

		/*-----------------判断添加的ip是否属于给定范围-------------------*/
		$start = $ip_range -> where("organization = '$organization'") -> getField('start');
		$finish = $ip_range -> where("organization = '$organization'") -> getField('finish');
		$s = explode(".",$start);
		$f = explode(".",$finish);
		$i = explode(".",$ips);
		if (!$ip_assign->create($ip))
		{
	     	exit($ip_assign->getError());
		}
		else
		{
			if($s[0]<=$i[0]&&$f[0]>=$i[0])
			{
				if($s[1]<=$i[1]&&$f[1]>=$i[1])
				{
					if($s[2]<=$i[2]&&$f[2]>=$i[2])
					{
						if($s[3]<=$i[3]&&$f[3]>=$i[3])
							{
								$result = $ip_assign -> add($ip);
								if($result)
									$this -> ajaxreturn("success",'eval');
									$this -> ajaxreturn("添加失败","eval");
							}
					else
						$this -> ajaxreturn("ip不在指定范围","eval");
				}
				else
					$this -> ajaxreturn("ip不在指定范围","eval");

			}
			else
				$this -> ajaxreturn("ip不在指定范围","eval");
		}
		else
			$this -> ajaxreturn("ip不在指定范围","eval");
		
		}
	}
	//修改ip分配记录
	public function assign_update()
	{
		$ip_assign = D("IpAssign");

		$ip['user'] = I("post.user");
		$ip['number'] = I("post.number");
		$ip['note'] = I("post.note","无");
		$id = I("post.id");

		if(!$ip_assign->create($ip))
		{
			exit($ip_assign->getError());
		}
		else
		{
			$result = $ip_assign -> where("id = $id") -> save($ip);
			if($result)
				$this -> ajaxreturn("success",'eval');
			else
				$this -> ajaxreturn("修改失败！",'eval');
		}
	}
	//删除ip分配记录
	public function assign_delete()
	{
		$ip_assign = M("ip_assign");

		$id = I("get.id");

		if($ip_assign -> where("id = $id") -> delete())
			$this -> ajaxreturn("success","eval");
		else
			$this -> ajaxreturn("删除失败！","eval");
	}
	//操作前置判断
	public function _before_range_update()
	{
		if(!($_SESSION['gid'] == '超级管理员' || $_SESSION['gid'] == '缴费管理员'))
		{
			$this -> error("您无权进行该项操作！");
		}
	}
	//修改IP范围
	public function range_update()
	{
		$ip_range = D("IpRange");

		$ip['start'] = I("post.start");
		$ip['finish'] = I("post.finish");
		$ip['note'] = I("post.note","无");
		$organization = $ip['organization'] = I("post.id");

		$result = $ip_range -> where("organization = $organization ") -> select();

		if(!$ip_range->create($ip))
		{
			exit($ip_range->getError());
		}
		else
		{
			if($result)
				$status = $ip_range -> where("organization = $organization ") -> save($ip);
			else
				$status = $ip_range -> where("organization = $organization ") -> add($ip);

			if($status)
				$this -> ajaxreturn("success","eval");
			else
				$this -> ajaxreturn("修改失败！","eval");
		}
	}
	public function save_info()
	{
		$ip = M("ip_range");

		$info['mask'] = I("post.mask");
		$info['gateway'] = I("post.gateway");
		$id = I("post.id");

		$result = $ip -> where("organization = $id") -> save($info);
		if($result)
			$this -> ajaxreturn("success","eval");
		else
			$this -> ajaxreturn("修改失败！","eval");
	}
}
?>