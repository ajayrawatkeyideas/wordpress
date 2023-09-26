<?php
include "connection.php";
$id = $_GET["id"];
$sql = "SELECT student.name as sn, student.number as no,
course.name cn, coordinator.name as con FROM student 
INNER JOIN course ON student.course_id=course.id 
INNER JOIN coordinator ON course.coordinator_id=coordinator.id
WHERE student.id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$output = "<div>
<h3>Student Details:</h3>
<h4> Name: {$row["sn"]}</h4> 
<h4> Number: {$row["no"]}</h4> 
<h4> Course: {$row["cn"]} </h4> 
<h4> Coordinator: {$row["con"]} </h4> 
<h3>Student Marks:</h3>
</div>

<table class='table'>
<thead>
    <tr>
        <th>Subject</th>
        <th>Marks</th>
        </th>
    </tr>
</thead>
<tbody>";
$sql = "SELECT * FROM marks WHERE $id=student_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subject_id = $row["subject_id"];
        $sql = "SELECT * FROM marks INNER JOIN subject ON $subject_id=subject.id";
        $res = mysqli_query($conn, $sql);
        $roww = mysqli_fetch_assoc($res);
        $output.="<tr><td>{$roww["name"]}</td><td>{$row["marks"]}</td></tr>";
 }
}
mysqli_close($conn); 
    $output.="</tbody></table>";
    echo $output;
?>
