			 
<html>
<head>
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