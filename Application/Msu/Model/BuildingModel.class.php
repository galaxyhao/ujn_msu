<?php
namespace Msu\Model;
use Think\Model;
class BuildingModel extends Model
{
	protected $_validate = array(
		array('name','require','楼号不能为空',0,'require',1),
		array('type',array('职工楼','办公楼'),'类型输入不正确',0,'in'),
		);
}
?>