<?php
namespace Msu\Controller;
use Think\Controller;
class CountController extends RootController
{
	public function index()
	{
		$user = D("User");
		$types = D("weihu_type");
		$record_list = D("weihu_list_yes");

		$name = $user -> where("gid = '维护员'") -> select();
		$typelist = $types -> select();
		

		$start = I('get.start');
		$finish = I('get.finish');
		$completer = I('get.name');
		$type = I('get.type');

		$search["finish_time"] = array('between',array($start,$finish));
		$search["type"] = array('like',"%$type%");

		//对completer字段设置模糊查询
		if($completer == "")
			$search["completer"] = array('like',"%$completer%");
		else
			$search["completer"] = array('like',array("$completer","%,$completer,%","%,$completer","$completer,%"),'OR');

		$count = $record_list -> where($search) -> count();
		$Page = new \Think\Page($count,10);
		$show = $Page -> show();

		$list = $record_list -> where($search) -> order('finish_time desc') -> limit($Page->firstRow.','.$Page->listRows) -> select();

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

		$this -> assign('name',$name);
		$this -> assign('type',$typelist);
		$this -> assign('show',$show);
		$this -> assign('list',$list);
		$this -> assign('count',$count);
		$this -> display();
	}
}
?>