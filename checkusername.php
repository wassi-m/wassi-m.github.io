<?php
include "connect.php";

if (!empty($_POST["username"])) {
  $query = mysqli_query($connect, "SELECT username FROM users WHERE username='" . $_POST["username"] . "'");
  $user_count = mysqli_num_rows ( $query );
  if($user_count>0) {
      echo "<span class='not-available' id='not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='available' id='available'> Username Available.</span>";
  }
}
?>