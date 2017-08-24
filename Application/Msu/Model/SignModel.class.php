<?php
namespace Msu\Model;
use Think\Model;
class SignModel extends Model
{
	protected $_validate = array(
		array('note','0,50','报警说明输入不合法','0','length'),
		);
}
?>