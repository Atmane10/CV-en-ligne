<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User enregistrer !')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Erreur')</script>";
			}
		} else {
			echo "<script>alert('Email existe déjà')</script>";
		}
		
	} else {
		echo "<script>alert('Mot de passe éronné')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title></title>
</head>
<body>
	<div class="divv">
	<div class="containeer">
	<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Inscription</p>
			<div class="input-group">
				<input type="text" placeholder="nom" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mot de passe" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmer le mot de passe" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Enregistrer</button>
			</div>
			<p class="login-register-text">Vous avez un compte? <a href="index.php">Connecter ici</a>.</p>
		</form>
	</div>
	</div>
</body>
</html>