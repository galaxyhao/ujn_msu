<?php
namespace Msu\Controller;
use Think\Controller;
class MsuController extends Controller
{
	
	public function index()
    {
    	$building = M("building");
    	$builds = $building -> select();

    	$this -> assign('build1',$builds);
    	$this -> assign(' ',$builds);
    	$this -> display();
    }
    public function add_client_view()
    {
        $building = M("building");
        $builds = $building -> select();

        $this -> assign('build',$builds);
        $this -> display(add_client);
    }
    public function add_client()
    {
    	$service_client = D("ServiceClient");

    	$client['name'] = I("post.name");
    	$client['danwei'] = I("post.danwei");
    	$client['type'] = I("post.type");
    	$client['building'] = I("post.building");
    	$address['address'] = $client['address'] = I("post.address");
    	$client['number'] = I("post.number");
    	$client['mail'] = I("post.mail");
    	$client['type'] = I("post.type");

    	$client_id = $service_client -> where($address) -> getField('cid');

    	if($client_id)
    		$this -> error("该地址已有用户存在！");
    	else
    		{
    			if(!$service_client -> create($client))
    				exit($service_client -> getError());
    			else
    			{
    				$result = $service_client -> add($client);
    				if($result)
    					$this -> success("添加成功！");
    				else
    					$this -> error("添加失败！");
    			}
    		}
    }
    public function search_service_view()
    {
        $building = M("building");
        $builds = $building -> select();

        $this -> assign('build',$builds);
        $this -> display(search_service);
    }
    //查询用户服务记录
    public function search_service()
    {
    	$search_service = M("msu");

    	$name = I("post.name");
    	$danwei = I("post.danwei");
    	$building = I("post.building");
    	$start = I("post.start");
    	$finish = I("post.finish");

    	$search1['name'] = $search2['name'] = array("like","%$name%");
    	$search1['danwei'] = $search2['danwei'] = array("like","%$danwei%");
    	$search1['building'] = $search2['building']= $building;
    	$search1['end_time'] = array("between",array($start,$finish));

    	//判断building的值是否为空,若为空则模糊查询
    	if($building)
    		$search1['building'] = $search2['building']= $building;
    	else
    		$search1['building'] = $search2['building']= array('like',"%$building%");

    	//判断是否通过日期查询
    	if($start&&$finish)
    		{
    			$count = $search_service -> where($search1) -> count();
    			$Page = new \Think\Page($count1,10);
    			$show = $Page -> show();

    			$list = $search_service -> where($search1) ->  limit($Page->firstRow.','.$Page->listRows) -> field('cid') ->select();
                dump($search1); 
    		}
    	else
    		{
    			$count = $search_service -> where($search2) -> count();
    			$Page = new \Think\Page($count2,10);
    			$show = $Page -> show();

    			$list = $search_service -> where($search2) ->  limit($Page->firstRow.','.$Page->listRows) -> field('cid') -> select();
                dump($search2); 
    		} 

        $this -> assign('list',$list);
        $this -> assign('show',$show);
    }
    public function search_client_view()
    {
        $this -> display(search_client);
    }
    

}
                