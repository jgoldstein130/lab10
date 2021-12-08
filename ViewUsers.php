<?php
$user = $_POST["user"];
$post = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "j861g391", "Aru4eeph","j861g391");
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query = "SELECT user_id FROM Users";

echo "<table style='border: 1px solid black'>";
echo "<tr>";
echo "<th style='border: 1px solid black'>";
echo 'user_id';
echo "</th>";
echo "</tr>";


if($return = $mysqli->query($query)) {
  while($row = $return->fetch_assoc()) {
    $temp = $row["user_id"];
    echo "<tr>";
    echo "<td>";
    echo $temp;
    echo "</td>";
    echo "</tr>";
  }
}

echo "</table>";

/* close connection */
$mysqli->close();?>
