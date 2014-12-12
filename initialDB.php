<?php
//This page is for initializing the Database
require('findConfInfo.php');
require('mysql_operation.php');
require_once('Constants.php');
$docroot = $_SERVER['DOCUMENT_ROOT'];
foreach($domain_name as $domain){
	$url = 'http://arnetminer.org/page/conference-rank/html/'.$domain.'.html';
	$lines_array=file($url);
	$lines_total=implode('',$lines_array);
	$lines_change=htmlspecialchars($lines_total);
	preg_match_all("/url(.*?)\/a/",$lines_change,$name_match);
	$lines_res=$name_match[0];	
	foreach($lines_res as $lines_res_sec){
		$lines_res_trd = substr($lines_res_sec,13,-6);
		$conf_info = findConfInfo($lines_res_trd);
		if(!is_null($conf_info)) addDB($conf_info);
	}
}
?>