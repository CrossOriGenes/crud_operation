<?php 

	include('connection.php');

	$Id = $_GET['id'];
	$query = " DELETE FROM `stud_info` WHERE id='$Id' ";
	$data = mysqli_query($conn, $query);
	if ($data) {
		?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>
        <?php
        
	} else {
		echo '<script>alert("Failed to delete data!!")</script>';
        return;
	}

?>