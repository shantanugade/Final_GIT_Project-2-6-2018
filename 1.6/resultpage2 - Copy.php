
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script src="jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="easy-autocomplete.min.css">  

  <?php   
             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             
            session_start();
            error_reporting(0);
 $inp = $_SESSION['product_name_from1stpage'];
         $conn = mysqli_connect("localhost", "root", "", "project");


              if (isset($_POST['searchbar']))
              {
              $inp = $_POST['searchbar']; 
              } 
             
              if (isset($_POST['rsearchbar']))
              {
              $inp = $_POST['rsearchbar']; 
              } 

            $sql="select * from allproduct where productname='$inp'";
            $result=mysqli_query($conn,$sql);


            if ($result == TRUE) {
            echo "success1  ";
            } 
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $row=mysqli_fetch_assoc($result);
            
            $name= $row['productname']; 
            $tname= $row['tablename'];
            $feature1= $row['feature1']; 
            $feature2= $row['feature2']; 
            $feature3= $row['feature3']; 
            $feature4= $row['feature4']; 
            $feature5= $row['feature5']; 

           $conn2 = mysqli_connect("localhost", "root", "", "project");
//           $sql2 = "select * from '$tname' where name = '$inp'";

           $sql2="select * from `".$tname."` where `name`='$inp'";
            $result=mysqli_query($conn2,$sql2);

            if ($result == TRUE) {
            echo "success 2";
            } 
            else {
            echo "Error: " . $sql2 . "<br>" . $conn2->error;
            }

            $row=mysqli_fetch_assoc($result);

            $price_amz = $row['price'];
            $rating_amz = $row['rating'];
            $link_amz = $row['link'];
            $pos_amz = $row['pos'];
            $neg_amz = $row['neg'];
            $mix_amz = $row['mix'];
            $feature1val_amz= $row[$feature1]; 
            $feature2val_amz= $row[$feature2]; 
            $feature3val_amz= $row[$feature3]; 
            $feature4val_amz= $row[$feature4]; 
            $feature5val_amz= $row[$feature5]; 
            
//flipkart
           $conn_f1 = mysqli_connect("localhost", "root", "", "project");
//           $sql2 = "select * from '$tname' where name = '$inp'";

            $sql_f1="select * from allproduct where productname='$inp' and tablename like '%f' ";
            $result=mysqli_query($conn_f1,$sql_f1);
          
            $row=mysqli_fetch_assoc($result);
          
            $tname_flip= $row['tablename'];

           $sql_f2="select * from `".$tname_flip."` where `name`='$inp'";
            $result=mysqli_query($conn2,$sql_f2);

            if ($result == TRUE) {
            echo "success f2";
            } 
            else {
            echo "Error: " . $sql2 . "<br>" . $conn_f2->error;
            }

            $row=mysqli_fetch_assoc($result);

            $price_flip = $row['price'];
            $rating_flip = $row['rating'];
            $link_flip = $row['link'];
            $pos_flip = $row['pos'];
            $neg_flip = $row['neg'];
            $mix_flip = $row['mix'];
            $feature1val_flip= $row[$feature1]; 
            $feature2val_flip= $row[$feature2]; 
            $feature3val_flip= $row[$feature3]; 
            $feature4val_flip= $row[$feature4]; 
            $feature5val_flip= $row[$feature5]; 


              if (isset($_POST['name']))
                {
                $personname = (string)$_POST['name']; 
                } 
              if (isset($_POST['email']))
                {
                $email = (string)$_POST['email']; 
                } 
              if (isset($_POST['comments']))
                {
                $comment = (string)$_POST['comments']; 
                } 

              
              echo $product_name;
              echo $personname;
              echo $email;
              echo $comment;

                $product_name=$inp;



            $link1 = mysqli_connect("localhost", "root", "", "project");
            $sql="insert into review (product,name,email,reviews) values ('$product_name','$personname','$email','$comment')";
            #$sql="insert into review (product,name,email,reviews) values ('$name','$_POST['name']','$_POST['email']','$_POST['comments']')";
            $result=mysqli_query($link1,$sql);

            if ($result == TRUE) {
                     echo "New record xyz created successfully";
            } 

            else {
              
               #echo "Error: " . $sql . "<br>" . $conn->error;
            }

 



        ?>

