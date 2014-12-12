<!DOCTYPE HTML>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>login</title>
   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
   <style type="text/css">
	body{
	background-image: url(00.jpg);	
	background-repeat:y;
	background-attachment:fixed;
	background-size:1400px 800px;
}

	h2{
	font-family:"MV Boli";
}

	div{
	top:100px;   /* 输入框于原位置向下偏移100px  */    
	left:300px;    /*  输入框于原位置向右偏移300px  */
	text-align:center;
	padding:100px 100px; 
}

.move{
margin-left: 457px;
}
</style>
</head>
<body>
<div>
	<h2> what do you want</h2>
	<form role="form" method="post" action="showlist.php" style="width:20%" class="move">
	<select class="form-control" name="domainnum">
       <option value="0">Algorithm and Theory</option>
	   <option value="1">AI</option>
	   <option value="2">Bioinformatics</option>
	   <option value="3">Education</option>
	   <option value="4">DM</option>
	   <option value="5">Databases</option>
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
	</br>
	<input type="submit" class="btn btn-success" value="add" style="width:50%"/>
	</form>
	<?php
	 for($i=0;$i<3;$i++)
		echo '<br />';
	?>
	<!-- <div class="form-group" style="width:20%"> -->
	<h2> i want to search</h2>
	<form role="form" method="post" action="showinformation.php" />
		<input type="text" placeholder="Conference Name" name="cfnm"/>
		<input type="submit" value="search" class="btn btn-primary">
	</form>
	<!-- </div> -->
	
	<?php
	 for($i=0;$i<1;$i++)
		echo '<br />';
	?>	
	<form role="form" method="post" action="srcinf.php">
	<input type="text" placeholder="Search Information" name="si" >
	<input type="submit" class="btn btn-primary" value="search">
	</form>
	
	
	<form role="form" method="post">
	<br/><br/>
	<button class="btn btn-warning" style="border-radius:20px;"/><a href="updateDB.php">UPDATE the DB</a></button>
	<button class="btn btn-danger" style="border-radius:20px;"/><a href="initailDB.php">INITIAL the DB</a></button>
	<button class="btn btn-danger" style="border-radius:20px;"/><a href="initial_domconf_table.php">INITIAL the name</a></button>
	</form>
	</div>
	</body>
	</html>
	