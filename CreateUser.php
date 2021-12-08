<?php
$user = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "j861g391", "Aru4eeph","j861g391");
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

if($user == ""){
  echo "User is blank";
  exit();
}

$exists = false;

$query = "SELECT user_id FROM Users";
if($return = $mysqli->query($query)) {
  while($row = $return->fetch_assoc()) {
    $a = $row["user_id"];
    if($a == $user){
      echo "User Already Exists";
      $exits = true;
      return false;
    }
  }
}

if($exists == false){
  $query = "INSERT INTO Users(user_id) VALUES('$user')";

  if (mysqli_query($mysqli, $query)) {
    echo "New record created successfully";
  }
  else {
    echo "Error";
  }
}

/* close connection */
$mysqli->close();?>
