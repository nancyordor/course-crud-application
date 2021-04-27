<?php
require "courses.php";
require "app.php";

if (isset($_GET['id'])) {
    $course = new Course();
    $result = $course->deleteCourse($_GET['id']);
    $_SESSION["delete"] = ["type" => "danger", "message" => "course successfully deleted"];
    header("Location:" . "index.php");
} else {
    echo "Something went wrong!";
    exit;
}
