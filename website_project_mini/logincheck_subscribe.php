<?php
        session_start();
        $conn = mysqli_connect ("localhost", "WRITE_USER", "WRITE_PASSWORD", "WRITE_DATABASE");
        $emailsssoo = $_SESSION["email"];
		$data = $conn->query("SELECT id FROM users WHERE plan=1 AND email='$emailsssoo'");

		if ($data->num_rows > 0) {
			header("Location: prenumenera_subscribe_checkout.php");
			exit();
	}
?>      