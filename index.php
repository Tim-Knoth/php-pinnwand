<html lang="de-de">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
		<meta http-equiv="Pragma" content="no-cache"/>
		<meta http-equiv="Expires" content="0"/>
		<?php
			require 'config.php';
			echo '<title>' . $titel . '</title>';
		?>
	</head>
	<body >
		<?php
			require 'config.php';
			echo '<h1>' . $headline . '</h1>';
		?>
		<iframe	src="massages.php" height="90%" width="100%" >
		</iframe>
		<br>
		<form action="index.php" method="post">
			<input type="text" name="txt" autofocus="on">
			<input type="submit" value="senden">
		</form>
		<?php
			require 'config.php';
			date_default_timezone_set($timezone);
			$dbcon = new mysqli ($dbserver, $dbuser, $dbpass, $dbname);
			if($dbcon->connect_error){
				echo "fehler bei der verbindung der datenbank bitte wenden sie sich an den administarator unter der adresse " . $adminemail . "<br>";
				die ($dbcon->connect_error);
			}
			if(isset($_POST['txt'])){
				$timestamp = time();
				$dateow = date("d.m.Y",$timestamp);
				$timeow = date("H:i",$timestamp);
				$dtimeow = $dateow." - ".$timeow." Uhr";
				$content = $_POST['txt'];
				$sqlcode = "INSERT INTO massage (timeow, massagecont) Values ('$dtimeow', '$content')";
				$dbcon->query($sqlcode);
				$dbcon->close();
			}
		?>
	</body>
</html>