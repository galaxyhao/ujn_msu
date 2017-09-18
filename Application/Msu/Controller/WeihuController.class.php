<?php
namespace Msu\Controller;
use Think\Controller;
class WeihuController extends RootController
{
	public function weihu_add()
	{
		$building = M('building');
		$staff['type'] = '职工楼';
		$office['type'] = '办公楼';
		$staff['show'] = $office['show'] = 'yes';
		$staff_b = $building -> where($staff) -> order('name') -> select();
		$office_b = $building -> where($office) -> order('name') -> select();
		$this -> assign('staff_b',$staff_b);
		$this -> assign('office_b',$office_b);
		$this -> display();
	}
	//将维护记录写入数据库
	public function weihu_write()
	{
		$record = D('Record');
		$w_client = D('WeihuClient');
		$building = M('building');

		$w_info['name'] = I('get.name');
		$w_info['numbers'] = I('get.numbers');
		
		$re['note'] = I('get.note','xxx');
		$re['location'] = I('get.location','xxx');

		$build = $w_info['building'] =  $address['building'] = I('get.building');
		$units = $w_info['unit'] = $address['unit'] = I('get.unit');
		$rooms = $w_info['room'] = $address['room'] = I('get.room');
		$w_client_id = $w_client -> where($address) -> getField('cid');

		$buildings = $building -> where("id = $build") -> getField('name');

		/*
			如果维护记录中没有维护所需信息，则在weihu_client表中增加一条信息,并返回所添加记录的id;
			若维护记录中有维护所需信息，更新维护信息。
		*/
		if(!$w_client_id)
		{
			if(!$w_client -> create($w_info))
			{

				exit($w_client -> getError());
			}
			else
			{
				$w_client_id = $w_client -> add($w_info);
			}
		}
		else
		{

			if(!$w_client -> create($w_info))
			{

				exit($w_client -> getError());
			}
			else
			{
				$w_client -> where("cid = '$w_client_id'") -> save($w_info);
			}	
		}

		/*
			将获取的w_client_id写入weihu_record表中，同时写入备注信息
		*/
		$re['client_id'] = $w_client_id;
		$re['adder'] = $_SESSION['uid'];
		$re['register_time'] = date('Y-m-d H:i:s',time());
		if(!$record -> create($re))
		{
			exit($record -> getError());
		}
		else
		{
			$result = $record -> add($re);
			if($result)
			{
				$this -> ajaxreturn('success','eval');
			}
			else
			{
				$this -> ajaxreturn('添加失败！','eval');
			}

		}
	}
	//修改故障说明
	public function note_save()
	{
		$record = M("weihu_records");

		$note['note'] = I("post.note");
		$id = I("post.rid");

		$rule = array(
			array('note','2,100','长度不合法','0','length'),
			);

		if(!$record -> validate($rule) -> create())
		{
			exit($record -> getError());
		}
		else
		{
			$result = $record -> where("id = $id") -> save($note);
			if($result)
			{
					$this -> ajaxreturn('success','eval');
			}
			else
			{
				$this -> ajaxreturn('修改失败！','eval');
			}
		}
	}
	//列出未完成的维护
	public function weihu_list()
	{
		//返回当月的维护统计数据
		function record_count()
		{
			$record = M('weihu_records');

			$date =  date('Y-m',time());

			$totals['register_time'] = array('like',"$date%");
			$totals['show'] = 'yes';

			$undones['register_time'] = array('like',"$date%");
			$undones['show'] = 'yes';
			$undones['status'] = '未完成';

			$dones['register_time'] = array('like',"$date%");
			$dones['show'] = 'yes';
			$dones['status'] = '完成';

			$total = $record -> where($totals) -> count();
			$undone = $record -> where($undones) -> count();
			$done = $record -> where($dones) -> count();

			$count['total'] = $total;
			$count['done'] = $done;
			$count['undone'] = $undone;
			return $count;
		}
		//返回当月维护量前三名
		function worker_record()
		{
			$user = M('user');
			$record = M("weihu_list_yes");

			$workers = $user -> where("gid = '维护员'") -> field('uid,name') -> select();
			$count = $user -> where("gid = '维护员'") -> count();

			$date = date('Y-m',time());

			for($i=0; $i<$count; $i++)
				{
					$tops[$i]['name'] = $workers[$i]['name'];
					$completers = $workers[$i]['uid'];
					$worker[$i]['completer'] = array('like',array("$completers","%,$completers,%","%,$completers","$completers,%"),'OR');
					$worker[$i]['finish_time'] = array('like',"$date%");
				}
			for ($r=0; $r<$count; $r++)
			{ 
				$tops[$r]['counts'] = $record -> where($worker[$r]) -> count();
				$tops[$r]['date'] = $date;
			}
			
			foreach ($tops as $k => $v) 
			{
				$num[$k] = $v['counts']; 
			}

			array_multisort($num,SORT_DESC,SORT_REGULAR,$tops);

			return array_slice($tops,0,6);
		}

		$record_count = record_count();
		$tops = worker_record();
		$weihu_list_no = M('weihu_list_no');
		$users = M('user');
		$types = M('weihu_type');

		$count = $weihu_list_no -> count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		$show = $Page -> show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $weihu_list_no -> limit($Page->firstRow.','.$Page->listRows) -> order('register_time desc') -> select();

		
		$user = $users -> where("gid = '维护员'") -> field('name,uid') -> select();
		$type = $types -> field('id,type') -> select();
		
		
		$this -> assign('users',$user);
		$this -> assign('types',$type);
		$this -> assign('record_count',$record_count); 
		$this -> assign('tops',$tops);

		$this->assign('list',$list);// 赋值数据集
		$this->assign('show',$show);// 赋值分页输出
		
		$this -> display(weihu_list);
	}


