<html>
<head>
</head>
<body>
<style type="text/css">
	body{
	background-image: url(00.jpg);	
	background-repeat:y;
	background-attachment:fixed;
	background-size:1400px 800px;
	top:250px;   /* �������ԭλ������ƫ��100px  */    
	left:300px;    /*  �������ԭλ������ƫ��300px  */
	text-align:center;
    padding:150px 100px; 	
	font-family:"΢���ź�";
}
</style>
<?php
require_once ("findConfInfo.php");
require_once("mysql_operation.php");
	$cfnm=$_POST['cfnm'];
	$res = srchDB($cfnm);
	echo  "Shorter Name :".$res['shtname']."<br />".
		  "HTTP :"."<a href=\"".$res['http']."\">".$res['http']."</a><br />".
		  "Full Name :".$res['fullname']."<br />".
		  "Submission Date :".$res['subdate']."<br />".
		  "Notification Date :".$res['notdate']."<br />".
		  "Conference Date  :".$res['confdate']."<br />".
		  "Site :".$res['site']."<br />";
?>
<a href="index.php">BACK TO INDEX</a>	  
</body>