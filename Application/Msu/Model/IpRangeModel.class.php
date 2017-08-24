<?php
namespace Msu\Model;
use Think\Model;
class IpRangeModel extends Model
{
	protected $tableName = 'ip_range';
	protected $_validate = array(
		array('start','require','起始地址不能为空','','',3),
		array('finish','require','结束地址不能为空','','',3),
		array('start','((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))','起始ip输入格式错误',1,'regex',3),
		array('finish','((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))','终止ip输入格式错误',1,'regex',3),
		array('note','0,50','备注输入不合法',0,'length',3),
		);
}
?>