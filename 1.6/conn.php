 <?php   
             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";


            $link = mysqli_connect("localhost", "root", "", "project");
            if($link==TRUE)
            echo "Connected Successfully";
/*
$name2="sdc";
$name="cc";
$email="csdc";
$comment="dsc";

*/
/*            $sql= "insert into review (product,name,email,reviews) values ('$name2','$name','$email','$comment')";
            $result=mysqli_query($link,$sql);
*/
            if($result==TRUE)
            echo "Connected Successfully";



               $sql= "select * from count where mix = 0";
             $result=mysqli_query($link,$sql);

               $row = mysqli_fetch_assoc($result);
                       $name2= $row['name']; 
                              $pos2= $row['pos'];
                              $neg2= $row['neg'];
                              $pho= $row['image'];
                              $flag=0;  
                      
 				//$imgpath= 'data:image/jpeg;base64,'.base64_encode($pho);	
 				//$data ="ho";
  //              echo $imgpath;                       
//
             ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script type="text/javascript">
	


</script>
<body>
<div>
	<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode( $pho).'" width="200" height="500"/>';

?>
</div>
<div>
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode( $pho).'" width="200" height="500"/>';

?>	

</div>

</body>
</html>
