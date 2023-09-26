<?php
/*
Template Name: My add coordinator
*/
get_header();
echo '<form name="myForm" action="student_insert.php" method="post">
        <div class="form-group">
            <label for="exampleInputName">Name:</label>
            <input type="text" name="name" id="exampleInputName" placeholder="Enter coordinator name" >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>';
get_footer();
?>

