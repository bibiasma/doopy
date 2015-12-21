<?php

if(isset($_POST['subject'])){
$subject=$_POST['subject'];
}

if(isset($_POST['subcategory'])){
$subCategory=$_POST['subcategory'];
}

if(isset($_POST['targetgroup'])){
$targetGroup=$_POST['targetgroup'];
}

if(isset($_POST['myUploadsId'])){
  $myUploadsId=$_POST['myUploadsId'];
}
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
//include 'library/config.php';
//include 'library/opendb.php';

$servername = "localhost";
$username = "root";
$password = "KODapa4294";
$dbname = "Doopy";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "INSERT INTO `Doopy`.`content` (`content_id`, `content_name`, `publisher`, `content_type`, `subject`, `subcategory`,`target_group`, `Rating`, `Views`, `created`, `size`, `content_of_file` )
VALUES (NULL, '$fileName', 'You', '$fileType', '$subject', '$subCategory', '$targetGroup', 'Unrated', 0, NULL, '$fileSize', '$content')";


if($connect->query($query) == TRUE) {
} else {
  echo "Error: " - $query . "<br>" . $connect->error;
}

$query2 = "SELECT content_id FROM content WHERE content_name='$fileName'";

$result = $connect->query($query2);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $content_id = $row["content_id"];
  }
}

$query3 = "INSERT INTO `Doopy`.`connection` (`connection_id`, `content_id`, `playlist_id`, `playlist_place`)
VALUES (NULL, '$content_id', 48, 0)";

if($connect->query($query3) == TRUE) {
} else {
  echo "Error: " - $query3 . "<br>" . $connect->error;
}




echo "<br>File $fileName uploaded<br>";

$connect->close();
header("Location: my-uploads.php?id=48");

}
?>
