<?php
include_once("../setting/connect.php");
include_once("../setting/session.php");
/*
table name 
	- UserInfo
fileld
	- userKey
	- userId
	- userPassword
	- userName
	- mail
*/

$userId = $_POST['userId'];
$password = $_POST['password'];


$selectIdQuery = mysql_query("select userPassword, userKey from UserInfo where userId = '$userId'");
$checkIdRows = mysql_num_rows($selectIdQuery);

$confirmPassword = mysql_result($selectIdQuery, 0, 'userPassword');

/*
	에러 처리
*/
if (strlen($userId)>= 12){
	echo ' <script>alert("id는 12자까지만 사용해주세요");;</script>';	
	echo ' <script>window.history.back(-1);</script>';

} else if(strlen($userId) == 0) {
	echo ' <script>alert("id를 입력해주세요");;</script>';
	echo ' <script>window.history.back(-1);</script>';
	
} else if(strlen($password) == 0) {
	echo ' <script>alert("비밀번호를 입력해주세요");;</script>';
	echo ' <script>window.history.back(-1);</script>';
	
} else if($confirmPassword != $password){
	echo ' <script>alert("11'. $confirmPassword. '비밀번호가 틀립니다");;</script>';
	echo ' <script>window.history.back(-1);</script>';
	
} else {
//로그인 성공 처리

	$userKey = mysql_result($selectIdQuery, 0, 'userKey');
	$_SESSION['checkLogin'] = $userId;
	$_SESSION['userKey'] = $userKey;
	echo ' <script>location = "../index.php?messageNumber=1";</script>';	

}

?>