	//列出已完成的维护
	public function weihu_list_yes()
	{
		$weihu_list_yes = M('weihu_list_yes');
		$user = M('User');
		$building = D('building');
		$type = D("weihu_type");

		$types = $type -> select();
		$completers = $user -> where("gid = '维护员'") -> select();
		$count = $weihu_list_yes -> count();	// 查询满足要求的总记录数
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page -> show();			// 分页显示输出

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $weihu_list_yes -> order('finish_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select();

		//将数据库中储存的参与维护人员的uid利用函数转化为name（使用函数拆分和拼接字符串）
		for($i=0;$list[$i];$i++)
		{
			$arr = explode(",",$list[$i]["completer"]);
			$j = 0;
			while($arr[$j])
			{
				$arr[$j] = $user -> where("uid = $arr[$j]") -> getField('name');
				$j++;
			}
			$completer =  implode(' ',$arr);
			$list[$i]["completer"] = $completer;
		}

		$this -> assign('type',$types);
		$this -> assign('completer',$completers);
		$this -> assign('list',$list);		// 赋值数据集
		$this -> assign('show',$show);		// 赋值分页输出
		$this -> display();
	}

	//根据位置查询完成的维护记录
	public function client_record()

	{
		$client_record = M('weihu_list_yes');
		$record = M('weihu_list');
		$user = M('User');
		$id = I('get.id');

		$building = $record -> where("id = $id") -> getField("building");
		$unit = $record -> where("id = $id") -> getField("unit");
		$room = $record -> where("id = $id") -> getField("room");

		$count = $client_record -> where("building = '$building' AND unit = '$unit' AND room = '$room'") ->  count();	// 查询满足要求的总记录数
		$Page = new \Think\Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page -> show();			// 分页显示输出

		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $client_record -> where("building = '$building' AND unit = '$unit' AND room = '$room'") -> order('finish_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select();

		//将数据库中储存的参与维护人员的uid利用函数转化为name（使用函数拆分和拼接字符串）
		for($i=0;$list[$i];$i++)
		{
			$arr = explode(",",$list[$i]["completer"]);
			$j = 0;
			while($arr[$j])
			{
				$arr[$j] = $user -> where("uid = $arr[$j]") -> getField('name');
				$j++;
			}
			$completer =  implode(' ',$arr);
			$list[$i]["completer"] = $completer;
		}
		
		if(!$list)
		{
			echo "该用户的维护记录为空！";
		}
		else{
			$this -> assign('list',$list);
			$this -> assign('show',$show);

			$this -> assign('building',$building);
			$this -> assign('unit',$unit);
			$this -> assign('room',$room);
			$this -> display();
		}
	}
	//填写维护记录
	public function weihu_submit()
	{
		$record = D('Record');
		$completers = I('post.completer');

		$re['finish_time'] = date('Y-m-d H:i:s',time());
		$re['solution'] = I('post.solution');
		$re['status'] = I('post.status');
		$re['type'] = I('post.type');
		$re['reporter'] = $_SESSION['uid'];
		$re['completer'] = implode(',',$completers);
		$rid = I('post.rid');

		//将填写的内容写入record表
		if(!$record -> create($re))
		{
			exit($record -> getError());
		}
		else
		{
			$result1 = $record -> where("id = '$rid'") -> save($re);
			if(!$result1)
			{
				$this -> ajaxreturn('操作失败','eval');
			}
			else
				$this -> ajaxreturn("success",'eval');

		}

	}
	public function _before_weihu_save()
	{
		$record = M("weihu_records");
		$id = I("post.rid");

		$uid = $record -> where("id = $id") -> getField('reporter');

		if(!($_SESSION['gid'] == '超级管理员' || $_SESSION['gid'] == '缴费管理员' || $_SESSION['uid'] == "$uid")) 
		{
			$this -> error("您无权进行该项操作！");
		}
	}
	//修改维护记录
	public function weihu_save()
	{
		$record = D('Record');
		$completers = I('post.completer');

		$re['finish_time'] = date('Y-m-d H:i:s',time());
		$re['solution'] = I('post.solution');
		$re['status'] = I('post.status');
		$re['type'] = I('post.type');
		$re['reporter'] = $_SESSION['uid'];
		$re['completer'] = implode(',',$completers);
		$rid = I('post.rid');

		//将填写的内容写入record表
		if(!$record -> create($re))
		{
			exit($record -> getError());
		}
		else
		{
			$result1 = $record -> where("id = '$rid'") -> save($re);
			if(!$result1)
			{
				$this -> ajaxreturn('操作失败','eval');
			}
			else
				$this -> ajaxreturn("success",'eval');

		}

	}
	public function _before_weihu_delete()
	{
		if(!($_SESSION['gid'] == '超级管理员' || $_SESSION['gid'] == '缴费管理员'))
		{
			$this -> ajaxreturn("您无权进行该项操作！");
		}
	}
	//删除维护记录（将'show'字段修改为no）
	public function weihu_delete()
	{
		$record = D('Record');
		

		$rid = I('get.rid');
		$result1 = $record -> where("id = '$rid'") -> setField('show','no');

		if($result1)
			$this -> ajaxreturn('success','eval');
		else
			$this -> ajaxreturn('删除失败！','eval');
	}
}
?>