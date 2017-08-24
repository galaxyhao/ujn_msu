<?php
namespace Msu\Model;
use Think\Model;
class DnsModel extends Model
{
	protected $_validate = array(
		array('DNS_first','((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))','首选DNS输入格式错误'),
		array('DNS_second','((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d))))','备选DNS输入格式错误'),
		);
}
?>