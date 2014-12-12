<?php	
		function findConfInfo($conf_name){
		//$conf_name = "shit";
		$docroot = $_SERVER['DOCUMENT_ROOT'];
		$url1='http://www.myhuiban.com/search?SearchForm%5Bkey%5D='.$conf_name; 
		$lines_array1=file($url1); 
		$lines_total1=implode('',$lines_array1);
		$lines_changed1 = htmlspecialchars($lines_total1);
		preg_match_all("/conference\/[0-9]+/",$lines_changed1,$url_match1);
		if(!empty($url_match1[0])){
			$url_array1 = $url_match1[0];
			$a = $url_array1[0];
			$url2='http://www.myhuiban.com/'.$a;
			$lines_array2=file($url2); 
			$lines_total2=implode('',$lines_array2);
			$lines_changed2=nl2br(htmlspecialchars($lines_total2));
			preg_match_all("/content:([\\s\\S]*?)\\}\\);/",$lines_changed2,$url_match2);
			$conf_info = $url_match2[0][0];:
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
			
			$result=array( 'shtname'=>trim($conf_name),
						   'http'=>trim($herf),
						   'fullname'=>trim($fullname),
						   'subdate'=>trim($subdate),
						   'notdate'=>trim($notdate),
						   'confdate'=>trim($confdate),
						   'site'=>trim($site)
						   );
		}else{
			$result = null;
		}
		return $result;}
	?>
	