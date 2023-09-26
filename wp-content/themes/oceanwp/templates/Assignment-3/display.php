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
  <button onclick="document.location='student_insert.php'" class="btn btn-primary">ADD Student</button>
  <button onclick="document.location='course_insert.php'" class="btn btn-primary">ADD Course</button>
  <button onclick="document.location='coordinator_insert.php'" class="btn btn-primary">ADD Coordinator</button>
  <button onclick="document.location='subject_insert.php'" class="btn btn-primary">ADD Subject</button>
  <br />


  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Number</th>
        <th scope="col">Course</th>
        <th scope="col">Coordinator</th>
        <th scope="col">Action</th>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php include "connection.php";
      $sql = "SELECT student.name as sn, student.id as sid, student.number as no, course.name cn, course.id as cid, coordinator.name as con FROM student 
      INNER JOIN course ON student.course_id=course.id 
      INNER JOIN coordinator ON course.coordinator_id=coordinator.id";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row["sn"] ?></td>
            <td><?php echo $row["no"] ?></td>
            <td><?php echo $row["cn"] ?></td>
            <td><?php echo $row["con"] ?></td>
            <td>
              <a href="delete_student.php?id=<?php echo $row["sid"] ?>"><button type="button" class="btn btn-primary">Delete</button></a>
              <a href="update_student.php?id=<?php echo $row["sid"] ?>& course_id=<?php echo $row["cid"] ?>"><button type="button" class="btn btn-primary">Update</button></a>
              <a href="add_marks.php?id=<?php echo $row["sid"] ?>& course_id=<?php echo $row["cid"] ?>"><button type="button" class="btn btn-primary">Add Marks</button></a>
              <a href="show_marks.php?id=<?php echo $row["sid"] ?>"><button type="button" class="btn btn-primary">Show Marks</button></a>
              <button type="button" class="showmarks btn btn-primary" onclick="loadDoc(<?php echo $row["sid"] ?>)">Show Marks</button>
            </td>
          </tr>
      <?php }
      }
      mysqli_close($conn); ?>
    <tbody>
  </table>
  <br>
  <br>
  <br>
  <br>
  <div id="output">
  </div>
</body>
<script type="text/javascript">
  function loadDoc(a) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("output").innerHTML = this.responseText;
    }
    xhttp.open("POST", "show_marks_AJAX.php?id="+a);
    xhttp.send();
  }
</script>

</html>