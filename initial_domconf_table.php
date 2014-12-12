<?php
	require_once ('Constants.php');
	$conn=mysqli_connect($dbhost,$dbuser,$dbpw);
	if(! $conn ){
		die('Could not connect: ' . mysqli_error($conn));
	}
	mysqli_select_db($conn,"play");
	for($i=0;$i<18;$i++){
	$url = 'http://arnetminer.org/page/conference-rank/html/'.$domain_name[$i].'.html';
	$lines_array=file($url);
	$lines_total=implode('',$lines_array);
	$lines_change=htmlspecialchars($lines_total);
	preg_match_all("/url(.*?)\/a/",$lines_change,$name_match);
	$lines_res=$name_match[0];
	foreach($lines_res as $lines_res_sec){
		$lines_res_trd = substr($lines_res_sec,13,-6);
		echo $lines_res_trd.
		$sql = "INSERT INTO domain ".
		   "(domainn,confname) ".
		   "VALUES ('".addslashes($domain_name[$i])."','".addslashes($lines_res_trd)."')";
		$res = mysqli_query($conn,$sql);
		if(!$res){
			die("Can insert here".mysqli_error($conn));
		}
	}
}
	mysqli_close($conn);
?>
	