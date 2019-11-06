<?php
include_once("includes/config.php");

if ($_POST['id'] && $_POST['table']) {

	$sqlQuery = "delete from " . $_POST['table'] ." WHERE id='" . $_POST['id'] . "';";	
	mysqli_query($con, $sqlQuery) or die("database error:". mysqli_error($con));	
	$data = array(
		"message"	=> "Record Deleted",	
		"status" => 1
	);
	echo json_encode($data);	
}
?>