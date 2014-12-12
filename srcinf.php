			 
<html>
<head>
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
<body>

<?php
	require_once("mysql_operation.php");
	$info = $_POST['si'];
	$result = srcinf($info);
	foreach($result as $r){
		echo "http :".$r['http']."<br />".
			 "fullname :".$r['fullname']."<br />".
			 "shtname :".$r['confdate']."<br />";
	}
?>  
</body>