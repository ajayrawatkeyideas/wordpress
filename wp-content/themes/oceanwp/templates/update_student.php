<?php
/*
Template Name: My update student
*/
get_header();
global $wpdb;
if (isset($_POST["submit"])) {

    $data = array(
        'name' => $_POST['name'],
        'number' => $_POST['number'],
        'course_id' => $_POST['course'],
    );

    $where = array(
        'id' => $_GET['id'],
    );

    $result = $wpdb->update('wp_student', $data, $where);
    if ($result === false) {
        echo 'Failed to update data.';
    }
    die();
}

$id = $_GET["id"];
$course_id = $_GET["course_id"];
$row = $wpdb->get_row("SELECT * FROM wp_student WHERE id=$id");
?>

<form name="myForm" action='<?php echo "?id=".$id ?>' method="post">
    <div class="form-group">
        <label for="exampleInputName">Name:</label>
        <input type="text" name="name" id="exampleInputName" placeholder="Enter student name" value=<?php echo $row->name ?>>
    </div>
    <div class="form-group">
        <label for="exampleInputNumber">Number:</label>
        <input type="text" name="number" id="exampleInputNumber" placeholder="Enter student number" value=<?php echo $row->number ?> maxlength="10" minlength="10">
    </div>
    <div class="form-group">
        <label for="exampleInputNumber">Course:</label>

        <?php $result = $wpdb->get_results("SELECT * FROM wp_course") ?>

        <select name="course" id="exampleInputNumber">
            <?php
            foreach ($result as $row) {
                if ($row->id == $course_id) { ?>
                    <option value=<?php echo $row->id ?> selected><?php echo $row->name ?></option>
                <?php } else { ?>
                    < <option value=<?php echo $row->id ?>><?php echo $row->name ?></option>;
                    <?php } ?>
                <?php } ?>
        </select>
    </div>

    </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

get_footer();
?>