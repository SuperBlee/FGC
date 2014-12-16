<?php
/** 
* Author : SuperBlee
* 2014-12-13
* 南京大屠杀公祭日
* The Framework of the Webpage
*/

class Framework
{
	public function headbootstrap(){
		echo <<<end
		<link rel="stylesheet" type="text/css" href="Face.css">
		<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	    <meta http-equiv="Content-Type" content="text/html; charset=gbk">
end;
	}

	public function headcontent(){
		echo <<<end
		<div class="b sb-head">
			<div class="b sb-center">
				<div class="b sb-header">
					<p class="b sb-header-title"> FGC--Your Best Conference Helper</p>
					<p class="b sb-header-subtitle">Designed By SuperBlee, Sudden Chive, Fang Bro in HIT</p>
				</div>
				<div class="b sb-header">
					<img class="sb-headimage" src="image1.png">
				</div>
			</div>
		</div>
		<hr/>
end;
	}

}