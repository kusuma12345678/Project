<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Add Semester</title>
</head>
<body>
        
    <div class="title">
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Semesters &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_semesters.php">Add Semester</a>
                    <a href="manage_semesters.php">Manage Semester</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Semester</legend>
                <input type="text" name="semester_name" placeholder="Semester Name">
                <input type="text" name="year" placeholder="Year">
                <input type="submit" value="Submit">
            </fieldset>        
        </form>
    </div>

    <div class="footer">
         </div>
</body>
</html>

<?php 
	include('init.php');
    include('session.php');

    if (isset($_POST['semester_name'],$_POST['year'])) {
        $name=$_POST["semester_name"];
        $year=$_POST["year"];

        // validation
        if (empty($name) or empty($year) or preg_match("/[a-z]/i",$year)) {
            if(empty($name))
                echo '<p class="error">Please enter semester</p>';
            if(empty($year))
                echo '<p class="error">Please enter year</p>';
            if(preg_match("/[a-z]/i",$year))
                echo '<p class="error">Please enter valid year</p>';
            exit();
        }

        $sql = "INSERT INTO `semester` (`name`, `year`) VALUES ('$name', '$year')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid semester name or year")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>