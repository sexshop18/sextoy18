<?php if(!defined('_lib')) die("Error");

	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	$config_url=$_SERVER["SERVER_NAME"].'';	
	
	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'sextoy18_db';
	$config['database']['password'] = 'dga.u0nvrqi$';
	$config['database']['database'] = 'sextoy18_db';
	$config['database']['refix'] = 'table_';
	
	$ip_host = '127.0.0.1';
	$mail_host = 'noreply@shopkiss.vn';
	$pass_mail = 'V7HvGLDm';

	$config['lang']=array(''=>'Tiếng Việt');#Danh sách ngôn ngữ hỗ trợ
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');

?>