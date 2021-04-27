<?php require "app.php";
require "courses.php";

if (isset($_GET['id'])) {
    $course = new Course();
    $result = $course->viewCourse($_GET['id']);
    $_SESSION['id'] = $_GET['id'];
} else {
    echo "Something went wrong!";
    exit;
}

if (isset($_POST['submit'])) {
    $Course = $_POST['courseName'];
    $Course_Desc = $_POST['Course_Desc'];
    $update = new Course();
    $update->editCourse($_SESSION['id'], $Course, $Course_Desc);
    $_SESSION["flash"] = ["type" => "success", "message" => "course successfully updated"];
    header("Location:" . "index.php");
}
?>

<h2>Update a course </h2>
<form method="post">
    <div class="form-group">
        <label for="courseName">Course Name</label>
        <input name="courseName" type="text" class="form-control" value=<?php echo $result['Course'] ?> id="courseName" placeholder="Enter course name">
    </div>
    <div class="form-group">
        <label for="Course_Desc">Course Description</label>
        <input name="Course_Desc" type="text" class="form-control" id="Course_Desc" value=<?php echo $result['Course_Desc'] ?> placeholder="Enter a course description for your course">
    </div>
    <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
</form>