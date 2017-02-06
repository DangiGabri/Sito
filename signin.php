<?php
	session_start();
	$_SESSION['esiste']=0;
	
	include 'conn.php';
	
	if(isset($_POST['password'])){
		try{
			$dbh = new PDO('mysql:host='.$host.';dbname='.$dbNome,$username,$password);
			$stm = $dbh->prepare('INSERT INTO quintab_sito.Dati (Username,Password,Nome,Cognome) VALUE(:username,:password,:nome,:cognome)');
			$stm->bindValue(':username',$_POST['username']);
			$stm->bindValue(':password',$_POST['password']);
			$stm->bindValue(':nome',$_POST['nome']);
			$stm->bindValue(':cognome',$_POST['cognome']);
			if($stm->execute() == true){
				$_SESSION['esiste']=1;
				header("location: sito.php");
			}
			else{
				echo 'Username non valido.';
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo 'Errore!!';
		}
	}
?>

<html>
	<body>
		<form method="post">
			Email: <input type="text" name="username" value=""> <br>
			Nome: <input type="text" name="nome" value=""> <br>
			Cognome: <input type="text" name="cognome" value=""> <br>
			Password: <input type="password" name="password" value=""> <br>
			<input type="submit" name="signin" value="Sign in">
		</form>
	</body>
</html>