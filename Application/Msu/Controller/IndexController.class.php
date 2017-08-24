<?php
namespace Msu\Controller;
use Think\Controller;
class IndexController extends RootController 
{
    public function index()
    {
        $this -> redirect('Weihu/weihu_list');
    }
}