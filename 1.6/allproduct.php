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
?>

<!-- 
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
   

</head>





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



</style>


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

      <div class="container">
                        <div class="row">
                              <div id="innerdiv1" class="col-sm-4 . well">
                           <?php
                              echo '<img src="data:image/jpeg;base64,'.base64_encode($pho[0]).'" width="200" height="400"/>';
                              echo $name[0];
                              echo $price[0];

                           ?>
                 
                    </div>

                                    <div id="innerdiv2" class="col-sm-4 . well">
                                      <?php
                                          echo '<img src="data:image/jpeg;base64,'.base64_encode($pho[1]).'" width="200" height="400"/>';
                                          echo $name[1];
                                          echo $price[1];

                                        ?>
                       
                          </div>
                  <div id="innerdiv3" class="col-sm-4 . well">
                  <?php
                      echo '<img src="data:image/jpeg;base64,'.base64_encode($pho[2]).'" width="200" height="400"/>';
                      echo $name[2];
                      echo $price[2];
                  ?>
   
      </div>
            
            </div>

            
            <div class="row " >
                  
                  <div id="innerdiv4" class="col-sm-4  . well"></div>
                  <div id="innerdiv5" class="col-sm-4  . well"></div>
      <div id="innerdiv6" class="col-sm-4  . well"></div>
    
            </div>
            
            


      </div> 


</body>
</html> -->