<?php
/*
Template Name: My subject
*/
get_header();
global $wpdb;

$result=$wpdb->get_results("SELECT wp_subject.name as sn, wp_course.name as cn
FROM wp_subject INNER JOIN wp_course ON wp_subject.course_id=wp_course.id");
?>
<table>
<thead>
  <tr>
    <th>Subject</th>
    <th>Course</th>
  </tr>
</thead>
<tbody>

<?php

if ($result) {
  foreach ($result as $row) { ?>
    <tr>
      <td><?php echo $row->sn ?></td>
      <td><?php echo $row->cn ?></td>
    </tr>
<?php
  }
} else {
  ?>
  <tr><td colspan='5'>No results found.</td></tr>
<?php } ?>
</tbody>
</table></form>

<?php
get_footer();
?>