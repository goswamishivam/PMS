<?php
   $dbhost = 'localhost';
   $dbuser = 'ritu';
   $dbpass = 'ritu@12';
   $dbname = 'mydatabase';
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   $sql = 'SELECT * FROM doctor';
   mysqli_select_db($conn, $dbname);
   $retval = mysqli_query( $conn, $sql);
   #echo mysqli_num_rows($retval);
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error($conn));
   }

   while($row = mysqli_fetch_array($retval)) {
      echo "name :{$row['username']}  <br> ".
         "password : {$row['password']} <br> ".
         "firstname : {$row['firstname']} <br> ".
         "lastname  : {$row['lastname']} <br> ".
         "gender : {$row['gender']} <br> ".
         "phoneno : {$row['phoneno']} <br> ".
         "age : {$row['age']} <br> ".
         "specialization : {$row['specialization']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysqli_close($conn);
?>
