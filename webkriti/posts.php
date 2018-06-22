<html>
<body background="images/background.jpg" >
<h1 align="center"><i><strike>Posts</strike></i></h1>

<style>
#w{
    background-image: url("images/z.jpg");
    height:700;
    border-radius: 50px;



}
h1
    {
        font-size: 125;


    }
    #q{

        z-index:-1;
        position:relative;
        top:100;
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
#r{

    position:relative;
    text-align: center;
    top:30;

    font-size: 30;
    font-weight:bold;
    color:yellow;
}
#x{
    font-size: 80;
    font-weight: bold;
    font-family: 'Times New Roman';
    position:relative;
    top:0;
    text-align: center;
    color:white;

}
#y{ position:relative;
    font-size:30;
    font-weight: bold;
    font-style: italic;
    font-family: 'Times New Roman';
    
    top:-50;
    color:white;
    left:1000;

}
img{

    border-radius: 20px;
    border:5px solid black;
}


</style>

<?php
include("includes/connect.php");
$que="select * from posts order by rand() ";
$run=mysql_query($que);
while($row=mysql_fetch_array($run)){
    $title=$row['post_title'];
    $date=$row['post_date'];
    $author=$row['post_author'];
    $image=$row['post_image'];
    $content=$row['post_content'];

?>
<div id="w" ><h1><?php   echo '<div id="x"><strike>'. $title.'</strike></div>';
?></h1></a>
<p><?php echo '<div id="y">Posted On '.$date.'</div>' ;?></p>
<center><img src="images/<?php echo $image ;?>"  height=300  width=600></center>

<p align="justify">
<?php  echo '<div id="r">'.$content.'</div>'; ?>
</p></div>

<?php } ?>
</html>