<script type="text/javascript">
$(document).ready(function(){
        
        var name= '<?php echo $name?>';
        var pos_amz = '<?php echo $pos_amz ?>';
        var neg_amz = '<?php echo $neg_amz ?>';
        var mix_amz = '<?php echo $mix_amz ?>';
        var link_amz = '<?php echo $link_amz ?>';
        var price = '<?php echo $price_amz ?>';
        var rating_amz = '<?php echo $rating_amz ?>';
        var pos_flip = '<?php echo $pos_flip ?>';
        var neg_flip = '<?php echo $neg_flip ?>';
        var mix_flip = '<?php echo $mix_flip ?>';
        var link_flip = '<?php echo $link_flip ?>';
        
        var feature_name1='<?php echo $feature1?>';
        var feature_name2='<?php echo $feature2?>';
        var feature_name3='<?php echo $feature3?>';
        var feature_name4='<?php echo $feature4?>';
        var feature_name5='<?php echo $feature5?>';
        //var price = '<?php echo $price_amz ?>';
        //var rating_amz = '<?php echo $rating_amz ?>';

         var feature_val_flip_1 = '<?php echo $feature1val_flip?>'; 
          var feature_val_flip_2 = '<?php echo $feature2val_flip?>'; 
         var feature_val_flip_3 = '<?php echo $feature3val_flip?>'; 
         var feature_val_flip_4 = '<?php echo $feature4val_flip?>'; 
         var feature_val_flip_5 = '<?php echo $feature5val_flip?>'; 
           
                
           var feature_val_amz_1 = '<?php echo $feature1val_amz ?>';
           var feature_val_amz_2 = '<?php echo $feature2val_amz ?>';
           var feature_val_amz_3 = '<?php echo $feature3val_amz ?>';
           var feature_val_amz_4 = '<?php echo $feature4val_amz ?>';
           var feature_val_amz_5 = '<?php echo $feature5val_amz ?>';
            
           var feature_val_1= feature_val_flip_1+feature_val_amz_1; 
           var feature_val_2= feature_val_flip_2+feature_val_amz_2;
           var feature_val_3= feature_val_flip_3+feature_val_amz_3;
           var feature_val_4= feature_val_flip_4+feature_val_amz_4;
           var feature_val_5= feature_val_flip_5+feature_val_amz_5;





        console.log(pos_amz);
        console.log(neg_amz);
        console.log(mix_amz);
        console.log(link_amz);
        console.log(link_flip);
        
        pos_amz= parseInt(pos_amz);
        neg_amz= parseInt(neg_amz);
        mix_amz= parseInt(mix_amz);
        
         pos_flip= parseInt(pos_flip);
        neg_flip= parseInt(neg_flip);
        mix_flip= parseInt(mix_flip);
        

         console.log(name);
        document.getElementById('cmpbtn').setAttribute('value',name);

        var p_name = "Name: ".concat(name);
        document.getElementById("product_name").innerHTML=p_name;

          var p_image = name.concat(".jpg");
          document.getElementById("productimg").setAttribute('src', p_image);
          console.log(p_image);

        price = "Price: ".concat(price);
        document.getElementById("product_price").innerHTML=price;

        rating_amz = "Rating:" .concat(rating_amz);
         document.getElementById("product_rating").innerHTML=rating_amz;



        document.getElementById("product_link1").setAttribute('href', link_amz);
        document.getElementById("product_link2").setAttribute('href', link_flip);


      
     
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['', '%'],
          ['Positive',pos_amz],
          ['Negative',neg_amz],
          ['Mix', mix_amz]
          
          
        ]);

        var options = {
          title: 'Sentiment Analysis(Amazon)',
          is3D: true,
        //pieHole:0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie1'));

        chart.draw(data, options);
      }


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['', '%'],
          ['Positive',pos_flip],
          ['Negative',neg_flip],
          ['Mix', mix_flip]
          
          
        ]);

        var options = {
          title: 'Sentiment Analysis(Flipkart)',
          is3D: true,
        //pieHole:0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie2'));

        chart.draw(data, options);
      }


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['', '%'],
          ['Positive',pos_amz+pos_flip],
          ['Negative',neg_amz+neg_flip],
          ['Mix', mix_amz+mix_flip]
          
          
        ]);

        var options = {
          title: 'Sentiment Analysis (Overall)',
      is3D: true,
      //  pieHole:0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie3'));

        chart.draw(data, options);
      }


         google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawbarchart);

      function drawbarchart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Positive', 'Negative' ],
          [feature_name1, feature_val_1,100-feature_val_1 , ],
          [feature_name2, feature_val_2, 100 - feature_val_2, ],
          [feature_name3, feature_val_3, 100 - feature_val_3, ],
          [feature_name4, feature_val_4, 100 - feature_val_4, ],
          [feature_name5, feature_val_5,100 - feature_val_5 ]
        ]);

        var options = {
          chart: {
            title: ' Feature based Analysis',
            subtitle: 'Positive or Negative',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('graph'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

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



});//ready
  </script>



  <style>
  .jumbotron {
      background-color: black;
      color: #fff;
  }

  #productimg{
    float: left;
    width: 40%;
    height: 500px;  
  }

  #productinfo
  {
  width: 20%;
  height: 520px;
  }


  #review{
    padding-left: 15%;
    padding-right: 15%;
    background-color:   #f2f2f2;
  }

