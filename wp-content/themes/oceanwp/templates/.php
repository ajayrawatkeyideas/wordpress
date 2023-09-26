//AJAX Call 

//Load jQuery
wp_enqueue_script('jquery');

//Define AJAX URL
function myplugin_ajaxurl()
{

	echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
add_action('wp_head', 'myplugin_ajaxurl');


//The Javascript
function add_this_script_footer()
{ ?>
	<script>
		jQuery(document).ready(function($) {
			
			var fruit = 'Banana';
			
			$(".output").click(function() {
				$.ajax({
					url: ajaxurl, 
					data: {
						'action': 'example_ajax_request', =
						'id': fruit 
					},
					success: function(data) {
						
						$(".output").text(data);
					},
					error: function(errorThrown) {
						window.alert(errorThrown);
					}
				});
			});
		});
	</script>
<?php }
add_action('wp_footer', 'add_this_script_footer');


//The PHP
function example_ajax_request()
{
	
	if (isset($_REQUEST)) {
		$id = $_REQUEST['id'];
		global $wpdb;
		$row = $wpdb->get_row("SELECT wp_student.name as sn, wp_student.number as no,
		    wp_course.name cn, wp_coordinator.name as con FROM wp_student 
		    INNER JOIN wp_course ON wp_student.course_id=wp_course.id 
		    INNER JOIN wp_coordinator ON wp_course.coordinator_id=wp_coordinator.id
		    WHERE wp_student.id=$id");

		$output = "<div>
		  <h3>Student Details:</h3>
		  <p> Name: {$row->sn}</p>
		  <p> Number: {$row->no}</p>
		  <p> Course: {$row->cn} </p>
		  <p> Coordinator: { $row->con }</p>
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
		  <tbody>";

		$result = $wpdb->get_results("SELECT * FROM wp_marks INNER JOIN wp_subject
		    ON wp_marks.subject_id=wp_subject.id
		    WHERE $id=student_id");

		if ($result) {
			foreach ($result as $row) {
				$output .= "<tr><td>{$row->name}</td><td>{$row->marks}</td></tr>";
			}
		} else {
			$output .= "<tr><td colspan='5'>No results found.</td></tr>";
		}

		$output .= "</tbody></table>";
		echo $output;
	}
	
	die();
}

add_action('wp_ajax_example_ajax_request', 'example_ajax_request');
// add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );

?>