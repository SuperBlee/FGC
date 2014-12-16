<?php
/** 
* Author : SuperBlee
* 2014-12-11
* These code are used for test
*/

$test_conf_id     = 407;
$test_conf_info   = "Pattern" ; 
$test_conf_domain = "Apple" ;
$test_conf_stn    = "CVPR" ;

require_once('ClassMySQL.php');
require_once('ClassConference.php') ;

/*对两个类的测试*/
$testdb = new ConnectMySQL();

/*MySQL类测试；
  方法 : 初始化
		 搜索id（详细）
		 搜索名称（模糊）
		 搜索领域
*/
 $testdb->createTable();
 $testdb->initialTable();//初始化 CHECKED!

/*
$test_conf_info_res   = $testdb->searchConferenceName($test_conf_info);//查找名称
print_r($test_conf_info_res); 
echo "<br/>";
*/

/*
$test_conf_stn_res    = $testdb->searchConferenceID($test_conf_stn); //shortname->id
print_r($test_conf_stn_res) ;
echo "<br/>";
*/

/*
$test_conf_domain_res = $testdb->searchDomainConference($test_conf_domain);//查找领域
print_r($test_conf_domain_res) ;
echo "<br/>";


/*Conference类测试 ；
  方法 : findConferenceID($name) 给简称，查id check!
   		 fineConferenceInfo($cfid) 给id，爬虫  check!
   		 showConferenceInfo($result) 给result，显示出来，html
   		 showDomainConference($domain) 给Domain，显示出来，html
*/

/*
$testconf = new Conference();


$id = $testconf->findConferenceID($test_conf_stn); 
$testconf->showConferenceInfo(($testconf->findConferenceInfo($id)));

 $testconf->showDomainConference($test_conf_domain);

*/





?>