<?php
$user = $_POST["user"];
$post = $_POST["post"];

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

if($post == ""){
  echo "Post is blank";
  exit();
}

$query = "SELECT user_id FROM Users";
$exists = false;

if($return = $mysqli->query($query)) {
  while($row = $return->fetch_assoc()) {
    $userid = $row["user_id"];
    if($userid == $user) {
      $exists = true;
    }
  }
}

if($exists) {
    $query = "INSERT INTO Posts (post_id, content, author_id) VALUES ('post1','$post','$user')";
    if($return2 = $mysqli->query($query)) {
        echo 'Post Successful';
    }
}
else {
    echo 'User Not Found';
}


/* close connection */
$mysqli->close();?>
