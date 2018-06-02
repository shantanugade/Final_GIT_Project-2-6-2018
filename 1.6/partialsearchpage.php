<?php 

             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             error_reporting(0);
            session_start();  

            $conn = mysqli_connect("localhost", "root", "", "project");

              if (isset($_POST['searchbar']))
              {
              $inp = $_POST['searchbar'];
              //$inp= $_SESSION['aname']; 
              } 

 
              echo $inp;

            $sql="select * from allproduct where productname like '%$inp%'";
            $result=mysqli_query($conn,$sql);

		    if ($result == TRUE) {
            echo "success1  ";
            } 
            else{
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

$count=mysqli_num_rows($result);
echo $count;
$count=$count/2;
echo $count;

            $name = array();
     //       $tname =array();


            $j=0;

			while($j<5){
			    $name[$j]=null;
    			//echo $tname[$j];
				$j++;
			}


			$i=0;

			if ($count > 0) {
    			while($row = mysqli_fetch_assoc($result)) {
        			if($count>0){
        			$name[$i]= $row['productname'];
			        //$tname[$i]= $row['tablename'];
        			$i++;
        			$count--;	}
    			}
    		}
			
			$j=0;


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="easy-autocomplete.min.css"> 

<script type="text/javascript">
	
$(document).ready(function(){
var options = {
  url: "data.json",

  getValue: "name",

  theme:"dark",

  list: {
    match: {
      enabled: true
    }
  }
};

$("#srch").easyAutocomplete(options)

var name1 = '<?php echo $name[0];?>';
var name2 = '<?php echo $name[1];?>';
var name3 = '<?php echo $name[2];?>';
var name4 = '<?php echo $name[3];?>';
var name5 = '<?php echo $name[4];?>';



document.getElementById('p_name1').innerHTML=name1;    
document.getElementById('p_name2').innerHTML=name2;    
document.getElementById('p_name3').innerHTML=name3;    
document.getElementById('p_name4').innerHTML=name4;    
document.getElementById('p_name5').innerHTML=name5;    

var path1 = name1.concat('.jpg');
var path2 = name2.concat('.jpg');
var path3 = name3.concat('.jpg');
var path4 = name4.concat('.jpg');
var path5 = name5.concat('.jpg');

document.getElementById('p_image1').setAttribute('src',path1);
document.getElementById('p_image2').setAttribute('src',path2);
document.getElementById('p_image3').setAttribute('src',path3);
document.getElementById('p_image4').setAttribute('src',path4);
document.getElementById('p_image5').setAttribute('src',path5);



/*
document.getElementById('btn1').setAttribute('value',name1);    
document.getElementById('btn1').setAttribute('value',name2);   
document.getElementById('btn1').setAttribute('value',name3); 
document.getElementById('btn1').setAttribute('value',name4);    
document.getElementById('btn1').setAttribute('value',name5);    
*/

$('.clicker').click(function(){
	var val=$(this).find('p:first').text()
	if(val==='')
		return
	$('#btn1').val(val)
	$('#myform').submit()
})




});
</script>


</head>



<style type="text/css">
	 

	  .jumbotron {
      background-color: black;
      color: #fff;
  }

.navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
 
 #1{
height: 350px;
 }



#layout {
	padding-left: 17%;
	padding-right: 17%
}

.img-responsive{
	height: 350px;
}


</style>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: black">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
   
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homepage.php">HOME</a></li>
        <li><a href="resultpage.php">SEARCH</a></li>
        <li><a href="comparepage.php">COMPARE</a></li>
        
        

      </ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center">
  <h1>Sentiment Analyzer</h1> 
  <h3> We Know And We Care...!!</h3>
  <form class="form-inline" action="partialsearchpage.php" method="post">
    <div class="input-group">
      <input type="" class="form-control" size="50" name="searchbar" id="srch" placeholder="Product Search" required>
      <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" id="srchbtn" >Search</button>
      </div>
    </div>
  </form >
</div> 
<h2 align="center"><b>ALL RESULTS</b></h2>

<div id="layout">
	<form action="resultpage.php" id='myform' method="post">

	<input type="hidden" id="btn1" name="searchbar" value="" ></input>
	<div class="row">
				<div id="1" class="well clicker col-sm-6" align="center">
				
				<div style="height: 400px; ">
				<img src="" id="p_image1" class="img-responsive">
				<font size="4" ><b><p id="p_name1"></p></b></font>
				</div>
				
				

			</div> 

					<div id="1" class="well clicker col-sm-6" align="center">
				
				<div style="height: 400px; ">
				<img src="" id="p_image2" class=" img-responsive">
				<font size="4" ><b><p id="p_name2"></p></b></font>
				</div>
				
				

			</div> 
			
	<div class="row">
					<div id="1" class="well clicker col-sm-6" align="center">
				
				<div style="height: 400px; ">
				<img src="" id="p_image3" class="img-responsive">
				<font size="4" ><b><p id="p_name3"></p></b></font>
				</div>
				
				

			</div> 
			
						<div id="1" class="well clicker col-sm-6" align="center">
				
				<div style="height: 400px; ">
				<img src="" id="p_image4" class="img-responsive">
				<font size="4" ><b><p id="p_name4"></p></b></font>
				</div>
				
				

			</div>
			 
	</div>
	<div class="row">
					<div id="1" class="well clicker col-sm-6" align="center">
				
				<div style="height: 400px; ">
				<img src="" id="p_image5" class="img-responsive">
				<font size="4" ><b><p id="p_name5"></p></b></font>
				</div>
				
				

			</div> 
				</form>


</div>








</body>
</html>
