<!DOCTYPE HTML>
	<head>
   <title>login</title>
   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<div class="container" style="width:70%">
	<div class="form-group pull-left" style="width:20%">
	<form role="form" method="post" action="showlist.php" >
	<select class="form-control" name="shit">
       <option value="at">Algorithm and Theory</option>
	   <option value="ai">AI</option>
	   <option value="bi">Bioinformatics</option>
	   <option value="ed">Education</option>
	   <option value="dm">DM</option>
	   <option value="da">Databases</option>
	   <option value="ha">Hardware</option>
	   <option value="hc">HCI</option>
	   <option value="ml">ML and PR</option>
	   <option value="mu">Multmedia,image,video</option>
	   <option value="ne">Network</option>
	   <option value="nl">NLP</option>
	   <option value="os">OS</option>
	   <option value="pl">PL,SE</option>
	   <option value="ro">Robostics</option>
	   <option value="se">Security,Privacy</option>
	   <option value="sw">SW,Logic</option>
	   <option value="ww">WWW,IR</option>
    </select>
	<input type="submit" class="btn btn-success" value="选择">
	</form>
	</div>
	<?php
	 for($i=0;$i<10;$i++)
		echo '<br />';
	?>
	<div class="form-group" style="width:15%">
	<p> I want to search!</p>
	<form role="form" method="post" action="searchConf.php" >
		<input type="text" placeholder="Conference Name" name="confname">
		<input type="submit" value="search" class="btn btn-primary">
	</form>
	</div>
	
	<?php
	 for($i=0;$i<10;$i++)
		echo '<br />';
	?>
	<form role="form" method="post">
	<button class="btn btn-warning"><a href="updateDB.php">UPDATE the DB</a></button>
	</div>
	</body>
	</html>
	