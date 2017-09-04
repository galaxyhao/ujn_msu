<?php
namespace Msu\Controller;
use Think\Controller;


/*
 * @author Billgo
 * 用户操作
*/
class UserController extends RootController{
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
	    $tag = 0;
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
		$data['account'] = $_POST['account'];
		$data['organization'] = $_POST['organization'];
		$data['location'] = $_POST['location'];
		$data['gid'] = $_POST['gid'];
		$data['numbers'] = $_POST['numbers'];
		$data['level'] = $_POST['level'];
        if($this->isUserExist($m->account)){
            $this->error('错误！账户:'.$m->account.'已存在');
        }

        if(!$this->isOrganizationExist($data['organization'])){
            $this->error('错误！学院:'.$m->organization.'不存在');
        }else{
            $data['organization']= M('organization')->where("organization = '%s'",$data['organization'])->getField('id');

        }

		if($m->save($data)){
			$this->success('信息修改成功','index');
		}else{
			$this->error('数据修改失败');
		}
	}//更新用户信息


	public function user_create(){
		$m = M('User');
		$m->name = $_POST['name'];
		$m->account = $_POST['account'];
		$m->password = md5($_POST['password']);
		$m->organization = $_POST['organization'];
		$m->location = $_POST['location'];
		$m->gid = $_POST['gid'];
		$m->numbers = $_POST['numbers'];
		$m->level = $_POST['level'];
		//以上部分应该有更简洁的代码表示方式

		if($this->isUserExist($m->account)){
			$this->error('错误！账户:'.$m->account.'已存在');
		}

        if(!$this->isOrganizationExist($m->organization)){
            $this->error('错误！学院:'.$m->organization.'不存在');
        }else{
        	$m->organization = M('organization')->where("organization = '%s'",$m->organization)->getField('id');

		}


		$idNum = $m->add();
		if($idNum){
			$this->success('用户添加成功');
		}else{
			$this->error('数据添加失败');
		}
	}//增加用户信息

	/*
	 * @param account String 账户
	 * @return boolean
	 * */
	public function isUserExist($account){
        $find = M('user') ->where(
            array(
                'account' => $account
            )
        )->find();
        if (null == $find && false == $find ){
        	return false;
		}else{
        	return true;
		}
	}
    /**
     * @param $organiation
     * @return bool
     */
    public function isOrganizationExist($organization){
//        $organization = "'".$organization."'";
//        $find = M('organization') ->where(
//            array(
//                'organization' => $organization
//            )
//        )->find();
        $find=M('organization')->where("organization='%s'",$organization)->select();
        if (null == $find && false == $find ){
            return false;
        }else{
            return true;
        }
	}

    /**
     * @return mixed
     */
    public function getOrganization($keyword = ''){
        $keyword = I("param.keyword");
        $organizationModel = M('organization');

        $searchResult = $organizationModel->where(
             array(
                 'organization' => array(
                     'like','%'.$keyword.'%'
                 )
             )
        )->select();
//        $searchResult = $organizationModel->where(
//             array(
//                 'organization' => $keyword
//             )
//        )->field('organization')->select();
        $this->ajaxReturn($searchResult);
//        dump($searchResult);
//        return $searchResult;
	}

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

    /**
     * @return bool
     */
    public function updatePassword(){
//        $passwdData = I('param.data')
        $userModel = M('user');
        $userId = I('param.uid');
        $currPassword =I('param.currPassword');
        $newPassword = I('param.newPassword');

        if(md5($currPassword) != $userModel->where("uid = %s",$userId)->getField('password')){
            $this->error("原密码不匹配");
            return false;
        }else {

            if($userModel->where("uid = %s", $userId)->setField('password', md5($newPassword))){
                $this->success("修改成功$newPassword");
                return true;
            }else{
                $this->error("密码修改失败$currPassword");
                return false;
            }
        }

    }//获取数据库中的密码段并进行比较

}

?>
