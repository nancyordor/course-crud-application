<!-- 
<form action="">

<div class="form-group">
        <label>Course</label>
        <input type="text" name="coursetitle"  placeholder="Enter Course Title">
    </div>
    <div class="form-group">
        <label>Course Course_Desc</label>
        <textarea class="form-control" name="Course_Desc" placeholder="Enter Course Course_Desc"></textarea>
    </div>

</form> -->

<?php
require "courses.php";
session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}
if (isset($_POST['submit'])) {
    $Course = $_POST['courseName'];
    $Course_Desc = $_POST['Course_Desc'];
    $insert = new Course();
    $insert->addCourse($Course, $Course_Desc);
    $_SESSION["flash"] = ["type" => "success", "message" => "course successfully created"];
    header("Location:" . "index.php");
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
    

    <div class="jumbotron">
    <h2>Create a Course </h2>

        <form method="post">
            <div class="form-group">
                <label for="courseName">Course name</label>
                <input name="courseName" type="text" class="form-control" id="courseName" placeholder="Enter course name">
            </div>
            <div class="form-group">
                <label for="Course_Desc">Course_Desc</label>
                <input name="Course_Desc" type="text" class="form-control" id="Course_Desc" placeholder="Enter a Course_Desc for your course">
            </div>
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        </form>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <div class="navbar-nav">
                        <a href="index.php">View all courses</a><br>
                    </div>
            </nav>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>