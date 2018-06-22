<html>
<head>

</head>
<body background="images/background.jpg">
	<h1 align="center"><i><strike>Registration</strike></i></h1>
	<div id ="menu"><a href="index.html" >Home</a>
	<a>Registration</a>
	<a href="login.php">Login</a>
     <a href="events.html">Events</a>
     <a href="welcome.php">Profile</a>
      <a href="posts.php">Posts</a></div>
     <form  name="form"   method="post"  action="reg.php">
     	<font color="grey">Username:<br>
     	<input type="text" name="u_name"><br>
        Password:<br>
        <input type="password" name="u_pass">
        <br>
        Confirm Password:<br>
        <input type="password" name="r_pass">
        <br>
  College:<br>
  <input type="text" name="c_name"><br>
  
  Roll no::<br>
  <input type="text" name="roll"><br>
  Events:<br>
    <input type="checkbox" name="cm" > CODE-MANIA<br>
  <input type="checkbox" name="rn" > RUNNABLE<br>
  <input type="checkbox" name="ha"> HACKATHON<br>
  <input type="checkbox" name="rb"> ROBOTIX<br>
  <input type="checkbox" name="gc" > GREY CELLS<br><br>
   <input type="submit" name='submit' value="Register Now">
   
 </form>
 <img src="images/download.jpg" height=600  width=400>



     
     <style>
     img{
     	position:absolute;
     	top:0;
     	left:450;
     	border-radius: 50px;
     }
     #g{
     	background-color: orange;
     	height:15;
     	width: 40;
     	border-radius: 20px 20px 50px 20px;
     	font-size: 20;
     }
     form{
     	   position:absolute;
     	   left:500;
     	   line-height: 1.5;
     	   font-size: 20;
     	   font-family: "Comic Sans";
     	   font-weight: bold;
     	   background-color: black;
            top:200;
            left:450;
     	   width: 250;
     	   height:550;
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
</body>
</html>
<?php
$con=mysql_connect("localhost","root","") or die (mysql_error());
$db=mysql_select_db('web_db',$con) or die (mysql_error());
if(isset($_POST['submit']))
{
 @$c_name=mysql_real_escape_string($_POST['c_name']);
 @$u_name=mysql_real_escape_string($_POST['u_name']);
 @$u_pass=mysql_real_escape_string($_POST['u_pass']);
 @$r_pass=$_POST['r_pass'];
 @$roll=mysql_real_escape_string($_POST['roll']);
 @$cm=mysql_real_escape_string($_POST['cm']);
 @$rn=mysql_real_escape_string($_POST['rn']);
 @$ha=mysql_real_escape_string($_POST['ha']);
 @$rb=mysql_real_escape_string($_POST['rb']);
 @$gc=mysql_real_escape_string($_POST['gc']);
 if($u_name=='')
{
 echo "<script>alert('please enter username u want')</script>";
 exit();
}
if($u_pass=='')
{
 echo "<script>alert('please enter a password')</script>";
 exit();
}
if($r_pass=='')
{
 echo "<script>alert('please re-enter your password')</script>";
 exit();
}
if($c_name=='')
{
 echo "<script>alert('please enter your college name')</script>";
 exit();
}
if($roll=='')
{
 echo "<script>alert('please enter your roll number')</script>";
 exit();
}
else
{
  $query=mysql_query("select * from u_reg where u_name='$u_name'");
  if(mysql_num_rows($query)>0)
  {
    echo "<script>alert('username already exist')</script>";
    exit();
    }
  if($u_pass!=$r_pass)
  {
    echo "<script>alert('both passwords do not match')</script>";
    exit();
  }
  if($cm!='on' and $rn!='on' and $ha!='on' and $rb!='on' and gc!='on')
  {
    echo"<script>alert('Select atleast one event for participation')</script> ";
    exit();
  }
 else
    {
  $que="INSERT INTO u_reg (u_name,u_pass,c_name,roll,cm,rn,ha,rb,gc) VALUES('$u_name','$u_pass','$c_name','$roll','$cm','$rn','$ha','$rb','$gc')";
  if(mysql_query($que)){
    echo "<script>alert('registration successful')</script>";
    echo"<script>window.open('login.php','_self')</script>";
  }
    
}


}
 
}







