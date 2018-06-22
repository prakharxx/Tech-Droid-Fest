<html>
<head>
<h1><strike>Contact Us</strike></h1>
</head>
<body background="images/background.jpg">
<form action="contact_us.php" method="post">
<table width="800" align="center"  height=600>
<tr>
<td colspan="5">ENTER THE FOLLOWING DETAILS</td>
</tr>
<tr>
<td>SUBJECT</td>
<td><input type="text" name="subject"></td>
</tr>
<tr>
<td>YOUR EMAIL</td>
<td><input type="text" name="email"></td>
</tr>

<tr>
<td>YOUR MESSAGE </td>
<td><textarea cols="25" rows="20" name="message"></textarea></td>
</tr>
<tr>
<td colspan="2" align="center" ><input type="submit" name="send_email" value="Send Email"> </td>
</tr>
</table>
<img src="images/download (1).jpg"  height=700 width= 1000>
</form>
<style>
h1{
	text-align: center;
	font-weight: bold;
	font-style: italic;
	font-size: 90;
}
img{

	position:absolute;
	border-radius:50px;
	z-index:-1;
	top:100;
	left:200;
}
td{

	background-color: black;
	border-radius:30px;
	color:yellow;
	font-size: 30;
	text-align: center;
	border:solid 2px white;
}
</style>
</body>
</html>
<?php
if(isset($_POST['send_email'])){
$sender=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
if($sender=='' or $subject=='' or $message=='')
{
	echo "<script>alert('Fill the required fields')</script> ";
	exit();
}
$me="ipg_2015063@iiitm.ac.in";
mail($me,$subject,$message,$sender);
$sub="Tech-Droid ABV-IIITM , Gwalior<br>";
$msg="we will get to you soon<br>";
mail($sender,$sub,$msg,$me);
echo "<script>alert('Thanks for contacting us') </script>";
}
?>
