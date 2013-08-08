<?php 
include_once("setting/session.php");
include_once("setting/header.php");
include_once("setting/connect.php");
?>
<body class="default">
	<div class="noticeBox">
	현재 개발중에 있습니다. 
	<?php 
		if($_SESSION['checkLogin']){
			echo 'login id - ' . $_SESSION['checkLogin'] .'/ user number -'.   $_SESSION['userKey']; 
			echo '   <a href="logout.php">log out</a>';
	
		}
	?>
	</div>
	<div class="rootArea"  <?php
	$textNumber = $_GET['messageNumber'];
if($textNumber == 12){
	echo 'style="background-image:url(http://img96.imageshack.us/img96/8159/4gl7.jpg);"';
}
?>>
	test text
		<?php 
			if(!$_SESSION['checkLogin']){
				include"View/loginView.php"; 					
			} else {
				include "View/mainGameView.php";
			}
		
		?>
	</div="rootArea">
</body>