<?php
session_start();
?> 
<html>
<head>

</head>
<body background="images/background.jpg">
	<h1 align="center"><i><strike>Login</strike></i></h1>
   <div id ="menu"><a href="index.html" >Home</a>
	<a href="reg.php">Registration</a>
	<a>Login</a>
     <a href= "events.html">Events</a>
     <a href="welcome.php">Profile</a>
      <a href="posts.php">Posts</a></div>

      <form  name="form1"   method="post" action="login.php">
     	<font color="grey">Username:<br>
     	<input type="text" name="u_name"><br>
        Password:<br>
        <input type="password" name="u_pass">
        <br><br>
        <input type="submit" name='submit' value="Login">
    </form>
    <img src="images/login.jpg" height=300  width=400 id="a">
    <img src="images/download (1).jpg" height=400  width=1000 id="b">

	</body>
	<style>
	#b{

		 position:absolute;
		 border-radius: 50px;
		 z-index: -1;
		 top:-70;
		 left:-100;
	}
	 #a{
     	position:absolute;
     	top:0;
     	left:450;
     	border-radius: 50px;
     }
	form{
     	   position:absolute;
     	   left:500;
     	   line-height: 1.5;
     	   font-size: 20;
     	   font-family: "Comic Sans";
     	   font-weight: bold;
     	   background-color: black;
            top:250;
            left:450;
     	   width: 250;
     	   height:200;
     	   border-radius: 20px;
     	   padding-left: 80px;
     	   padding-top: 50px;
     }
	  #menu{
  	
     position:absolute;
     top:240;
     left:40;
  	font-size: 30;

  	letter-spacing: 2.5;
  	background-color: black;
     width:220;
  	
  	text-align:center;
  	border-radius: 20px 20px 20px 20px;
  	
  	line-height: 2;
  }
  a{
  	color:white;
  	padding:25px;

  }
  h1
	{
		font-size: 125;


	}
	</style>

</html>
<?php
$con=mysql_connect("localhost","root","") or die (mysql_error());
$db=mysql_select_db('web_db',$con) or die (mysql_error());
if(isset($_POST['submit']))
{
  $u_name=mysql_real_escape_string($_POST['u_name']);
  $u_pass=mysql_real_escape_string($_POST['u_pass']);
  if($u_name=='')
{
 echo "<script>alert('please enter ur username')</script>";
 exit();
}
if($u_pass=='')
{
 echo "<script>alert('please enter a password')</script>";
 exit();
}
else
{
  $query="select * from u_reg where u_name='$u_name' AND u_pass='$u_pass'";
 
 $run=mysql_query($query) or die (mysql_error());
 if(mysql_num_rows($run)>0)
 {
  $_SESSION['u_name']=$u_name;
  echo"<script>window.open('welcome.php','_self')</script>";
 }
 else
 {
  echo"<script>alert('wrong ceredentials')</script>";
 }

}
}


?>
