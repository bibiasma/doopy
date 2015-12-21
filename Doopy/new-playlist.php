<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doopy-new-playlist</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

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
                              <a href="#"><i class="fa fa-globe fa-fw"></i> Discover</a>
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
                              <a href="playlist-selected.php?id=<?php echo $id;?>&color=<?php echo $color;?>&icon=<?php echo $icon;?>"><i class="fa fa-institution fa-fw"></i> <?php echo $name;?></a>
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
                              <?php } } } ?>
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
            <a href="my-favorites.php?id=48"><i class="fa fa-upload fa-fw"></i> My Uploads</a>
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
                <div class="panel panel-new-page-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list-ol fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="huge">Creating New Playlist</div>
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


<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-2">
            <div class="login-panel panel panel-default">
                <div class="panel-body">
                  <fieldset>
                  <form role="form" <action="<?php $_SERVER['PHP_SELF'];?>"  method="post">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Playlist name:</label>
                            <input type="text" class="form-control" id="inputSuccess" name="input">

                        </div>

                    <div class="form-group">
                        <label>Subject Category</label>
                        <action="<?php $_SERVER['PHP_SELF'];?>"  method="post">
                         <select class="form-control" name="subject">
                            <option> </option>
                            <option>Math</option>
                            <option>History</option>
                            <option>Swedish</option>
                            <option>English</option>
                            <option>Geography</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <action="<?php $_SERVER['PHP_SELF'];?>"  method="post">
                        <label>Sub-Category (Optional)</label>
                        <select class="form-control" name="subcategory">
                            <option> </option>
                            <option>General</option>
                            <option>--Math--</option>
                            <option>Algebra</option>
                            <option>Statistics</option>
                            <option>Equations</option>
                            <option>Prime Numbers</option>
                            <option>Negative Numbers</option>
                            <option>Derived Functions</option>
                            <option>--History--</option>
                            <option>Wars</option>
                            <option>Mediaeval</option>
                            <option>Renaissance</option>
                            <option>Famous Events</option>
                            <option>Famous People</option>
                            <option>--Swedish--</option>
                            <option>Language</option>
                            <option>Gramma</option>
                            <option>--English--</option>
                            <option>Language</option>
                            <option>Gramma</option>
                            <option>--Geography--</option>
                            <option>Maps</option>
                            <option>Culture</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <action="<?php $_SERVER['PHP_SELF'];?>"  method="post">
                        <label>Target Group</label>
                        <select class="form-control" name="targetgroup">
                            <option> </option>
                            <option>Unspecified Grade</option>
                            <option>1st Grade</option>
                            <option>2nd Grade</option>
                            <option>3rd Grade</option>
                            <option>4th Grade</option>
                            <option>5th Grade</option>
                            <option>6th Grade</option>
                            <option>7th Grade</option>
                            <option>8th Grade</option>
                            <option>9th Grade</option>
                        </select>
                  </div>
                </fieldset>





                   <input type="submit" value="Create Playlist!" class="btn btn-lg btn-success btn-block">
                    </form>

                    <?php


                    if (isset($_POST['input'])) {

                        $playlistName = $_POST['input'];
                        $_SESSION['input']=$playlistName;


                        if (isset($_POST['subject'])) {
                            $playlistSubject = $_POST['subject'];
                            $_SESSION['subject']=$playlistSubject;
                        }

                        if (isset($_POST['subcategory'])) {
                            $playlistSubCategory = $_POST['subcategory'];
                            $_SESSION['subcategory']=$playlistSubCategory;
                        }

                        if (isset($_POST['targetgroup'])) {
                            $playlistTargetGroup = $_POST['targetgroup'];
                            $_SESSION['targetgroup']=$playlistTargetGroup;
                        }
                    ?>
                        <div id="my-modal" class="modal fade in">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <form action="new-playlist.php">
                                            <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </form>

                                        <h4 class="modal-title">Confirm Action</h4>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to Create <?php echo $playlistName ?> as a new Playlist?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="insertPlaylist.php">
                                        <button type="submit" formaction="new-playlist.php" class="btn btn-default" data-dismiss="modal">Close</button>

                                        <button type="submit"  class="btn btn-success">Create!</button>
                                            </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

        <script>
            // tooltip demo
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })

            // popover demo
            $("[data-toggle=popover]")
                .popover()
        </script>

</body>

</html>
