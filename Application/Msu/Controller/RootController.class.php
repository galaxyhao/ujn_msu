<?php
namespace Msu\Controller;
use Think\Controller;
class RootController extends Controller
{
	public function _initialize()
	{
		if(!isset($_SESSION['uid']) || $_SESSION['uid'] == '')
		{
			$this -> redirect('Login/index');
		}
		
		if(!($_SESSION['gid'] == '超级管理员'||$_SESSION['gid'] == '缴费管理员'||$_SESSION['gid'] == '维护员'))
		{
			$this -> error("您无权查看该页！");
		}
	}
}
?>