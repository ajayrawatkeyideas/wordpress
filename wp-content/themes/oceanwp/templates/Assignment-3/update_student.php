<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include "connection.php";
    $id = $_GET["id"];
    $course_id = $_GET["course_id"];
    $sql = "SELECT * FROM student WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $arrdata = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    ?>
    <br />
    <form name="myForm" action="update_student.php?id=<?php echo $id ?>" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="exampleInputName">Name:</label>
            <input type="text" name="name" id="exampleInputName" placeholder="Enter student name" value=<?php echo $arrdata["name"] ?>>
        </div>
        <div class="form-group">
            <label for="exampleInputNumber">Number:</label>
            <input type="text" name="number" id="exampleInputNumber" placeholder="Enter student number" value=<?php echo $arrdata["number"] ?> maxlength="10" minlength="10">
        </div>
        <div class="form-group">
            <label for="exampleInputNumber">Course: </label>
            <?php
            include "connection.php";
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);
            ?>
            <select name="course" id="exampleInputNumber">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <?php if ($row["id"] == $course_id) { ?>
                            <option value=<?php echo $row["id"] ?> selected><?php echo $row["name"] ?></option>
                        <?php } else { ?>
                            < <option value=<?php echo $row["id"] ?>><?php echo $row["name"] ?></option>;
                            <?php } ?>
                    <?php }
                } ?>

            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php

    if (isset($_POST["submit"])) {
        include "connection.php";

        $id = $_GET["id"];
        $name = $_POST["name"];
        $num = $_POST["number"];
        $course = $_POST["course"];

        $sql = "UPDATE student SET name='$name', number='$num', course_id='$course' WHERE id=$id";
        $update = mysqli_query($conn, $sql);
        if (!$update) {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);

        header("location:display.php");
    }

    ?>

</body>

<script>
    function validateForm() {
        let x = document.forms["myForm"]
        if (x["name"].value == "") {
            alert("Name must be filled out");
            return false;
        }
        if (!x["number"].value.match(/^\d{10}$/)) {
            alert("Number must be numeric");
            return false;
        }

        if (x["course"].value == "") {
            alert("Course must be selected");
            return false;
        }
    }
</script>

</html>