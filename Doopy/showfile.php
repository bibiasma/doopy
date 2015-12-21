<?php

$content_id=$_REQUEST['content_id'];

$servername = "localhost";
$username = "root";
$password = "KODapa4294";
$dbname = "Doopy";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT content_name, content_of_file, size, content_type, Views FROM content WHERE content_id='$content_id'";

$result = $connect->query($query);
if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()) {
$content = $row["content_of_file"];
$size = $row["size"];
$type = $row["content_type"];
$name = $row["content_name"];
$views = $row["Views"];

header("Content-type: $type");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header("Content-Disposition: inline;filename='document.pdf'");
header("Content-length: ".strlen($content));

echo $content;

}
}



$queryUpdateViews = "UPDATE content SET Views = '$views'+1 WHERE content_id='$content_id'";


    if ($connect->query($queryUpdateViews) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connect->error;
    }


$connect->close();

?>
