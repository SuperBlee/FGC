<?php
/**
	* Author : SuperBlee
	* 2014-12-10
	* See In Detail a Conference And Add to the Google Calendar
	* dcn : Detailed Conference Name
	* dcn_id : Detailed Conference Name ID
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
	 <title>Detail Information</title>
</head>
<body>
	<div style="margin:0 20% 0 20%">
	<?php
	require_once('ClassConference.php');

	session_start();
	
	$_SESSION['last_url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	
	if($_POST['detail_cn']!=NULL) {
		$_SESSION['event_summary'] =$_POST['detail_cn'];
	}
	echo '<h1>'.$_SESSION['event_summary'].'</h1>';
	
	$detailconference = new Conference();

	$dcn_id = $detailconference->findConferenceID($_SESSION['event_summary']);
	$dcn_id_res = $detailconference->findConferenceInfo($dcn_id);
	$detailconference->showConferenceInfo($dcn_id_res);
	?>
	<div>
		<form role="form" action="add_event.php" method="post">
			<div class="form-group">
			<p>您的google账号</p>
			<input type="text" placeholder="example@gmail.com" name="googleid">
			<input type="submit" value="添加到您的Google Calendar" class="btn btn-primary"/>
			</div>
		</form>
	</div>
	<h3>
	<a href="index.php"><strong>回到主页</strong></a></h3>
	</div>
</body>
</html>
	
