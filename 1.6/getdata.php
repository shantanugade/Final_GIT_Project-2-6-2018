<html>
<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$link = mysql_connect($host, $user, $pass,"project");

if($link)
  echo "kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk"; 
else
	echo "oooooooooooooooooooo";


$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO aaa VALUES('$imagetmp')";

mysql_query($insert_image,$link);
if(mysql_query($insert_image,$link);)
echo "hiiii";




?>
</html>