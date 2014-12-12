<html>
<head>
   <title>login</title>
   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
   <style type="text/css">
	body{
	background-image: url(00.jpg);	
	background-repeat:y;
	background-attachment:fixed;
	background-size:1400px 800px;
	top:250px;   /* 输入框于原位置向下偏移100px  */    
	left:300px;    /*  输入框于原位置向右偏移300px  */
	text-align:center;
    padding:150px 100px; 	
	font-family:"微软雅黑";
}
</style>
</head>
<?php
	/*
	TO DO
	Cannot USE web!
	*/
	require("Constants.php");
	require("mysql_operation.php");
    $domainnum = $_POST['domainnum'];
	$domainname = $domain_name[$domainnum];
	$domaindetail = showDM($domainname);
	foreach($domaindetail as $dd){
		echo $dd.
		"<form action=\"showinformation.php\" method=\"post\">".
		"<input type=\"hidden\" value=\"".$dd."\" name=\"cfnm\">".
		"<input type=\"submit\" value=\"Search\" class=\"btn btn-primary\"></form>";
	}
  ?>
  
  </html>