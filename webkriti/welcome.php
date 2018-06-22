<?php
session_start();
if(!isset($_SESSION['u_name'])){
	header("location: login.php");
}
else
{

?>
<html>
<body background="images/background.jpg">
<style>
#v{
	    font-size: 40;
	    font-weight: bold;
	    color: white;
	    position:absolute;
	    left:430;
	    top:230;


}
td{
	text-align: center;
	background-color: black;
	border-radius: 20px;


}
h1
	{
		font-size: 125;
        position:absolute;
        top:-70;
        left:500;

	}
	#web{
           background-color: grey;
           height:50;
            width:200;
            
            padding:20px;
            color:black;
            border-radius: 30px;
            position:absolute;
            left:100;
            top:330;
            font-family: 'Times New Roman',sans-serif ;
            text-align: center;
            font-size: 30;
            font-weight: bold;
            border:5px solid black;
             

	}
	#logout{

             background-color: grey;
             height:50;
            width:200;
             color:black;
            padding:20px;
            
            border-radius: 30px;
            position:absolute;
            left:1000;
            top:330;
            font-family: 'Times New Roman',sans-serif ;
            text-align: center;
            font-size: 30;
            font-weight: bold;
            border:solid 5px black;
            
	}
	img{
		border-radius: 50px;
		z-index: -1;
		position: absolute;
		top:180;
		left:70;
	}
</style>
<?php
include("includes/connect1.php");
$u_name=$_SESSION['u_name'];
echo '<h1 align="center"><i><strike>Profile</strike></i></h1>';
$que="select * from u_reg where u_name='$u_name' ";
$run=mysql_query($que);
if($run)
{ 
	$row=mysql_fetch_array($run);
	echo ' <table height= 300 width=500 id="v">
	<tr>
	<td>USERNAME</td>
	<td> '. $row['u_name'] .'</td>
	</tr>
	<tr>
	<td>COLLEGE</td>
	<td>' .$row['c_name'] . '</td>
	</tr>
	<tr>
	<td>ROLL NO</td>
	<td>'. $row['roll'] . '</td>
    
	</tr>
	</table>';
	 
	
}
?>

<body>

<a href="index.html" id="web">HOME</a>
<a href="logout.php" id="logout">LOGOUT</a>
<img src="images/download (1).jpg"  height=400 width=1200>

</body>

</html>
<html>
<style>
table{
	     position: absolute;
	     top:850;
	     left:300;
}

table{
	color:yellow;
}
td{
	
}


</style>
	<head>

	
	</head>
	<body>
	<style>
	  #h{
	position:absolute;
	top:650;
	left:500;	
	font-size: 70;
	text-align: center;
	font-family: "Times New Roman",sans-serif;
	font-style: italic;
	font-weight: bold;
	




}
#b{
	z-index:-1;
	position:absolute;
	top:750;
	left:250;
}
	</style>
	     <div id="h"><u>Insert new post</u></div>
		<form method="post" action="welcome.php" enctype="multipart/form-data" >
		<table align="center"  width="800">
		<tr>
		<td align="center" colspan="5"></td>
		</tr>
		<tr>
		<td>Post Title:</td>
		<td> <input type="text" name="title"></td>
		</tr>
		<tr>
		<td>Author Name:</td>
		<td><input type="text" name="author"></td>
		</tr>
		<tr>
		<td>Post Image :</td>
		<td><input type="file" name="image"></td>
		</tr>
		<tr id="q">
		<td>Post Content :</td>
		<td><textarea name="content" cols="40" rows="20"></textarea></td>
		</tr>
        <tr>
		<td align="center" colspan='5'><input type="submit" name="submit" value="Publish Now"></td>
		</tr>
		</table>
		</form>
		<img src="images/z.jpg" height=700 width=900 id="b">
	</body>
</html>
<?php
include("includes/connect.php");
if(isset($_POST['submit'])){
	$title=$_POST['title'];
	$date=date('d/m/y');
	$author=$_POST['author'];
	$content=$_POST['content'];
	@$image_name=$_FILES['image']['name'];
	@$image_type=$_FILES['image']['type'];
	@$image_size=$_FILES['image']['size'];
	@$image_tmp=$_FILES['image']['tmp_name'];
	if($title=='' or $author=='' or $content=='')
{
 echo "<script>alert('Some fields are empty')</script>";
 exit();
}
	
	if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif")
	{
						move_uploaded_file($image_tmp,"images/$image_name");
	}
	else{
     echo"<script>alert('Image type is invalid')</script>";	
     exit();
       }
       $query="insert into posts (post_title,post_date,post_author,post_image,post_content) values ('$title','$date','$author','$image_name','$content' )";
       if(mysql_query($query))
       { 
       	echo"<script>alert('Post has been published')</script>";
       }



}
?>
<?php } ?>
<?php?>