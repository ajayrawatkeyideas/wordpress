<?php
/*
Template Name: My marks
*/
get_header();
global $wpdb;

$id = $_GET["id"];

$row = $wpdb->get_row("SELECT wp_student.name as sn, wp_student.number as no,
wp_course.name cn, wp_coordinator.name as con FROM wp_student 
INNER JOIN wp_course ON wp_student.course_id=wp_course.id 
INNER JOIN wp_coordinator ON wp_course.coordinator_id=wp_coordinator.id
WHERE wp_student.id=$id");
?>
    <div>
  <h3>Student Details:</h3>
  <p> Name: <?php echo $row->sn ?></p>
  <p> Number: <?php echo $row->no ?></p>
  <p> Course: <?php echo $row->cn ?> </p>
  <p> Coordinator: <?php echo $row->con ?></p>
  <br/>
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
  <tbody>
    <?php
    $result = $wpdb->get_results("SELECT * FROM wp_marks INNER JOIN wp_subject
ON wp_marks.subject_id=wp_subject.id
WHERE $id=student_id");

    if ($result) {
      foreach ($result as $row) { ?>
        <tr>
          <td><?php echo $row->name ?></td>
          <td><?php echo $row->marks ?></td>
        </tr>
      <?php   }
    } else { ?>
      <tr>
        <td colspan='5'>No results found.</td>
      </tr>
    <?php } ?>

  </tbody>
</table>
<?php
get_footer();
?>