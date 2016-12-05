<?php
	session_start();
	if(isset($_SESSION['sessionStartTime']))
	{
		if ($_SESSION['sessionStartTime'] + 1800 < time() )	//If the session is more than 15 minutes old
		{
			session_destroy();	//Timeout.
			session_start();	//get new session so pages error out without having to refresh.
		}
		else	//Session is still valid so reset the session time
			$_SESSION['sessionStartTime'] = time();
	}
?>
