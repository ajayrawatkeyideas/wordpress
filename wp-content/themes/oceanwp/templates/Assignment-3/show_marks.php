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
    <div style="text-align:center;">
        <h3>Student Details:</h3>
        <?php
        include "connection.php";
        $id = $_GET["id"];
        $sql = "SELECT student.name as sn, student.number as no,
    course.name cn, coordinator.name as con FROM student 
    INNER JOIN course ON student.course_id=course.id 
    INNER JOIN coordinator ON course.coordinator_id=coordinator.id
    WHERE student.id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result); ?>
        <h4> Name: <?php echo $row["sn"] ?></h4>
        <h4> Number: <?php echo $row["no"] ?></h4>
        <h4> Course: <?php echo $row["cn"] ?></h4>
        <h4> Coordinator: <?php echo $row["con"] ?></h4>

        <h3>Student Marks:</h3>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM marks WHERE $id=student_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php
                            $subject_id = $row["subject_id"];
                            $sql = "SELECT * FROM marks INNER JOIN subject ON $subject_id=subject.id";
                            $res = mysqli_query($conn, $sql);
                            $roww = mysqli_fetch_assoc($res);
                            echo $roww["name"];
                            ?></td>
                        <td><?php echo $row["marks"] ?></td>
                    </tr>
            <?php }
            }
            mysqli_close($conn); ?>
        </tbody>
    </table>

</body>

</html>