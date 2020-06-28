<?php
//MySQLi Procedural

$connect = mysqli_connect("localhost","root","","w.a");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else;
?>