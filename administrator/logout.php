<?php 
	require_once('data/session.php');
	

	// Four steps to closing a session
	// (i.e. logging out)

	// 1. Find the session
	session_start();
	
	// 2. Unset all the session variables
	$_SESSION = [];
	
	// 3. Destroy the session cookie
	// 4. Destroy the session
	session_destroy();
	
	redirect_to("login.php");
?>