<?php
/* checks if user is login or not, sends to index page depending on boolean $reverse */
function login_check($reverse)
{
	if(isset($_SESSION['user']) && strlen($_SESSION['user'])!=0 && !$reverse)
		header("Location: index.php");
	if((!isset($_SESSION['user']) || strlen($_SESSION['user'])==0) && $reverse)
		header("Location: index.php");
}
?>