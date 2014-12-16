<?php
/**
* Author : SuperBlee
* 2014-12-10
* The HomePage of FGC
* (F**k the teacher who make me out of room 8XX. He's sh*t!)
*/
?>

<!DOCTYPE HTML>
<html>

<head>
   

   <link rel="stylesheet" type="text/css" href="Face.css">

   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <meta http-equiv="Content-Type" content="text/html; charset=gbk">
   <title>FGC--Your Academy Calendar</title>
</head>
<body>


<!-- This part is the Head-->
<?php
	require_once('ClassFramework.php');
	$content = new Framework();
	$content->headcontent();
?>

<div class="sb-bigcontainer">
<div class="b sb-container">
	<div class="form-group sb-block" >
		<h3><strong>领域查询</strong></h3>
		<p>查看网站收录的特定的学术会议列表</p>
		<form role="form" method="post" action="ConferenceList.php" class="sb-form">
			<select class="form-control" name="domainnum">
		       <option value="0">Algorithm and Theory</option>
			   <option value="1">AI</option>
			   <option value="2">Bioinformatics</option>
			   <option value="4">DM</option>
			   <option value="5">Database</option>
			   <option value="6">Hardware</option>
			   <option value="7">HCI</option>
			   <option value="8">ML and PR</option>
			   <option value="9">Multmedia,image,video</option>
			   <option value="10">Network</option>
			   <option value="11">NLP</option>
			   <option value="12">OS</option>
			   <option value="13">PL,SE</option>
			   <option value="14">Robostics</option>
			   <option value="15">Security,Privacy</option>
			   <option value="16">SW,Logic</option>
			   <option value="17">WWW,IR</option>
		    </select>
			<input type="submit" class="btn btn-success sb-button" value="  Go  ">
		</form>
	</div>

	<div class="form-group sb-block" >
		<h3><strong>精确搜索</strong> </h3>
		<p> 请输入会议的简称（如“APEC”）来进行搜索。</p>
		<form role="form" method="post" action="SearchShort.php" class="sb-form">
			<input type="text" placeholder="Search" name="search_cfnm">
			<input type="submit" value="搜索" class="btn btn-primary">
		</form>
	</div>
	<div class="form-group sb-block">
		<h3><strong>模糊搜索</strong></h3>
		<p> 输入会议名称的片段来进行搜索。</p>
		<form role="form" method="post" action="SearchInformation.php" class="sb-form">
			<input type="text" placeholder="Search" name="si"/>
			<input type="submit" class="btn btn-primary" value="搜索">
		</form>
	</div>
	
	<div class="form-group sb-block">
		<h3><strong>手动添加会议</strong></h3>
		<p>您还可以手动添加自己需要的会议，然后点击“添加”按钮。请注意将日期写成“yyyy-mm-dd”形式（“0”不写，例如“2014-1-1”）</p> 
		<form role="form" method="post" action="ManualAdd.php">
			<table>
				<tr>
					<td>
						<p>会议名称（全称）</p> 
					</td>
					<td>
						<input type="text" placeholder="会议完整名称" class="sb-text" name="ma_conferencename"/> 
					</td>
				</tr>
				<tr>
					<td>
						<p >会议名称（简称）</p> 
					</td>
					<td>
						<input type="text" placeholder="例如：APEC" name="ma_conferenceshortname"/> 
					</td>
				</tr>
				<tr>
					<td>
						<p >会议日期</p> 
					</td>
					<td>
						<input type="text" placeholder="例如：2014-1-1" name="ma_conferencedate"/><br />
					</td>
				</tr>
				<tr>
					<td>	
						<input type="submit" class = "btn btn-primary" value ="添加"> 
					</td>
				</tr>
			</table>
		</form>
	</div>

</div>
<div class="sb-right">
	<p>我们是来自哈尔滨工业大学计算机学院12级的李泽宇（SuperBlee），宋戈(Sudden Chive)和李舫(Fang Bro)。感谢您对我们作品的鼓励！</p>
	<p>Connect Us on Github:<a href="https://github.com/SuperBlee/FGC">https://github.com/SuperBlee/FGC</a></p>
</div>
</div>
</body>
</html>


