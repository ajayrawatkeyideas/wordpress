<?php
/*
Template Name: My coordinator
*/
get_header();
global $wpdb;

$result=$wpdb->get_results("SELECT name FROM wp_coordinator");
?>
<table>
<thead>
  <tr>
    <th>Coordinator</th>
  </tr>
</thead>
<tbody>

<?php

if ($result) {
  foreach ($result as $row) { ?>
    <tr>
      <td><?php echo $row->name ?></td>
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