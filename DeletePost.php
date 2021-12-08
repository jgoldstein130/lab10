<?php
$delete = $_POST['delete'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "j861g391", "Aru4eeph","j861g391");
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

if(empty($delete))
{
  echo "You did not select any posts to delete";
}
else{
  foreach ($delete as $value) {
    $query = "DELETE FROM Posts WHERE content='$value'";
    if($result = $mysqli->query($query)) {
      echo "Deleted\n";
    }
    else{
      echo "Failed to delete posts";
    }
  }
}


/* close connection */
$mysqli->close();?>
