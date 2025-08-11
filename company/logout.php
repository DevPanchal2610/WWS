<?php
	session_start();
	if(isset($_SESSION['id']))
	{
		unset($_SESSION['id']);
	}
	if(isset($_SESSION['project_id']))
	{
		unset($_SESSION['project_id']);
	}

	session_unset();
	header('location:../index.php');
?>