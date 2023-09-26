<?php
/*
Template Name: My add marks
*/
get_header();
global $wpdb;


if (isset($_POST["submit"])) {

  $data_to_insert = array(
    'student_id' => $_GET['id'],
    'subject_id' => $_POST['subject'],
    'marks' => $_POST['number'],

  );

  $result = $wpdb->insert('wp_marks', $data_to_insert);
  if ($result===false) {
    echo 'Failed to insert data.';
  }

  die();
}

$id = $_GET["id"];
$course_id = $_GET["course_id"];
?>

<form name="myForm" action='<?php echo "?id=".$id."& course_id=".$course_id ?>' method="post">
  <div class="form-group">
    <label for="exampleInputNumber">Marks:</label>
    <input type="text" name="number" id="exampleInputNumber" placeholder="Enter marks">
  </div>
  <div class="form-group">
    <label for="exampleInputNumber">Subject: </label>

    <?php $result = $wpdb->get_results("SELECT * FROM wp_subject WHERE course_id=$course_id"); ?>

    <select name="subject" id="exampleInputNumber">
      <option value=""> -- select an option -- </option>

      <?php if ($result) {
        foreach ($result as $row) { ?>
          <option value=<?php echo $row->id ?>><?php echo $row->name ?></option>
        <?php  }
      } else { ?>
        <tr>
          <td colspan='5'>No results found.</td>
        </tr>
      <?php  } ?>

    </select>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

get_footer();
?>