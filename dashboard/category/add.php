<?php

include "../../connection.php";

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$current_date = date('Y-m-d');

	if (empty($name)) {
		$errorMessage = "Please fill out this field";

		return header("Location: ./add_form.php?err=$errorMessage");
	}

	$sql = "INSERT INTO category VALUES ('', '$name', '$current_date')";

	if (mysqli_query($conn, $sql)) {
		header("Location: ./");
	} else {
		echo "Error: " . $sql . "<br/>" . mysqli_error($conn);
	}
} else {
	header("Location: ./");
}
