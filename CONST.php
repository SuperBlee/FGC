<?php
/** 
* Author : SuperBlee
* 2014-12-10
* CONSTANTS
* Constants needed in other php files including $domain_name and MySQL Accounts
*/
	$domain_name = array('Algorithm and Theory', //0
				  'AI',				  //1
				  'Bioinformatics',	  //2
				  'Education',		  //3
				  'DM',				  //4
				  'Database',		  //5
				  'Hardware',		  //6
				  'HCI',			  //7
				  'ML and PR',			  //8
				  'Multmedia,image,vide',	//9
				  'Network',		  //10
				  'NLP',			  //11
				  'OS',				  //12
				  'PL,SE',			  //13
				  'Robostics',		  //14
				  'Security,Privacy', //15
				  'SW,Logic',		  //16
				  'WWW,IR'			  //17
				  );

	/*
	在此记录要建造的MySQL表的项
	1、conferenceName 会议名称
	2、conferenceShortname 会议简称
	3、conferenceID 会议ID
	4、conferenceDomain 会议领域
	*/

	define("DBPW","8Izg1iKLiBpg");
	define("DBHOST","localhost");
	define("DBUSER","adminDbgJInK");
	define("DBNAME","fgc");
	define("DBTABLE","table_fgc");

	define("FILENAME","ConferenceInfo.txt");
?>