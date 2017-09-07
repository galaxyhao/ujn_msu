<?php
namespace Msu\Controller;
use Think\Controller;
class EmptyController extends Controller
{
	public function index()
	{
		$this->display('/404');
	}
	
}
?>