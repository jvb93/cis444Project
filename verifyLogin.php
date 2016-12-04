<?php include"phpFunctions/session.php"; ?>
<?php include"header.php"; ?>

		<?php
			//First lets get the username and password from the user
			$username=$_POST["username"];
			$password=$_POST["password"];

			//Second let's check if that username and password are correct and found in our database
			$sql1=mysql_query("SELECT user_name, is_admin, id FROM User WHERE user_name='$username' AND Pass='$password'")
							   or die("<p>Could not perform database query for user login.</p>"
									. "<p>Error Code " . mysql_errno()
									. ": " . mysql_error()) . "<p>";

			if (mysql_num_rows($sql1) != 1)
			{
				echo("<script type='text/javascript'>location.replace('login_Failure.php');</script>");
			}
			//if they are found in our database, and there is only one occurence of that username and password
			//thus making them valid.
			else
			{

				//Valid user, so set the session
				$dataRow = mysql_fetch_row($sql1);

				session_start();
				$_SESSION['userName'] = $dataRow[0];
				$_SESSION['isAdmin'] = $dataRow[1];
				$_SESSION['userId'] = $dataRow[2];

				$_SESSION['sessionStartTime'] = time();

				//$logText = "User Login";
				//Now lets log the login.
				//insertLog($_SESSION['userName'], $logText );

				//Now send them to the success page.
				echo("<script type='text/javascript'>location.replace('index.php'); </script>");

			}
		?>
<?php include"footer.php"; ?>
