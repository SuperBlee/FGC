<?php
/** 
* @author : SuperBlee
* 2014-12-11
* Handle the request of Search : Input Abbreviation Output Detailed List
* 
* @param searchShortname : Shortname of the Conference Being Searched
*��@param searchconf_id : The ID of the Conference
* @param searchconf_res : What The PaChong returns
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
	 <title>Searching</title>
</head>
<body>
<div style="margin:0 20% 0 20%">
<p><strong>�������</strong></p>
<?php


require_once('ClassConference.php'); 

$searchShortname = $_POST['search_cfnm'];
$searchconf = new Conference();
$searchconf_id = $searchconf->findConferenceID($searchShortname);
if($searchconf_id!=null){
	
    session_start();
	
	$_SESSION['last_url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

	$searchconf_res = $searchconf->findConferenceInfo($searchconf_id);
	$searchconf->showConferenceInfo($searchconf_res);
	echo 
	'<div>
	<!-- This Shit Part Is the API to  Google. Where it F google-->
		<form role="form" action="add_event.php" method="post">
			<div class="form-group">
			<input type="text" value="���Ĺȸ��˺�" placeholder="example@gmail.com" name="googleid">
			<input type="submit" value="��ӵ��ҵ�Google Calendar" class="btn btn-primary"/>
			</div>
		</form>
	</div> ';
}
else{
	echo
	'<div>
	<p>�Բ���û���ҵ�����Ҫ����Ϣ��</p>
	</div>';
}
?>
<h2>
<a href="index.php"><strong>�ص���ҳ</strong></a></h2>
</div>

</body>

</html>



