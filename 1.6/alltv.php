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


            $sql="select * from tvinfo ORDER BY RAND() LIMIT 5";//where productname='$inp'";
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
<script src='http://rawgit.com/blaxk/ixband/master/dist/ixBand.min.js'></script>
 <script src='http://rawgit.com/blaxk/ixsnack/master/dist/ixSnack.min.js'></script>
 <script src="jquery.easy-autocomplete.min.js"></script> 
<link rel="stylesheet" href="easy-autocomplete.min.css"> 
 

</head>

<script type="text/javascript">
  
  $(document).ready(function(){

$( '.slide' ).ixSlideMax();


$('#1').click(function(){

  alert("1");
<?php session_start(); $_SESSION['aname']="Vivo V7+";?>


});


$('#2').click(function(){
alert("2");
<?php session_start(); $_SESSION['aname']="Apple iPhone 7 Plus";?>


});

$('#3').click(function(){
  alert("3");
<?php session_start(); $_SESSION['aname']="Nokia 8";?>


});

$('#4').click(function(){
alert("4");
<?php session_start(); $_SESSION['aname']="OnePlus 5T";?>


});



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

    



  
$('.ix-list-item').click(function(){
  var val=$(this).find('img:first').attr('src');
  console.log(val);

var productname = val.split(".");

  if(val==='')
    return
  $('#btn1').val(productname[0])
  $('#myform').submit()
})




});








</script>




<style type="text/css">
 
/* base */
html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, figcaption, figure,  footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
  margin:0;
  padding:0;
  border:0;
  font-size:100%;
  vertical-align:baseline;
  background:transparent;
  box-sizing:border-box;
  -webkit-text-size-adjust:none;
}
body {margin: 0px 0px;}
ul li {list-style:none;}


/* 슬라이드 전체 그룹 */
.slide {position:relative; margin-bottom:30px; padding:0 20px;}

/* viewport */
.slide .ix-list-viewport {overflow:hidden; height:100px;}

/* 슬라이드 영역, Safari9, Samsung Browser ~4 버전에서 position을 넣지 않으면 randering bug가 발생할 수 있다. */
.slide .ix-list-items {position:relative; left:0; top:0; width:100%; height:300px;}
.slide .ix-list-items .ix-list-item {float:left; width:32.1333%; height:500px; text-align:center; border-radius:7px; margin:0 0.6%;}
.slide .ix-list-items .ix-list-item a {display:block; height:500%; padding-top:30px; font-size:30px; text-decoration: none; color:#fff}

/* 슬라이드 인디케이터, 방향 버튼 그룹 */
.slide .ix-controller {}
.slide .ix-controller.disabled {visibility:hidden;}

/* 슬라이드 인디케이터 */
.slide .ix-thumbs {position:absolute; bottom:-25px; left:0;right:0; text-align:center;}
.slide .ix-thumbs .ix-thumb {display:inline-block; margin:2px;}
.slide .ix-thumbs .ix-thumb .ix-btn {display:block; width:10px; height:10px; background:#8EAEBA; text-indent:-9999px; border-radius:100%;}
.slide .ix-thumbs .ix-thumb.active .ix-btn {background:#0087E9;}

/* 슬라이드 방향 버튼 */
.slide .slide_direction .ix-btn-prev {left:0; border-radius:100% 0 0 100%;}
.slide .slide_direction .ix-btn-next {right:0; border-radius:0 100% 100% 0;}
.slide .slide_direction .ix-btn-prev,
.slide .slide_direction .ix-btn-next {position:absolute; top:50%; width:20px; height:20px; margin-top:-10px; background:#8EAEBA; text-indent:-9999px;}
/* 버튼 비활성화 */
.slide .slide_direction .ix-btn-prev.disabled,
.slide .slide_direction .ix-btn-next.disabled {background:#D8E0E3; cursor:default;}







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
  <div class="slide" data-ix-options="view-length:3; move-length:2;">
  <!-- "ix-list-viewport" 는 직계 자식요소여야 한다. touch area -->
  <div class="ix-list-viewport" style="height: 500px">
    <!-- "ix-list-items" 는 "ix-list-viewport"의 직계 자식요소여야 한다. -->
    <ul class="ix-list-items" style="">
      <!-- "ix-list-item" 는 "ix-list-items"의 직계 자식요소여야 한다. -->
      <li class="ix-list-item" id="1">
        <img src="<?php echo $name[0].".jpg"; ?>" height="200px"> 
        <br><p><b> <?php echo $name[0]?> </b></p>
      </li>
      <li class="ix-list-item" id="2">
        <img src="<?php echo $name[1].".jpg"; ?>" height="200px">
        <br><p><b> <?php echo $name[1]?> </b></p>
      </li>
      <li class="ix-list-item" id="3">
        <img src="<?php echo $name[2].".jpg"; ?>" height="200px">
        <br><p><b> <?php echo $name[2]?> </b></p>
      </li>
      <li class="ix-list-item" id="4">
        <img src="<?php echo $name[3].".jpg"; ?>" height="200px">
      <br><p><b> <?php echo $name[3]?> </b></p>
      </li>
    </ul>
  </div>
  <!-- "ix-controller" 는 직계 자식요소여야 한다. 필요없을시 삭제해도 무방하다. -->
  <div class="ix-controller">
    <div class="slide_direction">
      <!-- "ix-btn-prev", "ix-btn-next" 는 "ix-controller" 안에 존재해야 한다.-->
      <a class="ix-btn-prev" href="#">Prev</a>
      <a class="ix-btn-next" href="#">Next</a>
    </div>
  </div>
</div>
</form>
</body>
</html>