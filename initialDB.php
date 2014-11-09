<?php
//This page is for initializing the Database
require('wget_index.php');
require('mysql_operation.php');
$domain_name = array('Algorithm&Theory', //0
				  'AI',				  //1
				  'Bioinformatics',	  //2
				  'Education',		  //3
				  'DM',				  //4
				  'Databases',		  //5
				  'Hardware',		  //6
				  'HCI',			  //7
				  'ML&PR',			  //8
				  'Multmedia,image,video',	//9
				  'Network',		  //10
				  'NLP',			  //11
				  'OS',				  //12
				  'PL,SE',			  //13
				  'Robostics',		  //14
				  'Security,Privacy', //15
				  'SW,Logic',		  //16
				  'WWW,IR'			  //17
				  );
		$docroot = $_SERVER['DOCUMENT_ROOT'];
		foreach($domain_name as $domain){
			//$domain = $domain_name[17];
			$url = 'http://arnetminer.org/page/conference-rank/html/'.$domain.'.html';
			$lines_array=file($url);
			$lines_total=implode('',$lines_array);
			$lines_change=htmlspecialchars($lines_total);
			preg_match_all("/url(.*?)\/a/",$lines_change,$name_match);
			$lines_res=$name_match[0];	
			foreach($lines_res as $lines_res_sec){
			//for($i=0;$i<5;$i++){
				//$lines_res_trd = substr($lines_res[$i],13,-6);
				$lines_res_trd = substr($lines_res_sec,13,-6);
				$conf_info = findConfInfo($lines_res_trd);
				if(!is_null($conf_info)) addDB($conf_info);
			}
		}
?>