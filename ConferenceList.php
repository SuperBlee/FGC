<?php
/**
* Author : SuperBlee
* 2014-12-10
* List the Conference
*/
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	 require_once('ClassFramework.php'); 
	 $echohead = new Framework();
	 $echohead->headbootstrap();
	 $echohead->headcontent();
	 ?>
	 <title>Conference List</title>
</head>
<body>
	<div style="margin:0 20% 0 20%">
	<h1>�����б�</h1>
	<?php	
	require_once('CONST.php');
	require_once('ClassConference.php');

	$domainnum = $_POST['domainnum'];
	$ConferenceDomain = $domain_name[$domainnum];
		
	$ConferenceList = new Conference() ;
	$ConferenceList->showDomainConference($ConferenceDomain);
	?>
	<h2>
	<a href="index.php"><strong>�ص���ҳ</strong></a></h2>
	</div>

</body>
</html>
