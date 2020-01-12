<?php
function login_check()
{
    if(!isset($_SESSION['admin']) || strlen($_SESSION['admin'])==0)
	{	
		return false;
	}
    return true;
}
