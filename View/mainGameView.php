<?php
/*
AraVNText
	textKey	
	textNumber
	textUser
	textMessage	
	characterPoseKey

AraVNCharacterPose
	characterPoseKey
	characterKey
	userKey
	characterUrl
	characterDescription
erkg830

AraVNCharacterInfo
	characterKey
	characterNumber
	userKey
	characterName
*/

$textNumber = $_GET['messageNumber'];
$messageSelectQuery = mysql_query("select textNumber, textUser, textMessage, characterPoseKey from AraVNText where textNumber ='$textNumber'");
//대사
$message = mysql_result($messageSelectQuery,0,'textMessage');

//캐릭터 이미지 구해오기
$characterPoseKey = mysql_result($messageSelectQuery, 0, 'characterPoseKey');
$characterPoseSelectQuery = mysql_query("select characterKey, characterUrl, characterDescription from AraVNCharacterPose where characterPoseKey ='$characterPoseKey'");
$characterUrl = mysql_result($characterPoseSelectQuery, 0, 'characterUrl');
$characterDescription = mysql_result($characterPoseSelectQuery, 0, 'characterDescription');


//캐릭터 이름 구해오기
$characterNumber = mysql_result($characterPoseSelectQuery, 0, 'characterKey');
$characterNameQuery = mysql_query("select characterName from AraVNCharacterInfo where characterNumber = '$characterNumber'");
$characterName = mysql_result($characterNameQuery, 0,'characterName');

//텍스트 줄 구하기
$textRows = mysql_num_rows(mysql_query("select textNumber from AraVNText"));
?>

<div class="characterBox">
	<img src="<?php echo $characterUrl; ?>" width="300">
</div>
<!--
<div class="menuBox">
menu
</div>
-->
<div class="messageArea">

	<div class="nameBox">
		<?php echo $characterName; ?>
		[ <?php echo $characterDescription; ?> ]
	</div>
	<div class="nextBox">
	
	<?php
		 if ($textNumber == $textRows){
		 echo  '<a href="index.php?messageNumber=1">끝! 처음으로</a>';
		 
		 } else{
		 $nextNumber = $textNumber + 1;
		 echo '<a href="index.php?messageNumber='. $nextNumber  .'">다음</a>';
		 }
	?>
<!-- 		<?php if ($textNumber != 10){echo '다음';} ?> -->

	</div>
<br/><br/>


	<div class="messageBox">
		<?php echo $message; ?>
	</div>

</div>