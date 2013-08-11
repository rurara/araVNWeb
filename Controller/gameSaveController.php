<?php
/*
AraVNUserData
	userKey
	gameKey
	gameSaveNumber

*/
include_once("../setting/connect.php");
include_once("../setting/session.php");

$textNumber = $_GET['messageNumber'];
$userKey = $_SESSION['userKey'];
$userSaveDataSelectQuery = mysql_query("select userKey from AraVNUserData where userKey = '$userKey'");
$checkUserSaveDateValue = mysql_num_rows($userSaveDataSelectQuery);

if ($checkUserSaveDateValue == 0){
	echo '저장된 데이터가 없습니다 '. $textNumber.'까지 진행된 데이터를 저장합니다' ;

	if(mysql_query("insert into AraVNUserData(userKey, gameKey, gameSaveNumber)
									values ('$userKey', 1, '$textNumber''')")
	){
		echo '<br>sql 저장 성공';
//		echo ' <script>location = "../index.php?messageNumber=1";</script>';	
	}else{
		echo '<br>sql 저장 실패';
	}
} else {
	echo '저장된 세이브 파일이 있습니다 세이브는 한명이 한 게임당 하나의 세이브파일만 지원됩니다 덮어쓰기를 하시겠습니까?<br/>';
}

echo '아직 세이브를 지원하지 않습니다!';

//	echo ' <script>alert("id는 12자까지만 사용해주세요");;</script>';	
//	echo ' <script>window.history.back(-1);</script>';
?>