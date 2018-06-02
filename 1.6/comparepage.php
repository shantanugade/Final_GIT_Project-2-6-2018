<?php
         $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             error_reporting(0);
            session_start();  

            $conn = mysqli_connect("localhost", "root", "", "project");

            //$compare2="Compare Page";
              if (isset($_POST['cmp1']))
              {
              $compare1 = $_SESSION['compare'];
              $compare1 = $_POST['cmp1']; 
              
              } 
          
              
              if (isset($_POST['cmp2']))
              {
              
              $compare2 = $_POST['cmp2']; 
              //$compare1 = $_SESSION['compare'];
             
              } 

               $_SESSION['compare']=$compare1; 

            $sql1="select * from allproduct where productname='$compare1'";
            $sql2="select * from allproduct where productname='$compare2'";
            
            $result1=mysqli_query($conn,$sql1);

            $result2=mysqli_query($conn,$sql2);

    /*        if ($result == TRUE) {
            echo "success1  ";
            } 
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
*/
            $row=mysqli_fetch_assoc($result1);
            
            $name1= $row['productname']; 
            $tname1= $row['tablename'];
            $feature1_1= $row['feature1']; 
            $feature2_1= $row['feature2']; 
            $feature3_1= $row['feature3']; 
            $feature4_1= $row['feature4']; 
            $feature5_1= $row['feature5']; 


            $row=mysqli_fetch_assoc($result2);
            
            $name2= $row['productname']; 
            $tname2= $row['tablename'];
            $feature1_2= $row['feature1']; 
            $feature2_2= $row['feature2']; 
            $feature3_2= $row['feature3']; 
            $feature4_2= $row['feature4']; 
            $feature5_2= $row['feature5']; 


/*
            echo $name;            
            $tname = (string)$tname;
            echo $tname;            
            echo $feature1;
            echo "dfvf";    */      
//            mysqli_close($conn);

            //$conn = mysqli_connect("localhost", "root", "", "project");
//         
           $conn2 = mysqli_connect("localhost", "root", "", "project");
//           $sql2 = "select * from '$tname' where name = '$inp'";
            $sql3="select * from `".$tname1."` where `name`='$compare1'";
          
           $sql4="select * from `".$tname2."` where `name`='$compare2'";
            
            $result3=mysqli_query($conn2,$sql3);

            $result4=mysqli_query($conn2,$sql4);
  /*          if ($result == TRUE) {
            echo "success 2";
            } 
            else {
            echo "Error: " . $sql2 . "<br>" . $conn2->error;
            }
*/
            $row=mysqli_fetch_assoc($result3);

            $price_amz_1 = $row['price'];
            $rating_amz_1 = $row['rating'];
            $link_amz_1 = $row['link'];
            $pos_amz_1 = $row['pos'];
            $neg_amz_1 = $row['neg'];
            $mix_amz_1 = $row['mix'];
            $feature1val_amz_1= $row[$feature1_1]; 
            $feature2val_amz_1= $row[$feature2_1]; 
            $feature3val_amz_1= $row[$feature3_1]; 
            $feature4val_amz_1= $row[$feature4_1]; 
            $feature5val_amz_1= $row[$feature5_1]; 
            

            $row=mysqli_fetch_assoc($result4);

            $price_amz_2 = $row['price'];
            $rating_amz_2 = $row['rating'];
            $link_amz_2 = $row['link'];
            $pos_amz_2 = $row['pos'];
            $neg_amz_2 = $row['neg'];
            $mix_amz_2 = $row['mix'];
            $feature1val_amz_2= $row[$feature1_2]; 
            $feature2val_amz_2= $row[$feature2_2]; 
            $feature3val_amz_2= $row[$feature3_2]; 
            $feature4val_amz_2= $row[$feature4_2]; 
            $feature5val_amz_2= $row[$feature5_2]; 
            
            echo $feature1val_amz_1;

            mysqli_close($conn);
            

//////////////////flipkart///////////////////////

            $conn_f1 = mysqli_connect("localhost", "root", "", "project");
