<?php
/*
Template Name: My add student
*/
get_header();

echo '<form id="myForm" method="post">
        <div class="form-group">
            <label for="exampleInputName">Name:</label>
            <input type="text" name="name" id="exampleInputName" placeholder="Enter student name" >
        </div>
        <div class="form-group">
            <label for="exampleInputNumber">Number:</label>
            <input type="text" name="number" id="exampleInputNumber" placeholder="Enter student number" maxlength="10" minlength="10">
        </div>
        <div class="form-group">
            <label for="exampleInputNumber">Course: </label>';

            $result = $wpdb->get_results("SELECT * FROM wp_course");
    
            echo '<select name="course" id="exampleInputNumber" >
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


