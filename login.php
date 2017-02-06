<?php
	session_start();

	include 'conn.php';

	if($_SESSION['esiste']==0){
		
		$_SESSION['esiste']=0;
		echo "<html>
				<body>
					<form method='post'>
						EMail: <input type='text' name='email' value=''></br>
						Password: <input type='password' name='password' value=''></br>
						<input type='submit' name='login' value='Login'>
					</form>
				</body>
			</html>";	
		if(isset($_POST['password'])){
			try{
				$dbh = new PDO('mysql:host='.$host.';dbname='.$dbNome,$username,$password);
				$stm = $dbh->prepare('SELECT * FROM quintab_sito.Dati WHERE Password= :password and Username= :username');
				$stm->bindValue(':username',$_POST['email']);
				$stm->bindValue(':password',$_POST['password']);
				$stm->execute();
				if($stm->rowCount()==1){
					$_SESSION['esiste']=1;
					header("location: sito.php");
				}
				else{
					echo 'Username o password non valido.';
				}
			}catch(PDOException $e){
				$e->getMessage();
				echo 'Errore!!';
			}
		}
	}
	else{
		echo 'Sei già loggato.';
	}
?>