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
    <br />
    <form name="myForm" action="subject_insert.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="exampleInputNumber">Name:</label>
            <input type="text" name="name" id="exampleInputNumber" placeholder="Enter new Subject">
        </div>
        <div class="form-group">
            <label for="exampleInputNumber">Course: </label>
            <?php
            include "connection.php";
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);
            ?>
            <select name="course_id" id="exampleInputNumber">
                <option value=""> -- select an option -- </option>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <option value=<?php echo $row["id"] ?>><?php echo $row["name"] ?></option>
                <?php }
                } ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php

    if (isset($_POST["submit"])) {

        include "connection.php";

        $name = $_POST["name"];
        $course_id = $_POST["course_id"];



        $sql = "INSERT INTO subject (name, course_id)
        VALUES ('$name','$course_id')";

        $insert = mysqli_query($conn, $sql);
        if (!$insert) {
            die("Insertion Failed: " . mysqli_error($conn));
        }

        mysqli_close($conn);

        header("location:display.php");
    }

    ?>
    <script>
        function validateForm() {
            let x = document.forms["myForm"]
            if (x["name"].value == "") {
                alert("Subject name must be filled out");
                return false;
            }

            if (x["course_id"].value == "") {
                alert("Course must be selected");
                return false;
            }


        }
    </script>

</body>

</html>