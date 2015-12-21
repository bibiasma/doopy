<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doopy-main</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

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
                        include 'connectToDb.php';


                            $sql = "SELECT playlist_id, playlist_name, subject_category, target_group FROM playlist";
                            $result = $connect->query($sql);


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
                                <?php } } }?>
                                <?php


                                $sql2 = "SELECT content_name FROM content WHERE publisher = 'You'" ;
                                $result2 = $connect->query($sql2);
                                $numberOfUploads = 0;
                                if ($result2->num_rows > 0) {
                                    // output data of each row
                                   while($row = $result2->fetch_assoc()) {
                                     $numberOfUploads = $numberOfUploads + 1;
                                   }
                                 }

                                 $sql3 = "SELECT playlist_id FROM playlist";
                                 $result3 = $connect->query($sql3);
                                 $numberOfPlaylists = 0;
                                 if ($result3->num_rows > 0) {
                                    while($row = $result3->fetch_assoc()) {
                                      $numberOfPlaylists = $numberOfPlaylists + 1;
                                    }
                                  }
                                ?>
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
        <a href="my-uploads.php?id=48"><i class="fa fa-upload fa-fw"></i> My Uploads</a>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calculator fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div class="huge">Math with Jonatan</div>
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
            <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i> Playlist Timeline
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge info">
                            <a class="text-white" href="showfile.php?content_id=25"><i class="fa fa-file-pdf-o"></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Integer Exponents</h4>
                                <p><small class="text-muted"><i class="fa fa-bookmark"></i> 15 pages</small>
                                </p>
                                <hr>
                            </div>
                            <div class="timeline-body">
                            <p>Description:</p>
                                <p>A simple introduction to Integer Exponents. On page 4 you should do the assignments on A to D.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge warning">
                            <a class="text-white" href="showfile.php?content_id=24"><i class="fa fa-video-camera"></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">How to Solve Algebra</h4>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> 3min 29 sec </small>
                                <hr>
                            </div>
                            <div class="timeline-body">
                                <p>Description:</p>
                                <p>Video with the basics of the Algebra that will be covered in this semester. Pay extra attention to the multiplication part.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge info">
                            <a class="text-white" href="showfile.php?content_id=26"><i class="fa fa-file-pdf-o"></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Formulas</h4>
                                <p><small class="text-muted"><i class="fa fa-bookmark"></i> 3 pages</small>
                                <hr>
                            </div>
                            <div class="timeline-body">
                            <p>Description:</p>
                                <p>This paper will learn you how to use simple formulas.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge danger"><i class="fa fa-music"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Lorem ipsum dolor</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                                <hr>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-gear"></i>  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Lorem ipsum dolor</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas consequuntur nostrum sequi. Consequuntur, commodi.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Quiz - Part 1</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
