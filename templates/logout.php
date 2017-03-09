<?php

	echo "Logged out scuccessfully";
    
    session_unset();
	session_destroy();
	
	setcookie(PHPSESSID,session_id(),time()-1);

?>