//           $sql2 = "select * from '$tname' where name = '$inp'";

            $sql_f1_1="select * from allproduct where productname='$compare1' and tablename like '%f' ";
           
            $sql_f1_2="select * from allproduct where productname='$compare2' and tablename like '%f' ";

            $result1=mysqli_query($conn_f1,$sql_f1_1);
          
            $result2=mysqli_query($conn_f1,$sql_f1_2);
            
            $row=mysqli_fetch_assoc($result1);
          
            $tname_flip_1= $row['tablename'];


            $row=mysqli_fetch_assoc($result2);
          
            $tname_flip_2= $row['tablename'];

           $sql_f2_1="select * from `".$tname_flip_1."` where `name`='$compare1'";

           $sql_f2_2="select * from `".$tname_flip_2."` where `name`='$compare2'";


            $result1=mysqli_query($conn2,$sql_f2_1);

            $result2=mysqli_query($conn2,$sql_f2_2);


            if ($result == TRUE) {
            echo "success f2";
            } 
            else {
            echo "Error: " . $sql2 . "<br>" . $conn_f2->error;
            }

            $row=mysqli_fetch_assoc($result1);

            $price_flip_1 = $row['price'];
            $rating_flip_1 = $row['rating'];
            $link_flip_1 = $row['link'];
            $pos_flip_1 = $row['pos'];
            $neg_flip_1 = $row['neg'];
            $mix_flip_1 = $row['mix'];
            $feature1val_flip_1= $row[$feature1_1]; 
            $feature2val_flip_1= $row[$feature2_1]; 
            $feature3val_flip_1=$row[$feature3_1]; 
            $feature4val_flip_1= $row[$feature4_1]; 
            $feature5val_flip_1= $row[$feature5_1]; 

             echo $feature1val_flip_1; 

 $row=mysqli_fetch_assoc($result2);

            $price_flip_2 = $row['price'];
            $rating_flip_2 = $row['rating'];
            $link_flip_2 = $row['link'];
            $pos_flip_2 = $row['pos'];
            $neg_flip_2 = $row['neg'];
            $mix_flip_2 = $row['mix'];
            $feature1val_flip_2= $row[$feature1_2]; 
            $feature2val_flip_2= $row[$feature2_2]; 
            $feature3val_flip_2= $row[$feature3_2]; 
            $feature4val_flip_2= $row[$feature4_2]; 
            $feature5val_flip_2= $row[$feature5_2]; 


        ?>


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
   

  
<script type="text/javascript">
$(document).ready(function(){
        
            var cmp1 = '<?php echo $compare1;?>';
            var cmp2 = '<?php echo $compare2;?>';
           
            var name1 = '<?php echo $name1;?>';
           
            var pos1_amz = parseInt('<?php echo $pos_amz_1;?>');
            var neg1_amz = parseInt('<?php echo $neg_amz_1;?>');
            var mix1_amz = parseInt('<?php echo $mix_amz_1;?>');
           
            var name2 = '<?php echo $name2;?>';
           
            var pos2_amz = parseInt('<?php echo $pos_amz_2;?>');
            var neg2_amz = parseInt('<?php echo $neg_amz_2;?>');
            var mix2_amz = parseInt('<?php echo $mix_amz_2;?>');
           
            var feature_name1_1 = '<?php echo $feature1_1;?>';
            var feature_name1_2= '<?php echo $feature2_1;?>';
            var feature_name1_3 = '<?php echo $feature3_1;?>';
            var feature_name1_4= '<?php echo $feature4_1;?>';
            var feature_name1_5 = '<?php echo $feature5_1;?>';
           
            var feature_name2_1= '<?php echo $feature1_2;?>';
            var feature_name2_2 = '<?php echo $feature2_2;?>';
            var feature_name2_3= '<?php echo $feature3_2;?>';
            var feature_name2_4 = '<?php echo $feature4_2;?>';
            var feature_name2_5= '<?php echo $feature5_2;?>';
           
            var feature_name1_1_val_amz= parseInt('<?php echo $feature1val_amz_1;?>');          
            var feature_name1_2_val_amz= parseInt('<?php echo $feature2val_amz_1;?>');          
            var feature_name1_3_val_amz= parseInt('<?php echo $feature3val_amz_1;?>');          
            var feature_name1_4_val_amz= parseInt('<?php echo $feature4val_amz_1;?>');          
            var feature_name1_5_val_amz= parseInt('<?php echo $feature5val_amz_1;?>');          
          
           console.log(feature_name1_1_val_amz);
           console.log(feature_name1_2_val_amz);
           console.log(feature_name1_3_val_amz);
           console.log(feature_name1_4_val_amz);
           console.log(feature_name1_5_val_amz);


            var feature_name2_1_val_amz= parseInt('<?php echo $feature1val_amz_2;?>');          
            var feature_name2_2_val_amz= parseInt('<?php echo $feature2val_amz_2;?>');          
            var feature_name2_3_val_amz= parseInt('<?php echo $feature3val_amz_2;?>');          
            var feature_name2_4_val_amz= parseInt('<?php echo $feature4val_amz_2;?>');          
            var feature_name2_5_val_amz= parseInt('<?php echo $feature5val_amz_2;?>');          

           

            var link1_amz = '<?php echo $link_amz_1 ?>';
            var link2_amz = '<?php echo $link_amz_2 ?>';

           var price1_amz = '<?php echo $price_amz_1 ?>';  
           var rating1_amz='<?php echo $rating_amz_1 ?> '; 
           

           var price2_amz = '<?php echo $price_amz_2 ?>';  
           var rating2_amz='<?php echo $rating_amz_2 ?> ';  

//////////////////////////////////////////////////////////////////////////////////////////////

          var price2_flip =   '<?php echo $price_flip_2 ?>';  
          var rating2_flip = ' <?php echo $rating_flip_2 ?>';  //= $row['rating'];
          var link2_flip=' <?php echo $link_flip_2 ?>';    //= $row['link'];
          var pos2_flip=parseInt('<?php echo $pos_flip_2 ?>');   //= $row['pos'];
          var neg2_flip= parseInt('<?php echo $neg_flip_2 ?>');  //= $row['neg'];
          var mix2_flip = parseInt ('<?php echo $mix_flip_2 ?>');  //= $row['mix'];
         var feature_name_2_1_val_flip =parseInt('<?php echo $feature1val_flip_2 ?>');  //= $row[$feature1]; 
          var feature_name_2_2_val_flip =parseInt('<?php echo $feature2val_flip_2 ?>');  //= $row[$feature1]; 
         var feature_name_2_3_val_flip =parseInt('<?php echo $feature3val_flip_2 ?>');  //= $row[$feature1]; 
         var feature_name_2_4_val_flip =parseInt('<?php echo $feature4val_flip_2 ?>');  //= $row[$feature1]; 
         var feature_name_2_5_val_flip =parseInt('<?php echo $feature5val_flip_2 ?>');  //= $row[$feature1]; 

           var price1_flip =   '<?php echo $price_flip_1 ?>';  
          var rating1_flip = ' <?php echo $rating_flip_1 ?>';  //= $row['rating'];
          var link1_flip=' <?php echo $link_flip_1 ?>';    //= $row['link'];
        var pos1_flip=parseInt('<?php echo $pos_flip_1 ?>');   //= $row['pos'];
          var neg1_flip= parseInt('<?php echo $neg_flip_1 ?>');  //= $row['neg'];
          var mix1_flip = parseInt ('<?php echo $mix_flip_1 ?>');  //= $row['mix'];
         var feature_name_1_1_val_flip =parseInt('<?php echo $feature1val_flip_1 ?>');  //= $row[$feature1]; 
          var feature_name_1_2_val_flip =parseInt('<?php echo $feature2val_flip_1 ?>');  //= $row[$feature1]; 
         var feature_name_1_3_val_flip =parseInt('<?php echo $feature3val_flip_1 ?>');  //= $row[$feature1]; 
         var feature_name_1_4_val_flip =parseInt('<?php echo $feature4val_flip_1 ?>');  //= $row[$feature1]; 
         var feature_name_1_5_val_flip =parseInt('<?php echo $feature5val_flip_1 ?>');  //= $row[$feature1]; 

             console.log(feature_name_1_1_val_flip);
            console.log(feature_name_1_2_val_flip);  
            console.log(feature_name_1_3_val_flip);
            console.log(feature_name_1_4_val_flip);
            console.log(feature_name_1_5_val_flip);


/*
console.log(pos1_flip);
console.log(neg1_flip);
console.log(mix1_flip);*/





                   
    var feature_name1_1_val =  (feature_name_1_1_val_flip +feature_name1_1_val_amz)/2 ;                 
    var feature_name1_2_val =  (feature_name_1_2_val_flip + feature_name1_2_val_amz)/2 ;
    var feature_name1_3_val =  (feature_name_1_3_val_flip + feature_name1_3_val_amz)/2 ;
    var feature_name1_4_val =  (feature_name_1_4_val_flip + feature_name1_4_val_amz )/2;
    var feature_name1_5_val =  (feature_name_1_5_val_flip + feature_name1_5_val_amz )/2;

     var feature_name2_1_val =  (feature_name_2_1_val_flip + feature_name2_1_val_amz)/2 ;                 
    var feature_name2_2_val =  (feature_name_2_2_val_flip +  feature_name2_2_val_amz )/2;
    var feature_name2_3_val =  (feature_name_2_3_val_flip +  feature_name2_3_val_amz) /2;
    var feature_name2_4_val =  (feature_name_2_4_val_flip +  feature_name2_4_val_amz)/2 ;
    var feature_name2_5_val =  (feature_name_2_5_val_flip +  feature_name2_5_val_amz)/2 ;

            console.log(feature_name1_1_val);
            console.log(feature_name1_2_val);
            console.log(feature_name1_3_val);
            console.log(feature_name1_4_val);
            console.log(feature_name1_5_val);
            



    var pos1= pos1_flip + pos1_amz;
    var neg1 = neg1_flip+neg1_amz;
    var mix1 = mix1_flip+mix1_amz;

    var pos2= pos2_flip + pos2_amz;
    var neg2= neg2_flip+neg2_amz;
    var mix2 = mix2_flip+mix2_amz;


    


      var path1= name1.concat(".jpg");
      document.getElementById('product1').setAttribute('src',path1);


      var path2= name2.concat(".jpg");
      document.getElementById('product2').setAttribute('src',path2);

/*      console.log(path1);
      console.log(path2);
*/      
      var price1_amz= "Rs ".concat(price1_amz); 
      var price2_amz= "Rs ".concat(price2_amz); 


        document.getElementById('p1_amz').setAttribute('href',link1_amz);
        document.getElementById('p1_flip').setAttribute('href',link1_flip);
        document.getElementById('p2_amz').setAttribute('href',link2_amz);
        document.getElementById('p2_flip').setAttribute('href',link2_flip);
        document.getElementById('p1_price').innerHTML=price1_amz;
        document.getElementById('p2_price').innerHTML=price2_amz;
         document.getElementById('p1_name').innerHTML=name1;
        document.getElementById('p2_name').innerHTML=name2;
        document.getElementById('input1').setAttribute('value',cmp1);
        document.getElementById('input2').setAttribute('value',cmp2);



      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', '%'],
          ['Positive',pos1],
          ['Negative',neg1],
          ['Mix', mix1]
          
          
        ]);

        var options = {
          title: 'Sentiment Analysis'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie1'));

        chart.draw(data, options);
      }


         google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawbarchart);

      function drawbarchart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Positive', 'Negative' ],
          [feature_name1_1, feature_name1_1_val, 100-feature_name1_1_val, ],
          [feature_name1_2, feature_name1_2_val, 100-feature_name1_2_val, ],
          [feature_name1_3, feature_name1_3_val, 100-feature_name1_3_val, ],
          [feature_name1_4, feature_name1_4_val, 100-feature_name1_4_val, ],
          [feature_name1_5, feature_name1_5_val, 100-feature_name1_5_val ]
        ]);

        var options = {
          chart: {
            title: 'Feature Based Analysis',
            subtitle: 'Positive or Negative',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('bar1'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

///////////////////////////////

google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['', '%'],
          ['Positive',pos2],
          ['Negative',neg2],
          ['Mix', mix2]
          
          
        ]);

        var options = {
          title: 'Sentiment Analysis'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie2'));

        chart.draw(data, options);
      }

      //   google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawbarchart2);

      function drawbarchart2() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Positive', 'Negative' ],
          [feature_name2_1, feature_name2_1_val, 100-feature_name2_1_val, ],
          [feature_name2_2, feature_name2_2_val, 100-feature_name2_2_val, ],
          [feature_name2_3, feature_name2_3_val, 100-feature_name2_3_val, ],
          [feature_name2_4, feature_name2_4_val, 100-feature_name2_4_val, ],
          [feature_name2_5, feature_name2_5_val, 100-feature_name2_5_val ]
        ]);

        var options = {
          chart: {
            title: 'Feature Based Analysis',
            subtitle: 'Positive or Negative',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('bar2'));

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

$('#input1').easyAutocomplete(options);

$('#input2').easyAutocomplete(options);





});//ready
  </script>



  <style>
  .jumbotron {
      background-color: black;
      color: #fff;
  }

  #rightdiv{ 
    height: 1000px;
    width: 45%;
    float: right; 

  }

  #leftdiv{

    height: 1000px;
    width: 45%;
    float: left;
  }

