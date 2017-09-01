<?php
namespace Msu\Model;
use Think\Model\ViewModel;
class WebViewModel extends ViewModel {
  protected $connection = array(
    'db_type'  => 'mysql',
    'db_user'  => 'msutest',
    'db_pwd'   => 'Unfw832dfnnm',
    'db_host'  => '192.168.253.4',
    'db_port'  => '3306',
    'db_name'  => 'msu',
    'db_charset' => 'GBK',
    'db_params' =>  array(), // 非必须
);
   public $viewFields = array(
     'DnsList'=>array('_table'=>"new_dnslist",'dnsname','syqx','fwqwlwz','zgldxm','zgldbgdh','fgldxm','fgldbgdh','whyxm','whybgdh','whyemail','bz','_type'=>'LEFT'),
     'WebMoney'=>array('_table'=>"new_webmoney",'startdate','enddate','money','user','webname','_on'=>'DnsList.dnsname=domin')
   );
 }