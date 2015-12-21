<?php
session_start();
$playlist_id=$_REQUEST['playlist_id'];
$content_id=$_REQUEST['content_id'];
$operation=$_REQUEST['operation'];

if (isset($_REQUEST['connection'])){
  $id_item=$_REQUEST['connection'];
}




if($operation == 'add1'){
  addToPlaylist($playlist_id, $content_id);
}

else if($operation == 'delete'){
  deleteRow($playlist_id, $content_id);
}

else if($operation == 'moveUp'){
  moveUp($playlist_id, $content_id, $id_item);
}
else if($operation == 'moveDown'){
  moveDown($playlist_id, $content_id, $id_item);
}


function moveDown($playlist_id, $content_id, $id_item) {
  $isUp = false;
  $servername = "localhost";
  $username = "root";
  $password = "KODapa4294";
  $dbname = "Doopy";

  $connect = mysqli_connect($servername, $username, $password, $dbname);
  if(!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }

if ($isUp)
{
  $operator = "<";
  $order = "DESC";
}
else
{
  $operator = ">";
  $order = "ASC";
}


$request = "SELECT playlist_place, connection_id FROM connection WHERE connection_id = '$id_item' LIMIT 1";

  $result = $connect->query($request);
  if ($result->num_rows > 0) {
      $isPos1 = true;
     while($row = $result->fetch_assoc()) {
      $position1 = $row["playlist_place"];
      $id_item1 = $row["connection_id"];
    //  echo "POS1: "+$position1;
}
}

$request2 = "SELECT playlist_place, content_id, connection_id FROM connection WHERE playlist_id='$playlist_id' AND playlist_place='$position1'+1";
$result2 = $connect->query($request2);
if ($result2->num_rows > 0) {
    $isPos2 = true;
  while($row = $result2->fetch_assoc()) {

      $position2 = $row["playlist_place"];
      $id_item2 = $row["connection_id"];
    //  echo "POS2: "+$position2;
  }
}

if ($isPos1 && $isPos2)
echo "ja!";
{
  $sql1 = "UPDATE connection SET playlist_place = '$position2' WHERE connection_id = '$id_item1'";


if ($connect->query($sql1) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $connect->error;
}



  $sql2 = "UPDATE connection SET playlist_place = '$position1' WHERE connection_id = '$id_item2'";
  if ($connect->query($sql2) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $connect->error;
  }
}

header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}



function moveUp($playlist_id, $content_id, $id_item) {
  $isUp = true;
    $servername = "localhost";
    $username = "root";
    $password = "KODapa4294";
    $dbname = "Doopy";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connect) {
      die("Connection failed: " . mysqli_connect_error());
    }

if ($isUp)
{
    $operator = "<";
    $order = "DESC";
}
else
{
    $operator = ">";
    $order = "ASC";
}


$request = "SELECT playlist_place, connection_id FROM connection WHERE connection_id = '$id_item' LIMIT 1";

    $result = $connect->query($request);
    if ($result->num_rows > 0) {
        $isPos1 = true;
       while($row = $result->fetch_assoc()) {
        $position1 = $row["playlist_place"];
        $id_item1 = $row["connection_id"];
        $position2 = $position1-1;
        echo $position2;
        echo "POS1:";
        echo $id_item1;
}
}

$request2 = "SELECT playlist_place, content_id, connection_id FROM connection WHERE playlist_id='$playlist_id' AND playlist_place='$position2'";

  $result2 = $connect->query($request2);
  if ($result2->num_rows > 0) {
      $isPos2 = true;
    while($row = $result2->fetch_assoc()) {

        $position2 = $row["playlist_place"];
        $id_item2 = $row["connection_id"];
        echo "POS2:";
        echo $id_item2;
    }
}

if ($isPos1 && $isPos2)
 echo "ja!";
{
    $sql1 = "UPDATE connection SET playlist_place = '$position2' WHERE connection_id = '$id_item1'";


if ($connect->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connect->error;
}



    $sql2 = "UPDATE connection SET playlist_place = '$position1' WHERE connection_id = '$id_item2'";
    if ($connect->query($sql2) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connect->error;
    }
}

header("Location: {$_SERVER['HTTP_REFERER']}");
   exit;

}






function addToPlaylist($playlist_id, $content_id){
  $servername = "localhost";
  $username = "root";
  $password = "KODapa4294";
  $dbname = "Doopy";

  $connect = mysqli_connect($servername, $username, $password, $dbname);
  if(!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $search_res="SELECT MAX(playlist_place) from connection WHERE playlist_id='$playlist_id'";

  $result = $connect->query($search_res);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $placeMax = $row["MAX(playlist_place)"]+1;
      echo $placeMax;
    }
}


    $sql = "INSERT INTO `Doopy`.`connection` (`connection_id`, `content_id`, `playlist_id`, `playlist_place`)
    VALUES (NULL, '$content_id', '$playlist_id', '$placeMax')";

    if($connect->query($sql) == TRUE) {
    } else {
      echo "Error: " - $sql . "<br>" . $connect->error;
    }

$connect->close();
header("Location: {$_SERVER['HTTP_REFERER']}");
   exit;
}


function deleteRow($playlist_id, $content_id){
$servername = "localhost";
$username = "root";
$password = "KODapa4294";
$dbname = "Doopy";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
echo $content_id;
echo $playlist_id;
$sql = "DELETE FROM connection WHERE content_id='$content_id' AND playlist_id='$playlist_id'";

if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $connect->error;
}

$connect->close();
header("Location: {$_SERVER['HTTP_REFERER']}");
   exit;


}





?>
