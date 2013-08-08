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
$confirmPassword = $_POST['confirmPassword'];
$userName = $_POST['userName'];



$selectIdQuery = mysql_query("select userId from UserInfo where userId = '$userId'");
$checkIdRows = mysql_num_rows($selectIdQuery);

/*
	에러 처리
*/
if (strlen($userId)>= 12){
	echo ' <script>alert("id는 12자까지만 사용해주세요");;</script>';	
	echo ' <script>window.history.back(-1);</script>';

} else if(!$userId){
	echo ' <script>alert("id를 입력해주세요");;</script>';	
	echo ' <script>window.history.back(-1);</script>';

}else if ($checkIdRows >= 1){
/* 	echo ' 중복 아이디가 있습니다  ' . $checkIdRows; */
	echo ' <script>alert("이미 사용중인 id입니다");;</script>';
	echo ' <script>window.history.back(-1);</script>';

} else if ($password != $confirmPassword){
	echo ' <script>alert("같은 비밀번호를 두번 입력해주세요");;</script>';
	echo ' <script>window.history.back(-1);</script>';

} else if(strlen($userId) == 0) {
	echo ' <script>alert("id를 입력해주세요");;</script>';
	echo ' <script>window.history.back(-1);</script>';
	
} else if(strlen($password) == 0) {
	echo ' <script>alert("비밀번호를 입력해주세요");;</script>';
	echo ' <script>window.history.back(-1);</script>';
	
} else if(strlen($userName) == 0) {
	echo ' <script>alert("이름을 입력해주세요");;</script>';
	echo ' <script>window.history.back(-1);</script>';
	
} else {
//에러 처리 통과 sql 저장
	$selectKeyQuery = mysql_query("select userKey from UserInfo order by userKey desc");
	$userKey = mysql_result($selectKeyQuery, 0);
	$userKey ++;
	/* echo $userKey . '/' . $userId . '/' . $password . '/' . $confirmPassword . '/' .$userId; */
	
	
	if(mysql_query("insert into UserInfo(userKey, userId, userPassword, userName, mail )
									values ('$userKey', '$userId', '$password', '$userName', '$mail')")
	){
		echo '<br>sql 저장 성공';
		$_SESSION['checkLogin'] = $userId;
		$_SESSION['userKey'] = $userKey;
	
		echo ' <script>location = "../index.php?messageNumber=1";</script>';	
	}else{
		echo '<br>sql 저장 실패';
	}

}


?>