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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="easy-autocomplete.min.css"> 
    

  <?php   
             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             error_reporting(0);
            session_start();  

            $conn = mysqli_connect("localhost", "root", "", "project");

 $inp= $_SESSION['aname'];
//echo "hi";
//echo $inp;
// session_destroy();
              if (isset($_POST['searchbar']))
              {
              $inp = $_POST['searchbar'];
              //$inp= $_SESSION['aname']; 
              } 
             
              if (isset($_POST['rsearchbar']))
              {
              $inp = $_POST['rsearchbar']; 
              // $inp= $_SESSION['aname'];
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
/*
            if ($result == TRUE) {
            echo "success 2";
            } 
            else {
            echo "Error: " . $sql2 . "<br>" . $conn2->error;
            }
*/
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

         /*   echo $price_flip ;//= $row['price'];
            echo $rating_flip ;//= $row['rating'];
            echo $link_flip ;//= $row['link'];
            echo $pos_flip;// = $row['pos'];
            echo $neg_flip ;//= $row['neg'];
            echo $mix_flip ;//= $row['mix'];
            echo $feature1val_flip;//= $row[$feature1]; 
            echo $feature2val_flip;//= $row[$feature2]; 
            echo $feature3val_flip;//= $row[$feature3]; 
            echo $feature4val_flip;//= $row[$feature4]; 
            echo $feature5val_flip;//= $row[$feature5]; 
				 */  
				   
           $conn0 = mysqli_connect("localhost", "root", "", "project");
//           $sql2 = "select * from '$tname' where name = '$inp'";

            $sql_f1="select * from price_prediction where name='$inp'";//" and tablename like '%f' ";
            $result=mysqli_query($conn_f1,$sql_f1);
          
            $row=mysqli_fetch_assoc($result);
          
				   $d1=$row['d1'];
           $d2=$row['d2'];
           $d3=$row['d3'];
           $d4=$row['d4'];
           $d5=$row['d5'];
           $d6=$row['d6'];
           $d7=$row['d7'];
           $d8=$row['d8'];
           $d9=$row['d9'];
           $d10=$row['d10'];
           $d11=$row['d11'];
           $d12=$row['d12'];
				  // echo $d1;
				   
            mysqli_close($conn);

                       $_SESSION['product_name_from1stpage'] = $name; 
                   //    $product_name = $_SESSION['product_name_from2ndpage'];
				   
				   
              if (isset($_POST['name']))
                {
                $personname = $_POST['name']; 
                } 
              if (isset($_POST['email']))
                {
                $email = $_POST['email']; 
                } 
              if (isset($_POST['comments']))
                {
                $comment = $_POST['comments']; 



                echo $name;
                echo $email;
                echo $comment;
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

         var feature_val_flip_1 = parseInt('<?php echo $feature1val_flip?>'); 
          var feature_val_flip_2 = parseInt('<?php echo $feature2val_flip?>'); 
         var feature_val_flip_3 = parseInt('<?php echo $feature3val_flip?>'); 
         var feature_val_flip_4 = parseInt('<?php echo $feature4val_flip?>'); 
         var feature_val_flip_5 = parseInt('<?php echo $feature5val_flip?>'); 
           
                
           var feature_val_amz_1 = parseInt('<?php echo $feature1val_amz ?>');
           var feature_val_amz_2 = parseInt('<?php echo $feature2val_amz ?>');
           var feature_val_amz_3 = parseInt('<?php echo $feature3val_amz ?>');
           var feature_val_amz_4 = parseInt('<?php echo $feature4val_amz ?>');
           var feature_val_amz_5 = parseInt('<?php echo $feature5val_amz ?>');
            
           var feature_val_1_pos= (feature_val_flip_1+feature_val_amz_1)/2; 
           var feature_val_2_pos= (feature_val_flip_2+feature_val_amz_2)/2;
           var feature_val_3_pos= (feature_val_flip_3+feature_val_amz_3)/2;
           var feature_val_4_pos= (feature_val_flip_4+feature_val_amz_4)/2;
           var feature_val_5_pos= (feature_val_flip_5+feature_val_amz_5)/2;

            
           var feature_val_1_neg= (100- feature_val_flip_1+ 100 - feature_val_amz_1)/2; 
           var feature_val_2_neg= (100 - feature_val_flip_2+ 100 - feature_val_amz_2)/2;
           var feature_val_3_neg= (100 - feature_val_flip_3+100 - feature_val_amz_3)/2;
           var feature_val_4_neg= (100- feature_val_flip_4+ 100- feature_val_amz_4)/2;
           var feature_val_5_neg= (100 - feature_val_flip_5+100 -feature_val_amz_5)/2;


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

        document.getElementById('cmpbtn').setAttribute('value',name);
/*
        $('cmpbtn').click(function(){
          window.location.href='comparepage.php?compare1='+name;
        });*/
      
     
        var d1 = '<?php echo $d1 ?>';
        var d2 = '<?php echo $d2 ?>';
        var d3 = '<?php echo $d3 ?>';
        var d4 = '<?php echo $d4 ?>';
        var d5 = '<?php echo $d5 ?>';
        var d6 = '<?php echo $d6 ?>';
        var d7 = '<?php echo $d7 ?>';
        var d8 = '<?php echo $d8 ?>';
        var d9 = '<?php echo $d9 ?>';
        var d10 = '<?php echo $d10 ?>';
        var d11 = '<?php echo $d11 ?>';
        var d12 = '<?php echo $d12 ?>';
           

        var date1 = d1.split(".");
        var date2 = d2.split(".");
        var date3 = d3.split(".");
        var date4 = d4.split(".");
        var date5 = d5.split(".");
        var date6 = d6.split(".");
        var date7 = d7.split(".");
        var date8 = d8.split(".");
        var date9 = d9.split(".");
        var date10 = d10.split(".");
        var date11 = d11.split(".");
        var date12 = d12.split(".");






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
          [feature_name1, feature_val_1_pos,100-feature_val_1_pos , ],
          [feature_name2, feature_val_2_pos, 100 - feature_val_2_pos, ],
          [feature_name3, feature_val_3_pos, 100 - feature_val_3_pos, ],
          [feature_name4, feature_val_4_pos, 100 - feature_val_4_pos, ],
          [feature_name5, feature_val_5_pos,100 - feature_val_5_pos ]
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

google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Month');
      data.addColumn('number', 'Price');

      data.addRows([
        [new Date(parseInt(date1[1]), parseInt(date1[0])),  parseInt(date1[2]), ],
        [new Date(parseInt(date2[1]), parseInt(date2[0])),  parseInt(date2[2]), ],
        [new Date(parseInt(date3[1]), parseInt(date3[0])),  parseInt(date3[2]),  ],
        [new Date(parseInt(date4[1]), parseInt(date4[0])),  parseInt(date4[2]), ],
        [new Date(parseInt(date5[1]), parseInt(date5[0])),  parseInt(date5[2]), ],
        [new Date(parseInt(date6[1]), parseInt(date6[0])),  parseInt(date6[2]), ],
        [new Date(parseInt(date7[1]), parseInt(date7[0])),  parseInt(date7[2]), ],
        [new Date(parseInt(date8[1]), parseInt(date8[0])),  parseInt(date8[2]), ],
        [new Date(parseInt(date9[1]), parseInt(date9[0])),  parseInt(date9[2]), ],
        [new Date(parseInt(date10[1]), parseInt(date10[0])),  parseInt(date10[2]), ],
        [new Date(parseInt(date11[1]), parseInt(date11[0])),  parseInt(date11[2]),  ],
        [new Date(parseInt(date12[1]), parseInt(date12[0])),  parseInt(date12[2]),  ]
       
      ]);

      var options = {
        chart: {
          title: 'Price Prediction',
          subtitle: ''
        },


        width: 900,
        height: 250,
      

        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('linechart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }






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
 
 #linechart{
   
  width: 100%;
  height: 100px;
  padding-right: 200px;
  padding-left: 200px;

}
#line
{
  padding-top: 20px;
        
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


    <div class="container-fluid" id="product">
   
      <div id="image"  class="col-sm-3 ">
          <img src="" class="thumbnail img-responsive" style="width: 100%; height:;" id="productimg" >
      </div>     

        <div  id="productinfo" class="col-sm-3 . well" align="center"> 
           <font size="5"><b id="product_name"> </b><br><br> 
           <b id="product_price"> </b><br><br>
           <b id="product_rating"></b><br>
 


         <br><b>Links:</b><br><br></font>
           <a id="product_link1" href="" target="_blank"><img src="amazon_icon.jpg" height="50" width="50" ></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           <a id="product_link2" href="" target="_blank"> <img src="flipkart_icon.jpg" height="50" width="50"></a>
       <br><br>   
          <font size="3"><b>Compare:</b></font><br>
        <form action="comparepage.php" method="post">
          <input type="submit" name="cmp1" class="btn btn-danger" value="" id="cmpbtn">
        </form>
                  </div>

        <div id="pie" >
           <div id="pie1" class="well" ></div>
           <div id="pie2" class="well"></div>
           <div id="pie3" class="well"></div>

        </div>
        <div >
        <div id="graph" class="col-sm-6 row" >
          
        </div>
</div>
      
      <div class="row" class="" id="line">
        
                <div id="linechart" class="col-sm-6 " >
        <h4>Price prediction:</h4>  
        </div>
      </div>

    </div>
    
  
  


<!--     <form action="resultpage2.php" method="post"> 
    <div class="row" id="review">
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
 -->
</body>
</html>
