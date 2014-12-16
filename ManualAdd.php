<?php
/**
* Author : SuperBlee
* 2014-12-11
* Handle the Manually Added
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
	 <title>Add By Yourself</title>
</head>
<body>
	<div style="margin:0 20% 0 20%">
	<?php 
	    
        session_start();

	    if($_POST['ma_conferenceshortname']!=NULL||$_POST['ma_conferencename']!=NULL||$_POST['ma_conferencedate']!=NULL) {
	    	$_SESSION['event_summary'] = $_POST['ma_conferenceshortname'];
			$_SESSION['event_name'] = $_POST['ma_conferencename'];
			$_SESSION['event_date'] = $_POST['ma_conferencedate'];
	    }

		$date_explode = explode("-", $_SESSION['event_date']);

		$year = (int)$date_explode[0];
		$month = (int)$date_explode[1];
		$day = (int)$date_explode[2];

		if(count($date_explode)==3 && checkdate($month,$day,$year)){
            	
			$_SESSION['last_url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

			unset($_SESSION['event_site']);
			
			echo '<h1>您需要添加<strong>"'.$_SESSION['event_summary'].'"</strong>到您的谷歌日历吗?</h1>';
			echo '<br/>';
			echo '<h4>详细信息</h4><br/>';
			echo '<table class="table table-striped">
				<tr>
					<td>会议名称（全称）</td>
					<td>'.$_SESSION['event_name'].'</td>
				</tr>
				<tr>
					<td>会议名称（简称）</td>
					<td>'.$_SESSION['event_summary'].'</td>
				</tr>
				<tr>
					<td>会议日期</td>
					<td>'.$_SESSION['event_date'].'</td>
				</tr>
			</table>';
	 	echo '<form role="form" action="add_event.php" method="post">
				<div class="form-group">
				<input type="text" value="您的谷歌账号" placeholder="example@gmail.com" name="googleid">
				<input type="submit" value="添加到我的Google Calendar" class="btn btn-primary"/>
				</div>
			</form>';
     }
     else{
     	echo '请输入正确格式的信息。';
     }
	?>
	<h2>
	<a href="index.php"><strong>回到主页</strong></a></h2>
	</div>
</body>
</html>
