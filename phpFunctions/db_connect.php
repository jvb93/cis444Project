<?php
//$DBConnect = @mysql_connect("74.53.178.38","gomer_giants","gazelle")
$DBConnect = @mysql_connect("localhost", "shara002", "shara002")
	 or die("<p>The MySQL database is not available.</p>"
        . "<p>Error Code: " . mysql_errno()
        . ": " . mysql_error()) . "<p>";


//$DBselected = @mysql_select_db("gomer_giants")
$DBselected = @mysql_select_db("shara002")
	or die("<p> Unable to select database.</P>"
			. "<p> Error Code: " . mysql_errno()
			. ": " . mysql_error() . "<p>");

include"insertLog.php";

?>
