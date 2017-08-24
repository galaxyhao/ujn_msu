<?php
namespace Msu\Model;
use Think\Model;
class ServiceClientModel extends Model
{
	protected $_validate = array(
		array('name','require','姓名不能为空',0,'require',1),
		array('address','require','住址不能为空',0,'require',1),
		array('number','require','联系电话不能为空',0,'require',1),
		array('mail','email','邮箱格式不正确'),
		array('number','number','联系电话格式不正确'),
		);
}
?>