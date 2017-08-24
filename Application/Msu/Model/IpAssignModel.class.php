<?php
namespace Msu\Model;
use Think\Model;
class IpAssignModel extends Model
{
	protected $tableName = 'ip_assign';
	protected $_validate = array(
		array('ip','require','ip地址不能为空',0,'require',1),
		array('user','require','使用者不能为空'),
		array('ip','((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))','ip输入格式错误'),
		array('user','0,10','使用者长度输入不合法','0','length'),
		array('number','number','联系方式输入不合法'),
		array('user','0,20','联系方式长度输入不合法','0','length'),
		array('note','0,50','备注输入不合法',0,'length'),
		);
}
?>