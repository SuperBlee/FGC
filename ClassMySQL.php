<?php
/**
* Author : SuperBlee
* 2014-12-10
* Class of MySQL
* Funtions:
* 		   1-模糊搜索会议名称
*		   2-给定简称搜索id
*		   3-初始化数据库
*/

require_once('CONST.php');

class ConnectMySQL{
	private $databaseHost ;
	private $databaseUser ;
	private $databasePassword ;
	private $databaseName ;
	private $databaseTable ;

	public function __construct(){
		$this->databasePassword = DBPW ;
		$this->databaseUser	    = DBUSER ;
		$this->databaseHost     = DBHOST ;
		$this->databaseName 	= DBNAME ;
		$this->databaseTable 	= DBTABLE ;
	}

	/* 粗略搜索会议名称 
	   @param  $info : 会议名称片段
	   返回粗略搜索值*/
	public function searchConferenceName($info){
		$sql = "SELECT conferenceName , conferenceShortname FROM table_fgc WHERE conferenceName LIKE'%".$info."%'";
		$returnValue = $this->MySQLFunctionMuti( $sql ) ;
		return $returnValue ;
	}

	/* 精确搜索会议ID 
	   @param $conf_name : 会议简写
	   返回会议的ID*/
	public function searchConferenceID($conf_name){
		$sql = "SELECT conferenceID FROM table_fgc WHERE conferenceShortname='".$conf_name."'" ;
		//$returnValue = $this->MySQLFunctionSingle( $sql ) ;
		$returnValue = $this->MySQLFunctionMuti( $sql ) ;
		$returnValue_id = $returnValue[0]['conferenceID'];
		return $returnValue_id ;
	}

	/* 用文件初始化数据库 */
	public function initialTable(){
		$ConferenceArray = file(FILENAME);
		$together = implode("", $ConferenceArray);
		$newArray = explode(";", $together);
		foreach ($newArray as $line) {
			$lineArray = explode("==", $line);
			$sql = "INSERT INTO table_fgc (conferenceName,conferenceShortname,conferenceID,conferenceDomain) VALUES "."('".
		   			addslashes($lineArray[2])."','".
		   			addslashes($lineArray[0])."','".
					addslashes($lineArray[1])."','".
					addslashes($lineArray[3])."')";
			$this->MySQLFunctionSingle( $sql ) ;
		}
	}

	/*给定领域名称，查询全部领域会议*/
	public function searchDomainConference($conf_domain){
		$sql = "SELECT conferenceName , conferenceShortname FROM table_fgc	 WHERE conferenceDomain ='".$conf_domain."'";
		$returnValue = $this->MySQLFunctionMuti( $sql ) ;
		return $returnValue ;
	}

	public function createTable(){
		$temp_databasename = "fgc";
		$sql1 = "create database ".$temp_databasename;
		$this->MySQLFunctionSingle($sql1);

		$sql3 = "create table table_fgc(
				numID int not null auto_increment,
				conferenceName varchar(100) not null,
				conferenceShortname varchar(20) not null,
				conferenceID varchar(20) not null,
				conferenceDomain varchar(30) not null,
				primary key(numID)
				)";
		$this->MySQLFunctionSingle($sql3);

	}

	/* 在数据库中进行单次操作时使用的方法 */
	private function MySQLFunctionSingle( $sql ){
		$conn = mysqli_connect( $this->databaseHost , $this->databaseUser , $this->databasePassword );
		if(! $conn ){
	  		die('Could not connect: ' . mysqli_error( $conn )) ;
		}
		mysqli_select_db( $conn , $this->databaseName );
		$returnValue = mysqli_query( $conn , $sql );
		if(! $returnValue ){
	 	 	die('Could not make Query: ' . mysqli_error( $conn ));
		}
		mysqli_close( $conn );
		return $returnValue ;
	}

	/* 在数据库中查询多个值时使用的方法 */
	private function MySQLFunctionMuti( $sql ){
		$conn = mysqli_connect( $this->databaseHost , $this->databaseUser , $this->databasePassword );
		if(! $conn ){
	  		die('Could not connect: ' . mysqli_error( $conn )) ;
		}
		mysqli_select_db( $conn , $this->databaseName );
		$res = mysqli_query( $conn , $sql );
		if(! $res ){
	 	 	die('Could not make Query: ' . mysqli_error( $conn ));
		}

		if( $res->num_rows == 0 )
			$returnValue = null;
		else{
			$i = 0;
			while( $row = mysqli_fetch_array( $res , MYSQL_ASSOC ) )
				$returnValue[$i++] = $row ;
		}
		mysqli_close( $conn );
		return $returnValue ;	
	}
} 
