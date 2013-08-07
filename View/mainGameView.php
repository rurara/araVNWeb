<?php
/*
AraVNText
	textKey	
	textNumber

	textUser
	textMessage	


	characterKey

AraVNCharacterInfo
	characterKey
	characterNumber
	userKey
	characterName	
*/
$textNumber = $_GET['messageNumber'];
$messageSelectQuery = mysql_query("select textNumber, textUser, textMessage from AraVNText where textNumber ='$textNumber'");
$message = mysql_result($messageSelectQuery,0,'textMessage');

$characterNameQuery = mysql_query("select characterName from AraVNCharacterInfo");
$characterName = mysql_result($characterNameQuery, 0,'characterName');

?>

<div class="characterBox">
	<img src="http://imageshack.us/a/img801/6091/h3lg.png" width="300">
</div>
<!--
<div class="menuBox">
menu
</div>
-->
<div class="messageArea">
	<div class="nameBox">
		<?php echo $characterName; ?>
	</div>
	<div class="nextBox">
	<a href="index.php?messageNumber=<?php echo $textNumber + 1; ?>"><?php if ($textNumber != 10){echo '다음';} ?></a>
	</div>
<br/><br/>


	<div class="messageBox">
		<?php echo $message; ?>
	</div>

</div>