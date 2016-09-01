<?php
function checkSession()
{
		
			session_start();
			if(empty($_SESSION['log_id']))
			{
				header("Location:../Register/Login/page-login.php");
            }
}			 
?>
