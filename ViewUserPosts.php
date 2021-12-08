<?php
$user = $_POST["users"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "j861g391", "Aru4eeph","j861g391");
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

echo "<table style='border: 1px solid black'>";
echo "<tr>";
echo "<th style='border: 1px solid black'>";
echo 'Content';
echo "</th>";
echo "<th style='border: 1px solid black'>";
echo 'Author_ID';
echo "</th>";
echo "<th style='border: 1px solid black'>";
echo 'Post ID';
echo "</th>";
echo "</tr>";

$query = "SELECT * FROM Posts WHERE author_id='$user'";
if($result = $mysqli->query($query)) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    $content = $row["content"];
    $post_id = $row["post_id"];
    $author_id = $row["author_id"];
    echo "<td style='border: 1px solid black'>";
    echo $content;
    echo "</td>";
    echo "<td style='border: 1px solid black'>";
    echo $author_id;
    echo "</td>";
    echo "<td style='border: 1px solid black'>";
    echo $post_id;
    echo "</td>";
    echo "</tr>";
  }
}

echo "</table>";

/* close connection */
$mysqli->close();?>
