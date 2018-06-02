<?php
             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             error_reporting(0);
             session_start();

            $link = mysqli_connect("localhost", "root", "", "project");

            $sql= "select * from count;";

            $result=mysqli_query($link,$sql);
            if($result==TRUE)
            
            $pho = array();
            $name =array();
            $price =array();
            $i=0;
            while($row = mysqli_fetch_assoc($result))
            {

                              $pho[$i]= $row['image'];
                              $name[$i]= $row['name'];
                              $price[$i]= $row['price'];
                              $i++;
            }


            $sql="select * from laptopinfo ORDER BY RAND() LIMIT 5";//where productname='$inp'";
            $result=mysqli_query($link,$sql);

$count=mysqli_num_rows($result);
echo $count;
   if ($result == TRUE) {
            echo "success1  ";
            } 
            else{
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $name = array();
            $i=0;

          while($row = mysqli_fetch_assoc($result)) {
            echo "hi";
              $name[$i]= $row['name'];
              //$tname[$i]= $row['tablename'];
              $i++;
        }
      $j=0;
      while($j<$i){
        echo $name[$j];
      $j++;
      }



  
?>

<!DOCTYPE html>

<html>
<head>
  <title></title>

<title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script src="jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="easy-autocomplete.min.css"> 
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdn.rawgit.com/smashingboxes/OwlCarousel2/2.0.0-beta.3/dist/owl.carousel.js"></script>
<link href="//cdn.rawgit.com/smashingboxes/OwlCarousel2/2.0.0-beta.3/dist/assets/owl.theme.default.css" rel="stylesheet"/>
<link href="//cdn.rawgit.com/smashingboxes/OwlCarousel2/2.0.0-beta.3/dist/assets/owl.carousel.css" rel="stylesheet"/>


</head>

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


$(window).load(function () {
  $('.owl-carousel').owlCarousel({
    autoWidth: true,
    center: true,
    items: 3,
    loop: true,
    margin: 10,
    autoplay: false,
    autoplayTimeout: 40,
    autoplayHoverPause: true
  });

$('.item').click(function(){
  var val=$(this).find('img:first').attr('src');
  
  console.log(val);

var productname = val.split(".");

  if(val==='')
    return
  $('#btn1').val(productname[0])
  $('#myform').submit()
})



});

 

});

</script>
<style type="text/css">

  .jumbotron {
      background-color: black;
      color: #fff;
  }

.col-sm-4{
  height: 500px;
}

.row{
  background-color: white;
}

.nav{
  margin-top: 0px;
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

  <div class="jumbotron text-center" id="nav">
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

<form action="resultpage.php" method="post" id="myform">
<input type="hidden" name="searchbar" value="" id="btn1">

<div class="owl-carousel owl-theme">
  <div class="item">
     <img src="<?php echo $name[0].".jpg"; ?>" height="250px" width="50px">
         <br><p><b> <?php echo $name[0]?> </b></p>
      </div>
  <div class="item">
    <img src="<?php echo $name[1].".jpg"; ?>" height="250px" width="50px">
         <br><p><b> <?php echo $name[1]?> </b></p>
     </div>
  <div class="item">
    <img src="<?php echo $name[2].".jpg"; ?>" height="250px" width="50px">
         <br><p><b> <?php echo $name[2]?> </b></p>
      </div>
  <div class="item">
 <img src="<?php echo $name[3].".jpg"; ?>" height="250px" width="50px">
         <br><p><b> <?php echo $name[3]?> </b></p>
       </div>
</div>


  
</form>



</body>
</html>