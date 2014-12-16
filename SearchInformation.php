<!DOCTYPE html>
<html>
<head>
	<?php
	 require_once('ClassFramework.php'); 
	 $echohead = new Framework();
	 $echohead->headbootstrap();
	 $echohead->headcontent();
	 ?>
	 <title>Search Full Name</title>
</head>
<body>
<div style="margin:0 20% 0 20%">
	<?php
	/** 
	* @Author : SuperBlee
	* 2014-12-11
	* Search Information of The Conference Full Name
	*/	
	require_once('ClassConference.php');

	$searchinfo = $_POST['si'];
	if(!empty($searchinfo)){
		$searchinfo_conf = new Conference();
		$res = $searchinfo_conf->findConferenceFullname($searchinfo);
		if($res!=null){
			
			echo '<table class="table table-striped">';
			foreach ($res as $resline) {
				echo '<tr>
							<td>'.$resline['conferenceShortname'].'</td>
							<td>'.$resline['conferenceName'].'</td>
							<td>
								<form method="post" action="SeeInDetail.php">
									<input type="hidden" value="'.$resline['conferenceShortname'].'" name="detail_cn">
									<input type="submit" value="See And Add To Google Calendar" class="btn btn-primary">
								</form>
							</td>
					  </tr>';
			}
			echo '</table>';
		}
		else{
			echo '<p> �Բ���û���ҵ�����Ҫ����Ϣ��</p>';
		}
	}
	else{
		echo '<p>����д��Ϣ</p>';
	}
?>
<h2>
<a href="index.php"><strong>�ص���ҳ</strong></a></h2>
</div>
</body>
</html>

