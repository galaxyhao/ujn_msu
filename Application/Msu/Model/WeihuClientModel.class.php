<?php
namespace Msu\Model;
use Think\Model;
class WeihuClientModel extends Model
{
	protected $tableName = 'weihu_client';
	protected $_validate = array(
		array('name','require','名字不能为空'),
		array('building','require','楼号不能为空'),
		array('room','require','房间号不能为空'),
		array('numbers','number','手机号必须为数字'),
		array('building','1,6','楼号输入不合法','0','length'), 
		array('room','1,5','房间号输入不合法','0','length'),
		);
}
?>