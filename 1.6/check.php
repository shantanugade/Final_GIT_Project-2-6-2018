
  <?php   
             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             error_reporting(0);
            session_start();

            $link = mysqli_connect("localhost", "root", "", "project");

$name="sdv";
$name_review="sdvds";
$email="dsvdv";
$comment="sdvds";

            $sql="insert into review (product,name,email,reviews) values ('$name','$name_review','$email','$comment')";
            
            $result=mysqli_query($link,$sql);
if($result==TRUE)
	echo "sucees";
else
             echo "Error: " . $sql . "<br>" . $conn->error;

?>