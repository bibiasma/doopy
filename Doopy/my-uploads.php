<?php
session_start();
$myid=$_REQUEST['id'];

$servername = "localhost";
$username = "root";
$password = "KODapa4294";
$dbname = "Doopy";


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

$sql = "SELECT playlist_name FROM playlist WHERE playlist_id='$myid'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()) {

         $myname = $row["playlist_name"];

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doopy-playlist-selected</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="logo-small.png" alt="logo.png" width="200px" height="50px"style="margin-left:10px; margin-bottom: 10px;"/></a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-2x"></i>  <i class="fa fa-caret-down fa-2x"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-user fa-fw"></i> My Overview</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-search fa-fw"></i> Search By<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="search-subjects.php"><i class="fa fa-book fa-fw"></i> Subject</a>
                                    </li>
                                    <li>
                                        <a href="search-popularity.php"><i class="fa fa-tasks fa-fw"></i> Popularity</a>
                                    </li>
                                    <li>
                                        <a href="search-recommendations.php"><i class="fa fa-star fa-fw"></i> Recommendations</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                              <a href="search-discover.php"><i class="fa fa-globe fa-fw"></i> Discover</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-list-ol fa-fw"></i> My Playlists<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                </li>
                                <li>
                                  <a href="my-playlists.php"><i class="fa fa-user fa-fw"></i> All</a>
                                </li>
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "KODapa4294";
                                $dbname = "Doopy";


                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            // Check connection
                                            if ($conn->connect_error) {
                                              die("Connection failed: " . $conn->connect_error);
                                            }

                                $sql = "SELECT playlist_id, playlist_name, subject_category, target_group FROM playlist";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    // output data of each row
                                   while($row = $result->fetch_assoc()) {
                                     if($row["subject_category"] == "History") {
                                       // Set session variables
                                       $color = "yellow";
                                       $id = $row["playlist_id"];
                                       $name = $row["playlist_name"];
                                       $icon = "fa-institution";
                                       $_SESSION["id"] = $id;
                                       $_SESSION["name"] = $name;
                                       $_SESSION["color"] = $color;
                                       $_SESSION["icon"] = $icon;
                                       ?>
                                  <li>
                                    <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>"><i class="fa fa-institution fa-fw"></i> <?php echo $name;?></a>
                                  </li>
                                  <?php } else if($row["subject_category"] == "Math") {
                                    // Set session variables
                                    $color = "primary";
                                    $id = $row["playlist_id"];
                                    $name = $row["playlist_name"];
                                    $icon = "fa-calculator";
                                    $_SESSION["id"] = $id;
                                    $_SESSION["name"] = $name;
                                    $_SESSION["color"] = $color;
                                    $_SESSION["icon"] = $icon;
                                    ?>
                                  <li>
                                      <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>&icon=<?php echo $icon;?>"><i class="fa fa-calculator fa-fw"></i> <?php echo $name;?></a>
                                    </li>
                                    <?php } else if($row["subject_category"] == "English") {
                                      // Set session variables
                                      $color = "red";
                                      $id = $row["playlist_id"];
                                      $name = $row["playlist_name"];
                                      $icon = "fa-language";
                                      $_SESSION["id"] = $id;
                                      $_SESSION["name"] = $name;
                                      $_SESSION["color"] = $color;
                                      $_SESSION["icon"] = $icon;
                                      ?>
                                    <li>
                                      <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>&icon=<?php echo $icon;?>"><i class="fa fa-language fa-fw"></i> <?php echo $name;?></a>
                                    </li>
                                    <?php } else if($row["subject_category"] == "Swedish") {
                                      // Set session variables
                                      $color = "yellow";
                                      $id = $row["playlist_id"];
                                      $name = $row["playlist_name"];
                                      $icon = "fa-language";
                                      $_SESSION["id"] = $id;
                                      $_SESSION["name"] = $name;
                                      $_SESSION["color"] = $color;
                                      $_SESSION["icon"] = $icon;
                                      ?>
                                    <li>
                                      <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>&icon=<?php echo $icon;?>"><i class="fa fa-language fa-fw"></i> <?php echo $name;?></a>
                                    </li>
                                    <?php } else if($row["subject_category"] == "Economics") {
                                      // Set session variables
                                      $color = "green";
                                      $id = $row["playlist_id"];
                                      $name = $row["playlist_name"];
                                      $icon = "fa-money";
                                      $_SESSION["id"] = $id;
                                      $_SESSION["name"] = $name;
                                      $_SESSION["color"] = $color;
                                      $_SESSION["icon"] = $icon;
                                      ?>
                                    <li>
                                      <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>&icon=<?php echo $icon;?>"><i class="fa fa-money fa-fw"></i> <?php echo $name;?></a>
                                    </li>
                                    <?php } else if($row["subject_category"] == "Geography") {
                                      // Set session variables
                                      $color = "info";
                                      $id = $row["playlist_id"];
                                      $name = $row["playlist_name"];
                                      $icon = "fa-globe";
                                      $_SESSION["id"] = $id;
                                      $_SESSION["name"] = $name;
                                      $_SESSION["color"] = $color;
                                      $_SESSION["icon"] = $icon;
                                      ?>
                                    <li>
                                      <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>&icon=<?php echo $icon;?>"><i class="fa fa-globe fa-fw"></i> <?php echo $name;?></a>
                                    </li>
                                    <?php

                                    }} } ?>
                            </ul>
                            <li>
                              <a href"#"><i class="fa fa-users fa-fw"></i> My Students<span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                          </li>
                        </ul>
                        <li>
                          <a href"#"><i class="fa fa-graduation-cap fa-fw"></i> Curriculum</a>
                    </li>
                    <li>
              <a href"#"></a>
            </li>
          <li>
            <a href="my-favorites.php?id=47"><i class="fa fa-star fa-fw"></i> My Favorites</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-upload fa-fw"></i> My Uploads</a>
          </li>
            <li>
              <a href="new-playlist.php"><i class="fa fa-plus fa-fw"></i> New Playlist</a>
            </li>
            <li>
              <a href="new-upload.php"><i class="fa fa-upload fa-fw"></i> New Upload</a>
            </li>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>


        <div id="page-wrapper">
        <!-- /#page-wrapper -->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-new-page-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-upload fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="huge">My Uploads</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        </div>
                    </a>
                </div>
            </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          DataTables Advanced Tables
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Publisher</th>
                                          <th>Type</th>
                                          <th>Subject</th>
                                          <th>Category</th>
                                          <th>Target</th>
                                          <th>Rating</th>
                                          <th>Views</th>
                                          <th>Operation</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "KODapa4294";
                                    $dbname = "Doopy";


                                                // Create connection
                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                                // Check connection
                                                if ($conn->connect_error) {
                                                  die("Connection failed: " . $conn->connect_error);
                                                }



                                    $sql = "SELECT connection_id, playlist_place, content.content_id, content_name, publisher, content_type, subject, subcategory, target_group, Rating, Views, playlist_place FROM content, connection  WHERE publisher = 'You' AND connection.playlist_id = '48' AND connection.content_id=content.content_id ORDER BY playlist_place";
                                    $sql2 = "SELECT playlist.playlist_id, playlist_name FROM playlist WHERE playlist.playlist_id !=47 AND playlist.playlist_id !=48";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {


                                        // output data of each row
                                       while($row = $result->fetch_assoc()) {
                                         $playlist_place = $row["playlist_place"];
                                         $connection_id = $row["connection_id"];
                                         //echo $playlist_place;
                                         $content_id = $row["content_id"];
                                         ?>

                                         <tr>
                                        <th><a href="showfile.php?content_id=<?php echo $content_id;?>"</th><?php echo $row["content_name"]?></a>
                                        <th><?php echo $row["publisher"]?></th>
                                        <th><?php echo $row["content_type"]?></th>
                                        <th><?php echo $row["subject"]?></th>
                                        <th><?php echo $row["subcategory"]?></th>
                                        <th><?php echo $row["target_group"]?></th>
                                        <th><?php echo $row["Rating"]?></th>
                                        <th><?php echo $row["Views"]?></th>


                                        <th><ul class="nav navbar-top-links navbar-right">
                                          <!-- /.dropdown -->
                                          <li class="dropdown">
                                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                  <i class="fa fa-cog fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                              </a>
                                              <ul class="dropdown-menu dropdown-user">
                                                  <li><a href="updateTable.php?playlist_id=<?php echo $myid;?>&operation=moveUp&content_id=<?php echo $content_id;?>&connection=<?php echo $connection_id;?>">Move Up</a>
                                                  </li>
                                                  <li> <a href="updateTable.php?playlist_id=<?php echo $myid;?>&operation=moveDown&content_id=<?php echo $content_id;?>&connection=<?php echo $connection_id;?>">Move Down</a>
                                                  </li>
                                                  <li class="divider"></li>
                                                  <li><a href="updateTable.php?playlist_id=47&operation=add1&content_id=<?php echo $content_id;?>"><i class="fa fa-star fa-fw"></i> Make Favorite</a>
                                                  </li>
                                                  <li class="divider"></li>
                                                  <?php
                                                  $content_id = $row["content_id"];
                                                  $result2 = $conn->query($sql2);
                                                  if ($result2->num_rows > 0) {
                                                     while($row = $result2->fetch_assoc()) {
                                                       $playlist_id = $row["playlist_id"];?>
                                                  <li><a href="updateTable.php?playlist_id=<?php echo $playlist_id;?>&operation=add1&content_id=<?php echo $content_id;?>"><i class="fa fa-plus fa-fw"></i> <?php echo $row["playlist_name"];?></a>
                                                  </li>
                                                  <?php } } ?>

                                              </ul>
                                              <!-- /.dropdown-user -->
                                          </li>
                                          <!-- /.dropdown -->
                                      </ul>
                                    </th>
                                    </tr>
                                      <?php } ?>
                                      <?php } ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.table-responsive -->

                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
              <!-- /.col-lg-12 -->
          </div>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript - For search and order HTML tables-->
    <!--<script src="js/plugins/dataTables/jquery.dataTables.js"></script> -->
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
