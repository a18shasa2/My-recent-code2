<html>
<head>
</head>
<body>
<p>Koden h&auml;tar data fr&aring;n tabellen m3bestalln i databasen 'imjam'.
&Auml;ndra 'imjam' till din databas på webbkurs.ei.hv.se.</p>
<?php

	$db = mysqli_connect('localhost','imjam','PASSWORD','imjam')
			or die('FEL - kan inte ansluta, avslutar...');
	echo "<p>Ansluten till databasen.</p>";

	$query = "SELECT kund_id, artikel_id, mangd FROM m3bestalln";

	$result = mysqli_query($db, $query);

	if(!$result) {
		die("Kunde inte utf&ouml;ra fr&aring;gan, avslutar...");
	} 
	echo "<p>Fr&aring;gan gick bra.</p>";


	// loopen går igenom en gång för varje rad i resultatet

	while( $row = mysqli_fetch_array($result) )
	{
		$kund_id = $row['kund_id'];
		$artikel_id = $row['artikel_id'];
		$mangd = $row['mangd'];

		echo "<p> $kund_id , $artikel_id , $mangd </p>";	// skriv ut	
	}
	echo "<p>D&aring; var allt klart, stänger ner...</p>";
	mysqli_close($db);
?>

</body>
</html>

