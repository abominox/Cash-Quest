<?php
	session_start();


	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);

	$jsonName = file_get_contents('/var/www/html/misc/config.json');

	$json = json_decode($jsonName, true);

	if ($username && $password)
	{
		$hostname = "localhost";
		$dbloginusername = "hackathon";
		$dbloginpassword = "muffin";
		$connect = mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
		mysql_select_db("hackathon") or die("Could not find specified database!");

		$query = mysql_query("SELECT * FROM User WHERE username='$username'");

		$numrows = mysql_num_rows($query);

		if ($numrows != 0)
		{
			while ($row = mysql_fetch_assoc($query))
			{
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				//check to see if they match
				if ($username == $dbusername && password_verify($password, $dbpassword))
				{
					header('Location: index.php');
					$_SESSION['username'] = $username;
				}
				else
				{
					echo ("Incorrect Username/Password");
				}
			}
		}
		else
		{
			die("That user does not exist!");
		}
	}
	else
	{
		//change this later to be a scripted, Android toast like notification using JS
		die("Please enter a username and a password:");
	}
?>
