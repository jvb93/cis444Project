<?php include"phpFunctions/session.php"; ?>
<?php include"header.php"; ?>

		<?php
			//First lets get the username and password from the user
			$userId=$_GET["userId"];


			//Second let's check if that username and password are correct and found in our database
			$sql1=mysql_query("select is_admin from User where id='$userId'")
							   or die("<p>Could not perform database query for user login.</p>"
									. "<p>Error Code " . mysql_errno()
									. ": " . mysql_error()) . "<p>";


			//if they are found in our database, and there is only one occurence of that username and password


				//Valid user, so set the session
				$dataRow = mysql_fetch_row($sql1);


        $is_admin = $dataRow[0];

        if($is_admin == 1)
        {
          $is_admin = 0;
        }
        else
        {
          $is_admin = 1;
        }

        $sql2=mysql_query("update User set is_admin='$is_admin' where id='$userId'")
  							   or die("<p>Could not perform database query for user login.</p>"
  									. "<p>Error Code " . mysql_errno()
  									. ": " . mysql_error()) . "<p>";

        header("location:listUsers.php");
		?>
<?php include"footer.php"; ?>
