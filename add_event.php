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
		
		$login_url = 'https://fgc-jiucai.rhcloud.com/log-aut.php';
		session_start();
		
		if($_POST['googleid']!=NULL) {
			$_SESSION['user_id'] = $_POST['googleid'];
		}
 		
 		if(isset($_SESSION['access_token']) && $_SESSION['access_token']) {
			
			$str = json_decode($_SESSION['access_token'],TRUE);
	    	$token = $str['access_token'];
			
			$header = array(
		        'Content-Type:  application/json',
	        	'Authorization:  Bearer '.$token,
	        	'X-JavaScript-User-Agent:  Google APIs Explorer'
	        );
			
			if(isset($_SESSION['event_site'])){
				$temp_data = array('end' => array('date' => $_SESSION['event_date']), 'start' => array('date' => $_SESSION['event_date']), 'summary' => $_SESSION['event_summary'], 'location' => $_SESSION['event_site']);
			} else {
				$temp_data = array('end' => array('date' => $_SESSION['event_date']), 'start' => array('date' => $_SESSION['event_date']), 'summary' => $_SESSION['event_summary']);
			}
		    
		    $data = json_encode($temp_data);
		   		    
		    $url = 'https://www.googleapis.com/calendar/v3/calendars/'.$_SESSION['user_id'].'/events?sendNotifications=false&maxAttendees=1&key=AIzaSyBcDTJFNsl3JFOx3xixELVT7Ds9ABvSh6c';
		    
		    $ch = curl_init();
		 
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    curl_setopt($ch, CURLOPT_POST, TRUE);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		    
		    $response = curl_exec($ch);
		    $error = curl_error($ch);
		    curl_close($ch); 
		    
		    $php_res = json_decode($response,TRUE);		    
		    
		    if(array_key_exists('error',$php_res)) {
				if($php_res['error']['errors']['0']['reason'] == 'notFound'||$php_res['error']['errors']['0']['reason'] == 'forbidden'){
					echo '<div style="margin:0 20% 0 20%">
		        		<a href = '.$_SESSION['last_url'].'><h1>输入错误的账号，请重新输入</h1></a>
				    	</div>';
				  } else {
				  		unset($_SESSION['access_token']); 
						echo '<div style="margin:0 20% 0 20%">
		        	  		<a href = \''.$login_url.'\'><h1>会话过期，请重新授权</h1></a>
				      		</div>';
				  }
				
		    }
		    
		    else{
		    	
 				
 				$event_Link = $php_res['htmlLink'];
		    	
		    	echo "<div style=\"margin:0 20% 0 20%\">
		        	  <h1>添加成功</h1>
				      </div>";
		    	
		    	echo "<div style=\"margin:0 20% 0 20%\">
		        	  <h3><a href = $event_Link ><strong>编辑日历事件</strong></a><h3>
				      </div>";
				echo "<div style=\"margin:0 20% 0 20%\">
		        	  <h3><a href = \"index.php\"><strong>回到主页</strong></a><h3>
				      </div>";
		    }  
		}
		else {
				echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=$login_url\">";  
		}
	?>
</body>
</html>