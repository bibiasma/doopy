<?php

include 'connectToDb.php';


session_start();

if (isset($_SESSION['input'])){
$playlistName=$_SESSION['input'];

if(isset($_SESSION['subject'])){
$playlistSubject=$_SESSION['subject'];
}

if(isset($_SESSION['subcategory'])){
$playlistSubCategory=$_SESSION['subcategory'];
}

if(isset($_SESSION['targetgroup'])){
$playlistTargetGroup=$_SESSION['targetgroup'];
}





    $sql = "INSERT INTO `Doopy`.`playlist` (`playlist_id`, `playlist_name`, `subject_category`, `subject-subcategory`, `target_group`)
    VALUES (NULL, '$playlistName', '$playlistSubject', '$playlistSubCategory', '$playlistTargetGroup')";

    if($connect->query($sql) == TRUE) {
      echo "Playlist: '$playlistName' Successfully Inserted!";
    } else {
      echo "Error: " - $sql . "<br>" . $connect->error;
    }
    $connect->close();

    header("Location: my-playlists.php");

}

