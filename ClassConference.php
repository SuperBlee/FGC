<?php
/**
* Author : SuperBlee
* 2014-12-10
* Class of Conference
* Mr. Wang wants CLASSES.
*/

require_once('CONST.php');
require_once('ClassMySQL.php');

session_start();

class Conference{

	/* 给定会议简称，查询会议id*/
	public function findConferenceID($ConferenceName){
		$mysqlconn = new ConnectMySQL();
		$cfid = $mysqlconn->searchConferenceID($ConferenceName);
		return $cfid ;
	}

	/* 给定会议id，查询会议信息，爬虫功能 */
	public function findConferenceInfo($cfid){
		$url='http://www.myhuiban.com/conference/'.$cfid;
		$linesArray=file($url); 
		$linesTotal=implode('',$linesArray);
		$linesChanged=nl2br(htmlspecialchars($linesTotal));
		preg_match_all("/content:([\\s\\S]*?)\\}\\);/",$linesChanged,$urlMatch);
		$conf_info = $urlMatch[0][0];
		$conf_info_array = explode (" + ",$conf_info);
			
		// 0 short and href---shortfailed
		preg_match("/http:(.*?)\\'/",$conf_info_array[0],$herf_m);
		$herf=str_replace("'","",$herf_m[0]);
		
		// 1 full name
		$fullname_raw = $conf_info_array[1];
		$pos = strpos($fullname_raw,'<');
		$fullname = substr($fullname_raw,6,$pos-22);
		
		// 2 submission date
		$raw = $conf_info_array[2];
		$pos = strpos($raw,'<');
		$submission = substr($raw,6,$pos-22);
		$subdate_a = explode(':',$submission);
		$subdate = $subdate_a[1];
		
		// 3 notification date
		$raw = $conf_info_array[3];
		$pos = strpos($raw,'<');
		$notification = substr($raw,6,$pos-22);
		$notdate_a = explode(':',$notification);
		$notdate = $notdate_a[1];
		
		// 4 conference date
		$raw = $conf_info_array[4];
		$pos = strpos($raw,'<');
		$conference = substr($raw,6,$pos-22);
		$confdate_a = explode(':',$conference);
		$confdate = $confdate_a[1];
		
		// 5 site
		$raw = $conf_info_array[5];
		$pos = strpos($raw,'"',7);
		$site = substr($raw,6,$pos-26);
		
		$result=array( 'http'=>trim($herf),
					   'fullname'=>trim($fullname),
					   'subdate'=>trim($subdate),
					   'notdate'=>trim($notdate),
					   'confdate'=>trim($confdate),
					   'site'=>trim($site)
						   );
		return $result ;
	}

	/* 给定会议信息，显示会议信息 */
	public function showConferenceInfo($result){
    	$_SESSION['event_date'] = $result['confdate'];
    	$_SESSION['event_site'] = $result['site'];
		echo '
			<table class="table table-striped">
				<tr>
					<td>HTTP</td>
					<td><a href="'.$result['http'].'">'.$result['http'].'</a></td>
				</tr>
				<tr>
					<td>全称</td>
					<td>'.$result['fullname'].'</td>
				</tr>
				<tr>
					<td>提交日期</td>
					<td>'.$result['subdate'].'</td>
				</tr>
				<tr>
					<td>通知日期</td>
					<td>'.$result['notdate'].'</td>
				</tr>
				<tr>
					<td>会议日期</td>
					<td>'.$result['confdate'].'</td>
				</tr>
				<tr>
					<td>地址</td>
					<td>'.$result['site'].'</td>
				</tr>
			</table>';
		//Show The Map
		echo '
		<p><strong>Google Map</strong></p>
		<iframe 
		width = "700px"
		height= "500px"
		frameborder="0"
		style="border:0" 
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBcDTJFNsl3JFOx3xixELVT7Ds9ABvSh6c&q='.$result['site'].'"></iframe>
		';
	}

	public function showDomainConference($domain){
		$mysqlconn = new ConnectMySQL();
		$res = $mysqlconn->searchDomainConference( $domain );
		echo '<table class="table table-striped">';
		foreach ($res as $lines) 
			echo '<tr> 
					<td>'.$lines['conferenceName'].'</td>
					<td>'.$lines['conferenceShortname'].'</td>
					<td>
						<form method="post" action="SeeInDetail.php">
						<input type="hidden" value="'.$lines['conferenceShortname'].'" name="detail_cn"/>
						<input type="submit" value="查看详细信息" class="btn btn-primary">
						</form> 
				  </tr>';
		echo '</table>';
	}

	public function findConferenceFullname($peace){
		$mysqlconn = new ConnectMySQL();
		$returnValue = $mysqlconn->searchConferenceName($peace);
		return $returnValue ;
	}
}