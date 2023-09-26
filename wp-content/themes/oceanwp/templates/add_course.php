<?php
/*
Template Name: My add course
*/

get_header();

echo '<form name="myForm" action="student_insert.php" method="post" >
        <div class="form-group">
            <label for="exampleInputName">Course:</label>
            <input type="text" name="name" id="exampleInputName" placeholder="Enter course name" >
        </div>
        <div class="form-group">
            <label for="exampleInputNumber">Coordinator: </label>';

            $result = $wpdb->get_results("SELECT * FROM wp_coordinator");
    
            echo '<select name="coordinator" id="exampleInputNumber" >
            <option  value="" > -- select an option -- </option>';

            if ($result) {
                foreach ($result as $row) {
                  echo "<option value=$row->id>$row->name</option>";
                }
              } else {
                echo "<tr><td colspan='5'>No results found.</td></tr>";
              }

            echo '</select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>';
get_footer();
?>