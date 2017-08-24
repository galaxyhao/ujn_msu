<?php
namespace Msu\Model;
use Think\Model;
class RecordModel extends Model
{
	protected $tableName = 'weihu_records';
	protected $_validate = array(
		array('note','0,100','备注输入不合法','0','length'),
		array('solution','2,100','解决方式长度不合法','0','length'),
		array('status','完成,未完成','状态提交不正确','0','in'),
		array('type','number','类型提交不正确'),
		);
}
?>