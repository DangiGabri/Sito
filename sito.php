<html>
	<body>
		<form action="signin.php">
			<input type="submit" name="signin" value="Sign up">
		</form>
		<form action="logout.php">
			<input type="submit" name="logout" value="Logout">
		</form>
<?php 
	session_start();
	
	include 'conn.php';
	
	if($_SESSION['esiste']==1){
		echo 'ciao';
	}
	else{
		echo '<form action="login.php">
				<input type="submit" name="login" value="Login">
		      </form>';
	}
?>
		
	</body>
</html>