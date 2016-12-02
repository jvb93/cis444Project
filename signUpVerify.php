<?php include"phpFunctions/session.php"; ?>
<?php include"header.php"; ?>

		<?php
			//First lets get the username and password from the user
			$username=$_POST["username"];
			$password=$_POST["password"];

			//Second let's check if that username and password are correct and found in our database
			$sql1=mysql_query("insert into User(user_name, Pass, create_date, last_login, is_admin) values('{$username}', '{$password}', NOW(), NOW(), 0)")
							   or die("<p>Could not perform database query for user login.</p>"
									. "<p>Error Code " . mysql_errno()
									. ": " . mysql_error()) . "<p>";


			//if they are found in our database, and there is only one occurence of that username and password


				//Valid user, so set the session
				session_start();
				$_SESSION['userName'] = $username;
				$_SESSION['isAdmin'] = 0;

				$_SESSION['sessionStartTime'] = time();

				$user=mysql_query("select * from User where user_name = '{$username}'")
									 or die("<p>Could not perform database query for user login.</p>"
										. "<p>Error Code " . mysql_errno()
										. ": " . mysql_error()) . "<p>";
				 $userRow = mysql_fetch_row($user);

				 $_SESSION['userId'] = $userRow[0];

				//$logText = "User Login";
				//Now lets log the login.
				//insertLog($_SESSION['userName'], $logText );

				//Now send them to the success page.
				echo("<script type='text/javascript'>location.replace('index.php'); </script>");

		?>
<?php include"footer.php"; ?>
