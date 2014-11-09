<?php
require_once ("wget_index.php");

function addDB($result)
{
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = '19930903';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
	  die('Could not connect: ' . mysqli_error($conn));
	}
	
	$sql = "INSERT INTO confinfo2 ".
		   "(shtname,http,fullname,subdate,notdate,confdate,site) ".
		   "VALUES "."('".
		   addslashes($result['shtname'])."','".
		   addslashes($result['http'])."','".
		   addslashes($result['fullname'])."','".
		   addslashes($result['subdate'])."','".
		   addslashes($result['notdate'])."','".
		   addslashes($result['confdate'])."','".
		   addslashes($result['site'])."')";
	
	echo $sql;
	
	mysqli_select_db($conn,"play");
	$retval = mysqli_query( $conn, $sql );
	if(! $retval ){
	  die('Could not enter data: ' . mysqli_error($conn));
	}
	//echo "Entered data successfully\n";
	mysqli_close($conn);
}

function updtDB($conf_name)
{
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = '19930903';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(! $conn ){
	  die('Could not connect: ' . mysqli_error($conn));
	}
	
	$sql = "SELECT shtname,http,fullname,subdate,notdate,confdate,site FROM confinfo2 WHERE shtname='".$conf_name."'";
	echo $sql;
	mysqli_select_db($conn,"play");
	$retval = mysqli_query($conn,$sql);
	if(! $retval ){
	  die('Could not get data: ' . mysqli_error($conn));
	}
	$row = mysqli_fetch_array($retval, MYSQL_ASSOC);
	$newinfo = findConfInfo($conf_name);
	if($row != $newinfo){
		//UPDATE table_name SET field1=new-value1, field2=new-value2
		$sql2="UPDATE confinfo2 SET http='".$newinfo['http'].
			   "',fullname='".$newinfo['fullname'].
			   "',subdate='".$newinfo['subdate'].
			   "',notdate='".$newinfo['notdate'].
			   "',confdate='".$newinfo['confdate'].
			   "',site='".$newinfo['site']."' WHERE shtname='".$conf_name."'";
		echo  $sql2;
		$retval2=mysqli_query($conn,$sql2);
		if(!$retval2){
			die('Could not update: '.mysqli_error($conn));
		}
	}
	mysqli_close($conn);	
	//print_r($row);
	} 
	
?>