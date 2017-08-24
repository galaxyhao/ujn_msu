<?php 
namespace Msu\Controller;
use Think\Controller;
class UserController extends Controller{
	public function id_verify(){

	}//有坑：获取登陆用户等级
	public function index(){
		//$l = id_verify();
		// if($l=='超级管理员'){

		// }else{

		// }
		$this->user_read();
	}


	public function user_read(){
		$m = M('User');
		$xueyuan = M('Organization');
		$arr = $m->select();
		/**
		 * 该函数可以支持1,2,3维数组
		 *<code>
		 *  $arr = C($arr, 'key1', 'aaa'); //修改一维数组的值
		 *  $arr = C($arr, 'key2.key3', 'bbb'); //修改二维数组的值
		 *</code>
		 * @param array  $array  需要修改的数组
		 * @param string $key    需要修改的键值
		 * @param mixed  $value  需要设置的值 
		 * @return array
		 */
		function C($array, $key, $value){
		    if(!is_array($array)) 
		        return;
		    if(is_string($key)){
		        if(strpos($key, '.') === false)
		            $array[$key] = $value; //如果$key原来不存在，现在可以新增加
		        else{
		            $pos = explode('.', $key);
		            $level = count($pos);
		            $level == 2 ? ($array[$pos[0]][$pos[1]] = $value) : ($array[$pos[0]][$pos[1]][$pos[2]] = $value);
		        }
		    }
		    return $array;  
		}


		for ($i=0; $i < count($arr); $i++) { 
			$IdOfOrg = $arr[$i]['organization'];
			$NameOfOrg = $xueyuan->where("id = $IdOfOrg")->getfield('organization');
			$arr = C($arr,"$i.organization",$NameOfOrg);
		}//学院名替换学院ID

		$this->assign('data',$arr);
		$this->display('manageusers');
	}//读取所有用户信息,并传给模板


	public function user_del(){
		$m = M('User');
		$uid = $_GET['uid'];
		// $level = id_verify();
		// if($level!='超级管理员'){

		// }else{

		// }先验证用户等级再进行操作
		$count = $m->delete($uid);
		if($count){
			$this->success('数据删除成功');
		}else{
			$this->error('数据删除失败');//有坑：('先判断记录的存在，有则警告')！！
		}
	}//删除用户数据


	public function modify(){
		$uid = $_GET['uid'];
		$m = M('User');
		$arr = $m->find($uid);
		$this->assign('data',$arr);
		$this->display('user_update');
		$tag++;
		echo "$tag";
	}//显示修改界面


	public function user_update(){
		$m=M('User');
		$data['uid'] = $_POST['uid'];
		$data['name'] = $_POST['name'];
		$data['account'] = $_POST['account'];//有坑：需增加重复检测
		$data['password'] = $_POST['password'];//有坑：需增加密码验证
		$data['organization'] = $_POST['organization'];
		$data['location'] = $_POST['location'];
		$data['gid'] = $_POST['gid'];
		$data['numbers'] = $_POST['numbers'];
		$data['level'] = $_POST['level'];
		$count = $m->save($data);

		if($count){
			$this->success('数据修改成功','index');
		}else{
			$this->error('数据修改失败');
		}
	}//更新用户信息


	public function user_create(){
		$m = M('User');
		$m->name = $_POST['name'];
		$m->account = $_POST['account'];//有坑：需增加重复检测
		$m->password = $_POST['password'];//有坑:增加md5
		$m->organization = $_POST['organization'];
		$m->location = $_POST['location'];
		$m->gid = $_POST['gid'];
		$m->numbers = $_POST['numbers'];
		$m->level = $_POST['level'];
		//以上部分应该有更简洁的代码表示方式

		$idNum = $m->add();
		if($idNum){
			$this->success('数据集添加成功');
		}else{
			$this->error('数据添加失败');
		}
	}//增加用户信息


	public function search(){
		if(isset($_POST['name']) && $_POST['name']!=null){
			$where['name']=array('LIKE',"%{$_POST['name']}%");
		}
		if(isset($_POST['account']) && $_POST['account']!=null){
			$where['account']=array('EQ',"{$_POST['account']}");
			//var_dump(isset($_POST['account']));
		}
		if(isset($_POST['gid'])&& $_POST['gid']!=null){
			$where['gid']=array('EQ',"{$_POST['gid']}");
		}
		//$where['_logic']='and';

		$m = M('user');
		$arr = $m->order(array('level'=>'desc'))->where($where)->select();
		$this->assign('data',$arr);
		$this->display('manageusers');
	}//实现搜索



}
		
?>
