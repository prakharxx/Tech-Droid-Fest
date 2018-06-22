<?php
session_start();
if(session_destroy())
{
	echo "<script>alert('YOU ARE GOING TO LOGOUT')</script>";
    echo"<script>window.open('login.php','_self')</script>";
}
?>
}