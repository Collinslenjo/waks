<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<form action="login.php" method="POST">
	<input type="email" name="email" placeholder="Email">
	<br>
	<input type="password" name="password" placeholder="Password">
	<br>
	<button type="submit">Login</button>
</form>
<?php
if (isset($_SESSION['id'])) {
	echo $_SESSION['id'];
}else {
	echo "You are not logged in";
}
?>
<br>
<br>
<br>

<form action="signup.php" method="POST">
	<input type="text" name="first" placeholder="First Name">
	<br>
	<input type="text" name="last" placeholder="Last Name">
	<br>
	<input type="text" name="username" placeholder="Username ">
	<br>
	<input type="email" name="email" placeholder="Email">
	<br>
	<input type="password" name="password" placeholder="Password">
	<br>
	<button type="submit">Sign up</button>
</form>
<br>
<br>
<br>

<form action="logout.php">
	<button type="submit">Logout</button>
</form>

</body>
</html>