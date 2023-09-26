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
    $id = $_GET["id"]; 
    $course_id = $_GET["course_id"]; 
    ?>
    <br />
    <form name="myForm" action="add_marks.php?id=<?php echo $id ?>& course_id=<?php echo $course_id ?> " method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="exampleInputNumber">Subject: </label>
            <?php
            include "connection.php";
            $sql = "SELECT * FROM subject WHERE course_id=$course_id";
            $result = mysqli_query($conn, $sql);
            ?>
            <select name="subject" id="exampleInputNumber">
            <option value=""> -- select an option -- </option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <option value=<?php echo $row["id"] ?>><?php echo $row["name"] ?></option>
                <?php }
                } ?>

            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputMarks">Marks:</label>
            <input type="text" name="marks" id="exampleInputMarks" placeholder="Enter student marks" >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php

    if (isset($_POST["submit"])) {

        include "connection.php";
        $student_id = $_GET["id"];
        $subject_id = $_POST["subject"];
        $marks = $_POST["marks"];

        $sql = "INSERT INTO marks (student_id, subject_id, marks)
        VALUES ('$student_id', '$subject_id', '$marks')";

        $insert = mysqli_query($conn, $sql);
        if (!$insert) {
            die("Insertion Failed: " . mysqli_error($conn));
        }

        mysqli_close($conn);

        header("location:display.php");
    }

    ?>

</body>
<script>
function validateForm() {
  let x = document.forms["myForm"]
  if (x["subject"].value == "") {
    alert("Subject must be selected");
    return false;
  }
  if (x["marks"].value == "") {
    alert("Marks must be filled out");
    return false;
  }

}
</script>

</html>