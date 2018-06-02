<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="#" enctype="multipart/form-data" method="post">
<input name="img" type="file" />
<input name="submit" type="submit" />
</form>



<?php 

echo "hiiii";


//mmysql_connect("localhost","root","");
$connection = mysqli_connect("localhost", "root", "", "aaa");

//mysqli_connect("localhost", "root", "","aaa");
//mysql_select_db("aaa");
if(isset($_POST["submit"])){
$filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!empty($filename)){
if(in_array($ext, $array)){


$select = "Insert into ddd(name,image) values('$filename','$tmpname')" ;

$query = mysqli_query($connection, $select) ;

//mysqli_query("Insert into ddd(name,image) values('$filename','$tmpname')");

if($query){
	echo "uploaded";
}

}
else{

echo "failed";

}
}
}




//$select = " SELECT * FROM `ccc` " ;

//$query = mysqli_query($connection, $select) ;



//while($row = mysqli_fetch_array($query)) {

//display
$select = " SELECT * FROM `ddd` " ;

$res = mysqli_query($connection, $select) ;
while($row = mysqli_fetch_array($res)){
$displ = $row['image'];

// please place the&#160;
//single quotation ' instead &#39;


//echo '<img src="data:image/jpeg;base64,&#39;.base64_encode($displ).&#39;" />';
echo '<img src="data:image/jpeg;base64,'.base64_encode($displ).'" />';

echo "<br />";
}

 ?>

</body>
</html>
