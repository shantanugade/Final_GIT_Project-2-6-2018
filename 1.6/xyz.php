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
   

  <?php   
             $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

             error_reporting(0);
             session_start();

            $link = mysqli_connect("localhost", "root", "", "project");
            if($link==TRUE)
         //   echo "Connected Successfully";
           // $abc = "<script> document.write(a)</script>";


            $sql= "select * from count";

             $result=mysqli_query($link,$sql);
         
            
          if ($result == TRUE) {
 //               echo "New record created successfully";
            } else {
              //  echo "Error: " . $sql . "<br>" . $conn->error;
            }

             
              if (isset($_POST['searchbar']))
                {
                $inp = $_POST['searchbar']; 
                } 

              if (isset($_POST['rsearchbar']))
                {
                $inp = $_POST['rsearchbar']; 
                } 

 $product_name = $_SESSION['product_name_from1stpage'];
     
               while($row = mysqli_fetch_assoc($result))
                     {   
              
                        if($row['name'] == $inp || $row['name'] == $product_name  )
                           {
                              $name2= $row['name']; 
                              $pos2= $row['pos'];
                              $neg2= $row['neg'];
                              $mix2= $row['mix'];
                              $flag=0;  
                            } 


                        elseif($row['name'] == $inp2 || $row['name'] == $product_name)
                           {
                              $name2= $row['name']; 
                              $pos2= $row['pos'];
                              $neg2= $row['neg'];
                              $mix2= $row['mix'];
                              $flag=1;
                            }        
                      

                      }                    

                   //    $_SESSION['product_name_from2ndpage'] = $name2; 

//  $product_name = $_SESSION['product_name_from1stpage'];



              if (isset($_POST['name']))
                {
                $name = $_POST['name']; 
                } 
              if (isset($_POST['email']))
                {
                $email = $_POST['email']; 
                } 
              if (isset($_POST['comments']))
                {
                $comment = $_POST['comments']; 
                } 
                  
                  echo $name2;
                  echo $email;
                  //echo $comment;

            $sql= "insert into review (product,name,email,reviews) values ('$name2','$name','$email','$comment')";
            $result=mysqli_query($link,$sql);





        ?>

<script type="text/javascript">
$(document).ready(function(){
        var flag= '<?php  echo $flag; ?>';
        console.log(flag)
          
          if(flag==0)
          {
            var SrchRst = '<?php echo $inp;?>';
          }
          
          else
          {
             var SrchRst = '<?php echo $inp2;?>';
          }

       var name1='<?php echo $name2?>';
        var pos1 = '<?php echo $pos2 ?>';
        var neg1 = '<?php echo $neg2 ?>';
        var mix1 = '<?php echo $mix2?>';
       // pos1 = (number)pos1;
        console.log(pos1);
        console.log(neg1);
        console.log(mix1);
        
        var a= parseInt(pos1);
        var b= parseInt(neg1);
        var c= parseInt(mix1);
        
        

         var path = SrchRst.concat(".jpg"); 


        document.getElementById("product_img").src=path;
        document.getElementById("product_info").innerHTML=SrchRst;

      
     
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['', '%'],
          ['Positive',a],
          ['Negative',b],
          ['Mix', c]
          
          
        ]);

        var options = {
          title: 'Sentiment Analysis'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

         google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawbarchart);

      function drawbarchart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Positive', 'Negative' ],
          ['Camera', 1000, 400, ],
          ['Memory', 1170, 460, ],
          ['Hardware', 660, 1120, ],
          ['Battery', 1030, 540, ],
          ['Processor', 1500,500 ]
        ]);

        var options = {
          chart: {
            title: 'Semantic Analysis',
            subtitle: 'Positive or Negative',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('bargraph'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
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
  height: 500px;
  }

  #graph{
    float: right;
    width: 40%;
    height: 500px;
  }

  #review{
    padding-left: 15%;
    padding-right: 15%;
    background-color:   #f2f2f2;
  }

  </style>

        


</head>
<body>


<div class="jumbotron text-center">
  <h1>Sentiment Analyzer</h1> 
  <h3> We Know And We Care...!!</h3>
  <form class="form-inline" action="resultpage.php" method="post">
    <div class="input-group">
      <input type="" class="form-control" size="50" name="rsearchbar" placeholder="Product Search" required>
      <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" id="srchbtn" >Search</button>
      </div>
    </div>
  </form >
</div> 


    <div class="container-fluid" id="product">
   
      <div  id="productimg" class="col-sm-3">
        <img id="product_img" height="450" width="450" >
      </div>     

        <div  id="productinfo" class="col-sm-3 . well" > <p id="product_info"> </p></div>
         
         <div  id="graph" class="col-sm-3">
            <div class="well" id="piechart"> </div>
            <div id="bargraph" class="well"> </div>
       </div>
   
  </div> 

    <form action="resultpage.php" method="post"> 
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