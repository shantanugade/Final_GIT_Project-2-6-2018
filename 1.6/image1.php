
<!DOCTYPE html>



<?php



$connection = mysqli_connect("localhost", "root", "", "aaa");

if ($connection) {

 echo "connected";

}

if(isset($_POST['fileuploadsubmit'])) {

 $fileupload = $_FILES['fileupload']['name'];

 $fileuploadTMP = $_FILES['fileupload']['tmp_name'];

$folder = "img/";

//$folder="Projecy_product_images/"


 move_uploaded_file($fileuploadTMP, $folder.$fileupload);



$sql = "INSERT INTO `ccc`(`image`) VALUES ('$fileupload')";

$qry = mysqli_query($connection, $sql);



if ($qry) {

 echo "uploaded";

}





 



}

?>




<html>

<body>




<?php



$connection = mysqli_connect("localhost", "root", "", "aaa");

if ($connection) {

 echo "connected";

}

$select = " SELECT * FROM `ccc` " ;

$query = mysqli_query($connection, $select) ;



while($row = mysqli_fetch_array($query)) {

 $image = $row['image'];


  //	"<img src='img/".$image."' " height='300px' width='250px'/> ";
 
 echo '<img src="img/"'.$image.'" height="150" width="150" >';
 

}





?>











 <form method="post" action="" enctype="multipart/form-data">

<input type="file" name="fileupload" />

<input type="submit" name="fileuploadsubmit" />

 </form>

</body>

</html>