<?php
/*
Template Name: My page template
*/
get_header();
?>

<br />
<a href='http://localhost/wordpress/wordpress/add-student/' class='button'>ADD Student</a>
<a href='http://localhost/wordpress/wordpress/add-course/' class='button'>ADD Course</a>
<a href='http://localhost/wordpress/wordpress/add-coordinator/' class='button'>ADD Coordinator</a>
<a href='http://localhost/wordpress/wordpress/add-subject/' class='button'>ADD Subject</a>
<br />

<?php
global $wpdb;
if (isset($_POST['delete'])) {
  global $wpdb;

  $where = array(
    'id' => $_POST['delete'],
  );

  $result = $wpdb->delete('wp_student', $where);
  if ($result === false) {
    echo 'error';
    die();
  }
}

$result = $wpdb->get_results("SELECT wp_student.name as sn, wp_student.id as sid, wp_student.number as no, wp_course.name cn, wp_course.id as cid, wp_coordinator.name as con FROM wp_student 
INNER JOIN wp_course ON wp_student.course_id=wp_course.id 
INNER JOIN wp_coordinator ON wp_course.coordinator_id=wp_coordinator.id");
?>


<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Number</th>
      <th>Course</th>
      <th>Coordinator</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $index=1;
    $size = sizeof($result);

    if ($result) {
      foreach ($result as $row) { ?>
        <tr>
          <td><?php echo $row->sn ?></td>
          <td><?php echo $row->no ?></td>
          <td><?php echo  $row->cn ?></td>
          <td><?php echo $row->con ?></td>
          <td>
            <form method='post' action="">
              <button name="delete" class='button' value=<?php echo $row->sid ?>>Delete</button>
              <a href="http://localhost/wordpress/wordpress/update-student?id=<?php echo $row->sid ?>& course_id=<?php echo $row->cid ?>" class='button'>Update</a>
              <a href="http://localhost/wordpress/wordpress/add-marks?id=<?php echo $row->sid ?>& course_id=<?php echo $row->cid ?>" class='button'>Add Marks</a>
              <a href="http://localhost/wordpress/wordpress/show-marks?id=<?php echo $row->sid ?>" class='button'>Shows Marks</a>
              <a size="<?php echo $size ?>" value="<?php echo $row->sid ?>" id="ajax-button<?php echo $index ?>" class="ajax-button button">Shows Marks with AJAX</a>
            </form>
            <?php ++$index ?>
          </td>
        </tr>
      <?php
      }
    } else {
      ?>
      <tr>
        <td colspan='5'>No results found.</td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<div class="output"></div>


<?php
get_footer();
?>




