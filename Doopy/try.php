
<html>      
<head>
     <title>Dynamic Drop Down List</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="<? $_SERVER['PHP_SELF']?>">
    department:
    <select id="department" name="department" onchange="run()">
        <!--Call run() function-->
        <option value="Biology">Biology</option>
        <option value="chemestry">chemestry</option>
        <option value="physic">physic</option>
        <option value="Math">Math</option>
    </select><br><br>
    type_hire:
    <select id="type_hire" name="type_hire" onchange="run()">
        <!--Call run() function-->
        <option value="internal">Intenal</option>
        <option value="external">External</option>
    </select><br><br>+
    list of employees:
    <select name='employees'>
        <option value="">--- Select ---</option>
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




        $sql = "SELECT subcategory_name FROM subcategory WHERE subject_name ='". $value_of_department_list ."'";
        echo $value_of_department_list;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {


            // output data of each row
            while ($row = $result->fetch_assoc()) {

                ?>

                <option value="<?php echo $row_list['subcategory_name']; ?>">
                    <?php if ($row_list['subject_name'] == "Math") {
                        echo $row_list['subcategory_name'];
                    } ?>
                </option>
            <?php
            }
        }
        ?>
    </select>
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--[ I'M GOING TO INCLUDE THE SCRIPT PART DOWN BELOW ]-->
</body>
</html>