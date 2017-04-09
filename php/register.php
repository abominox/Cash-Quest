<html>
	<h1>Register for HackathonProject</h1>
	<form action='../php/register.php' method='POST'>
		<table>
			<tr>
				<td>
					Username:
				</td>
				<td>
					<input type='text' name='username' value=''>
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type='password' name='password' value=''>
				</td>
			</tr>
			<tr>
			<tr>
				<td>
					Confirm Password:
				</td>
				<td>
					<input type='password' name='repeatpassword' value=''>
				</td>
			</tr>
				<td>
					Email Address:
				</td>
				<td>
					<input type='text' name='email' value=''>
				</td>
			</tr>
		</table>
			</p>
			<input type='submit' name='submit' value='Register'>
	</form>
</html>

<?php
	$submit = strip_tags($_POST['submit']);
	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);
	$repeatpassword = strip_tags($_POST['repeatpassword']);
	$email = strip_tags($_POST['email']);
	$date = date("Y-m-d");
	
	if ($submit)
	{
		if ($username && $password && $repeatpassword && $email && $date)
		{
			
			if ($password == $repeatpassword)
			{
				if (strlen($username) > 25)
				{
					echo "Length of username must not exceed 25 characters!";
				}
				if (strlen($email) > 50)
				{
					echo "Length of email address must not exceed 50 characters!";
				}
				else
				{
					if (strlen($password) > 25 || strlen($password) < 6)
					{
						echo "Password must be between 6 and 25 characters!";
					}
					else
					{
						//open db
						$hostname = "localhost";
						$dbloginusername = "hackathon";
						$dbloginpassword = "muffin";
						$connect = mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
						mysql_select_db("hackathon");
						
						//ensure entered username does not already exist in db
						$namecheck = mysql_query("SELECT username FROM User WHERE username = '$username'");
						$count = mysql_num_rows($namecheck);
						if ($count > 0)
						{
							die("An account with this username already exists, please enter a new username.");
						}
						
						//hashing password using bcrypt after successfully registering user
						$password = password_hash($password, PASSWORD_DEFAULT);
						
						//send data to db
						$queryreg = mysql_query("INSERT INTO User(id, username, password, email) VALUES ('', '$username','$password', '$email')");
						
						die("You have successfully registered for HackPSU Project! <a href='../html/login.html'>Return to login page.</a>");
					}
				}
			}
			else
			{
				echo "Your passwords do not match!";
			}
		}
		else
		{
			echo "Please fill in <strong>all</strong> required fields.";
		}
	}
?>