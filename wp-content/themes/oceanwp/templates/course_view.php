<?php
/*
Template Name: My course
*/
get_header();
global $wpdb;

$result=$wpdb->get_results("SELECT wp_course.name as cn, wp_coordinator.name as con
FROM wp_course INNER JOIN wp_coordinator ON wp_course.coordinator_id=wp_coordinator.id");
?>
<table>
<thead>
  <tr>
    <th>Subject</th>
    <th>Coordinator</th>
  </tr>
</thead>
<tbody>

<?php

if ($result) {
  foreach ($result as $row) { ?>
    <tr>
      <td><?php echo $row->cn ?></td>
      <td><?php echo $row->con ?></td>
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