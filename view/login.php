<?php
if (isset($_COOKIE['Admin'])) {
	header('location:adminDashboard.php');
} else if (isset($_COOKIE['patient'])) {
	header('location:patDash.php');
} else if (isset($_COOKIE['doctor'])) {
	header('location:doctorDashboard.php');
}
$uiderr = $upass = "";
/*if (isset($_POST['btnLogin'])) {


	if (empty($_POST['uid'])) {
		$uiderr = "ID is required";
	}
	if (empty($_POST['upass'])) {
		$upass = "Password is required";
	}
	if (!empty($_POST['uid']) && !empty($_POST['upass'])) {
		header('location:../controller/logcheckctrl.php');
	}
}*/

?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
</head>

<body>
	<center>
		<a href="../Home.php"><img src="../resources/wing.png" height="200" width="200"></a>
		<h3><b>Login</b></h3>
		<hr width="700">


		<form action="../controller/logcheckctrl.php" method="POST">
			<?php
			session_start();
			if (isset($_SESSION['error_message'])) {
				echo "<p style='color:red;'>" . $_SESSION['error_message'] . "<p>";
				unset($_SESSION['error_message']);
			} ?>
			<fieldset style="width:600px">
				<table>
					<tr>
						<td>Username: </td>
						<td><input type="text" name="uid">
							<span class="error">
								<?php echo $uiderr; ?>
						</td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="upass">
							<span class="error">
								<?php echo $upass; ?>
						</td>
					</tr>
					<tr>
						<td align="center" colspan="2"> <input type="checkbox" name="rememberme"> Remember Me</td>

					</tr>
				</table>
			</fieldset>
			<hr width="700">
			<input type="submit" name="btnLogin" value="Login">
		</form>
		<a href="patientregistration.php">Don't have an account? | Sign UP </a>
	</center>
</body>

</html>