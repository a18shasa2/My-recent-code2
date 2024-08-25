<?php
        session_start();
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD (if any)", "WRITE_DATABASE");
        $emailsssooo = $_SESSION["email"];
		$data = $conn->query("SELECT id FROM users WHERE plan=2 AND email='$emailsssooo'");

		if ($data->num_rows > 0) {
			header("Location: subscription_activated.php");
			exit();
	}
?>      