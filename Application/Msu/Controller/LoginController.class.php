<?php
namespace Msu\Controller;
use Think\Controller;
class LoginController extends Controller
{
	
	public function index()
	{
		$this -> display();
	}
	public function checkin()
	{
		$msu_user = M('user');
		$user['account'] = I('post.username');
		$user['password'] = md5($_POST["password"]);
		$result = $msu_user -> where($user) -> find();
		if($result)
		{
			//写入session
			$_SESSION['name'] = $result['name'];
			$_SESSION['uid'] = $result['uid'];
			$_SESSION['gid'] = $result['gid'];
			$_SESSION['organization'] = $result['organization'];
			$_SESSION['campus'] = $result['location'];

			if($result['gid'] == '学院管理员')
				$this -> success('登录成功！',U('Ip/org_display'));
			else
				$this -> success('登录成功！',U('Weihu/weihu_list'));
		}
		else
		{
			$this -> error('用户不存在或密码错误！');
		}
	}
	public function loginout()
	{
		session(null); //销毁session
		$this -> redirect('Login/index');

	}
}
?>