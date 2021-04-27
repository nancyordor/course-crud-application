<?php
require "courses.php";
?>
<body>
    <?php require "app.php"; ?>
    <div class="jumbotron">
        <?php
        $s = new Course();
        $result = $s->viewcourses();
        foreach ($result as $row) :
        ?>
            <div class="list-group">
                <a href="view.php?id=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action">
                    <?php echo $row['Course']; ?> <br />
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>