#pie{
  float: right;
  width: 40%;
  height: 500px;
}

#pie1{
  float: right;
  width: 50%;
  height: 250px;
}

#pie2{
  float: right;
  width:50%;
  height: 250px;
}
#pie3{
  float: right;
  width: 100%;
  height: 250px;
}

#graph{
   
  width: 100%;
  height: 250px;
  padding-right: 200px;
  padding-left: 200px;

}

#image{
  width: 40%;
  height: 520px;  
}

#pie1{
  padding-left:10px; 
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


</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: black">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homepage.php">our image</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homepage.php">HOME</a></li>
        <li><a href="resultpage.php">SEARCH</a></li>
        <li><a href="comparepage.php">COMPARE</a></li>
        <li><a href="#services">ADD PRODUCT</a></li>
        

      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Sentiment Analyzer</h1> 
  <h3> We Know And We Care...!!</h3>
  <form class="form-inline" action="resultpage.php" method="post">
    <div class="input-group">
      <input type="" class="form-control" id="srch" size="50" name="rsearchbar" placeholder="Product Search" required>
      <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" id="srchbtn" >Search</button>
      </div>
    </div>
  </form >
</div> 


    <div class="container-fluid" id="product">
   
      <div id="image"  class="col-sm-3 ">
          <img src="" class="thumbnail img-responsive" style="width: 100%; height:;" id="productimg" >
      </div>     

        <div  id="productinfo" class="col-sm-3 . well" align="center" > 
           <font size="5"><b id="product_name"> </b><br><br> 
           <b id="product_price"> </b><br><br>
           <b id="product_rating"></b><br><br>
 


         <br><b>Links:</b><br><br></font>
           <a id="product_link1" href="" target="_blank"><img src="amazon_icon.jpg" height="50" width="50" ></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           <a id="product_link2" href="" target="_blank"> <img src="flipkart_icon.jpg" height="50" width="50"></a><br>
           <font size="3" > <b>Compare:</b></font><br>
            <form action="comparepage.php" method="post">
          <input type="submit" name="cmp1" class="btn btn-danger" value="" id="cmpbtn">
        </form>

        </div>

        <div id="pie" >
           <div id="pie1" class="well" ></div>
           <div id="pie2" class="well"></div>
           <div id="pie3" class="well"></div>

        </div>
        
        <div id="graph" class="col-sm-6 slideanim">
          
        </div>

    </div>
    
  
  


    <form action="resultpage2.php" method="post"> 
    <div class="" id="review">
      <h3 align="center"> Add Reviews:</h3>
      <div class="row" id="name">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group" >
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div >
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
   </form> 

</body>
</html>
