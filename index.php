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
		<h3><strong>�����ѯ</strong></h3>
		<p>�鿴��վ��¼���ض���ѧ�������б�</p>
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
		<h3><strong>��ȷ����</strong> </h3>
		<p> ���������ļ�ƣ��硰APEC����������������</p>
		<form role="form" method="post" action="SearchShort.php" class="sb-form">
			<input type="text" placeholder="Search" name="search_cfnm">
			<input type="submit" value="����" class="btn btn-primary">
		</form>
	</div>
	<div class="form-group sb-block">
		<h3><strong>ģ������</strong></h3>
		<p> ����������Ƶ�Ƭ��������������</p>
		<form role="form" method="post" action="SearchInformation.php" class="sb-form">
			<input type="text" placeholder="Search" name="si"/>
			<input type="submit" class="btn btn-primary" value="����">
		</form>
	</div>
	
	<div class="form-group sb-block">
		<h3><strong>�ֶ���ӻ���</strong></h3>
		<p>���������ֶ�����Լ���Ҫ�Ļ��飬Ȼ��������ӡ���ť����ע�⽫����д�ɡ�yyyy-mm-dd����ʽ����0����д�����硰2014-1-1����</p> 
		<form role="form" method="post" action="ManualAdd.php">
			<table>
				<tr>
					<td>
						<p>�������ƣ�ȫ�ƣ�</p> 
					</td>
					<td>
						<input type="text" placeholder="������������" class="sb-text" name="ma_conferencename"/> 
					</td>
				</tr>
				<tr>
					<td>
						<p >�������ƣ���ƣ�</p> 
					</td>
					<td>
						<input type="text" placeholder="���磺APEC" name="ma_conferenceshortname"/> 
					</td>
				</tr>
				<tr>
					<td>
						<p >��������</p> 
					</td>
					<td>
						<input type="text" placeholder="���磺2014-1-1" name="ma_conferencedate"/><br />
					</td>
				</tr>
				<tr>
					<td>	
						<input type="submit" class = "btn btn-primary" value ="���"> 
					</td>
				</tr>
			</table>
		</form>
	</div>

</div>
<div class="sb-right">
	<p>���������Թ�������ҵ��ѧ�����ѧԺ12���������SuperBlee�����θ�(Sudden Chive)������(Fang Bro)����л����������Ʒ�Ĺ�����</p>
	<p>Connect Us on Github:<a href="https://github.com/SuperBlee/FGC">https://github.com/SuperBlee/FGC</a></p>
</div>
</div>
</body>
</html>


