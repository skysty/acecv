<?php
    include "connection.php";
    if(isset($_GET['TutorID'])) {
        $sql = "SELECT photo FROM tutors WHERE TutorID=" . $_GET['TutorID'] ;
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: image/jpg, image/jpeg");
        echo $row["photo"];
	}
	mysqli_close($conn);
?>