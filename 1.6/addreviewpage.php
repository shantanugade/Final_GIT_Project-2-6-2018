<?php


       $dbhost = "localhost";
             $dbuser = "root";
             $dbpass = "";
             $db = "project";

      session_start();

$link = mysqli_connect("localhost", "root", "", "project");
            if($link==TRUE)
         //   echo "Connected Successfully";
           // $abc = "<script> document.write(a)</script>";


            $sql= "select * from count";

             $result=mysqli_query($link,$sql);
         
            
          if ($result == TRUE) {
                echo "New record created successfully";
            } else {
              //  echo "Error: " . $sql . "<br>" . $conn->error;
            }


      $product_name = $_SESSION['product_name'];        
      


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
                  
/*
                   echo $name2;
                  echo $email;
                  echo $comment;
*/
              




?>