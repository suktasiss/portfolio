<?php
function login_check()
{
if(strlen($_SESSION['admin'])==0)
	{	
		header("Location: index.php");
	}
}
?>