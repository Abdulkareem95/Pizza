<?php

   // mysqli or pdo
   
   $conn = mysqli_connect('localhost','Abdulkareem','text1234','ninjas_pizza');
   // to check connection
   if(!$conn){
       echo 'Connection_error'.mysqli_connect_error();
   }

?>