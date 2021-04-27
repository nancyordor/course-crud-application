<?php require "courses.php";
require "app.php"; ?>

<body>
    <?php
    if (isset($_GET['id'])) {
        $course = new Course();
        $result = $course->viewCourse($_GET['id']);
    } else {
        echo "Something went wrong!";
        exit;
    } ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Showing details for <?php echo $result['Course']; ?></h5>
            <div class="jumbotron text-center">
                <h6 class="card-subtitle mb-2 text-muted">
                    <strong>course:</strong> <?php echo $result['Course']; ?><br>
                </h6>
                <p class="card-text">
                    <strong>Course_Desc:</strong> <?php echo $result['Course_Desc']; ?><br>
                </p>
                <button class="card-link btn btn-primary" onclick="window.location.href = 'edit.php?id=<?php echo $result['id']; ?>'">Edit</button>
                <!-- Button trigger modal -->
                <button type="button" class="card-link btn btn-primary" data-toggle="modal" data-target="#deleteCourse">
                    Delete
                </button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteCourse" tabindex="-1" role="dialog" aria-labelledby="deleteCourseTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCourseTitle">Delete course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the course <?php echo $result['Course']; ?>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button onclick="window.location.href = 'delete.php?id=<?php echo $result['id']; ?>'" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</body>