<div class="box">
	<form action="Controller/loginController.php" method="post">
			log in <br/>
			id <input type="text" name="userId"><br/>
			pw<input type="text" name="password"><br/>
			<input type="submit">
	</form>
</div>	
	
<div class="box">
	<p>새로운 사용자 </p>

	<form action="Controller/userRegisterController.php" method="post">
		id : <input name="userId" type="text" placeholder="12자 까지 사용"></br>
		password : <input name="password" type="password"></br>
		password confirm : <input name="confirmPassword" type="password"></br>
		name : <input name="userName" type="text" placeholder="게임에서 사용 할 이름"></br>
		mail : <input name="mail" type="text" placeholder="선택사항"></br>
		<input type="submit" value="가입">
	</form>
</div>

