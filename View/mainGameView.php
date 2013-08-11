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

AraVNBackgroundImage
	backgroundKey
	userKey
	backgroundImageUrl
	backgroundDescription
*/

$textNumber = $_GET['messageNumber'];
$messageSelectQuery = mysql_query("select textNumber, textUser, textMessage, characterPoseKey, backgroundKey from AraVNText where textNumber ='$textNumber'");
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

//배경 구하기
$backgroundKey = mysql_result($messageSelectQuery, 0, 'backgroundKey');
$backgroundSelectQuery = mysql_query("select backgroundImageUrl from AraVNBackgroundImage where backgroundKey = '$backgroundKey'");
$backgroundImageUrl = mysql_result($backgroundSelectQuery, 0, 'backgroundImageUrl');
?>

<!--html-->
<div class="backgroundArea"   <?php echo 'style="background-image:url('. $backgroundImageUrl .'); background-color:#d8d6c5;"'; ?>>

	<div class="characterBox">
		<img src="<?php echo $characterUrl; ?>" width="300">
	</div>

	<div class="menuBox">
	<!--div 태그에 엔터 삽입되면 접기 태그 사용 안됨-->
		<a href='javascript:void(0)' onclick="this.innerHTML=(this.nextSibling.style.display=='none')?'menu':'menu';this.nextSibling.style.display=(this.nextSibling.style.display=='none')?'block':'none'";>menu</a><DIV style='display:none'>
			<a href="Controller/gameSaveController.php?messageNumber=<?php echo $textNumber; ?>">save</a><br/>
			<a href="Controller/gameLoadController.php?messageNumber=<?php echo $textNumber; ?>">load</a><br/>
			setting<br/>
		</DIV>
	</div>

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
		</div>
	<br/><br/>
	
		<div class="messageBox">
			<?php echo $message; ?>
		</div>
	
	</div>
</div>	