#info{
  align-items: center;

 height: 1000px;
    width: 90%;

}

  #review{
    padding-left: 15%;
    padding-right: 15%;
    background-color:   #f2f2f2;
    float: bottom;
  }

#imagespace{
  height: 500px;
}

#pie1
{
height: 300px;

}

#pie2
{
height: 300px;
}

#bar1
{
  height: 300px;
}

#bar2
{
  height: 300px;
}

#link{

  height: 100px;
}

#productprice{
  height: 100px;
}

#productname{
  height: 100px;
}


#product1{
  align-items: center;
  height: 450px;
}

#product2{
  align-items: center;
  height: 450px;
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
 
#input1{
  margin-left: 115%;
} 

#input2{
  margin-left: 115%;
} 

.ul.easyAutocomplete.li{
 margin-left: 115%;
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
          <form class="form-inline" action="comparepage.php" method="post">
                <input id="input1" type=""  name="cmp1" placeholder="" size="50" class="form-control" size="50">
                      &nbsp&nbsp&nbsp
                <input id="input2" type="" name="cmp2" placeholder="" size="50" class="form-control">
                  <br><br>
                <input  type="submit" name="" class="btn btn-danger" value="Compare">

          </form>


          </div>

              <div id="info" class="container" >
                 <div id="leftdiv">
                    <div id="productname" align="center"><font size="5"><b>Name: <br><p id="p1_name"></p> </b></font></div>
                    <div id="productprice" align="center"> <font size="5"><b>Price:<br><p id="p1_price"></p> </b></font></div>
                    <div id = "imagespace" class="well " align="center">
                    <img id="product1" src="" class="img-responsive" >
                    </div>
                    <div id="link" align="center">
                     <font size="5"><b> Product Link:</b><br>
                     <a id="p1_amz" href="" target="_blank"><img src="amazon_icon.jpg" height="30" width="30"></a>&nbsp&nbsp&nbsp&nbsp
                      <a id="p1_flip" href="" target="_blank"><img src="flipkart_icon.jpg" height="30" width="30"></a>
                     </font>
                    </div>
                    <div id="pie1" class="well ">
                      
                    </div>
                    <div id="bar1" class="well ">
                      
                    </div>

                 </div>

                 <div id ="rightdiv">
                    <div id="productname" align="center"><font size="5"><b>Name: <br><p id="p2_name"></p> </b></font></div>
                    <div id="productprice" align="center"> <font size="5"><b>Price:<br><p id="p2_price"></p> </b></font></div>
                    <div class="well " id = "imagespace" align="center">
                    <img id="product2" src="" class="img-responsive" >
                    </div>
                   <div id="link" align="center ">
                                          <font size="5"><b> Product Link:</b><br>
                     <a id="p2_amz" href="" target="_blank"><img src="amazon_icon.jpg" height="30" width="30"></a>&nbsp&nbsp&nbsp&nbsp
                      <a id="p2_flip" href="" target="_blank"><img src="flipkart_icon.jpg" height="30" width="30"></a>
                      </font>
                    </div>
                   

                    <div id="pie2" class="well ">
                      
                    </div>
                    <div id="bar2" class="well ">
                      
                    </div>
                 </div>
          </div>


</body>
</html>
