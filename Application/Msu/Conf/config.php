<?php
return array(
	'DB_TYPE'               =>  'mysql',     	// 数据库类型
    'DB_HOST'               =>  'localhost',	// 服务器地址
    'DB_NAME'               =>  'new_msu',      // 数据库名
    'DB_USER'               =>  'root',      	// 用户名
    'DB_PWD'                =>  '',    // 密码
    'DB_PORT'               =>  '3306',        	// 端口
    'DB_PREFIX'             =>  'msu_',    		// 数据库表前缀

	'TMPL_L_DELIM'			=>	'<{', 			//修改左定界符
	'TMPL_R_DELIM'			=>	'}>', 			//修改右定界符

	'SHOW_PAGE_TRACE' 		=>	true,          // 显示页面Trace信息

    //邮件配置
    'THINK_EMAIL' => array(
        'SMTP_HOST' => 'email.ujn.edu.cn', //SMTP服务器
        'SMTP_PORT' => '25', //SMTP服务器端口
        'SMTP_USER' => 'webalert@ujn.edu.cn', //SMTP服务器用户名
        'SMTP_PASS' => 'webalert@2017', //SMTP服务器密码
        'FROM_EMAIL' => 'webalert@ujn.edu.cn',
        'FROM_NAME' => '网站欠费提醒', //发件人名称
        'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
        'REPLY_NAME' => '', //回复名称（留空则为发件人名称）
        ), 

	//'配置项'=>'配置值'
);