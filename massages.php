<html lang="de-de">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="refresh" content="5">
		<?php
			require 'config.php';
			echo '<title>' . $titel . '</title>';
		?>
	</head>
	<body >
		<?php
			require 'config.php';
			$dbcon = new mysqli ($dbserver, $dbuser, $dbpass, $dbname);
			if($dbcon->connect_error){
				echo "fehler bei der verbindung der datenbank bitte wenden sie sich an den administarator unter der adresse " . $adminemail . "<br>";
				die ($dbcon->connect_error);
			}
			$sqlcode = "SELECT * FROM massage";
			$dbdata = $dbcon->query($sqlcode);
			echo "<table border=\"1\" style=\"width:100%\">";
			echo "<tr>";
			echo "<td>Zeit</td>";
			echo "<td>Inhalt</td>";
			echo "</tr>";
			$dbmassage = array();
			while($i = $dbdata->fetch_assoc()){
				array_push($dbmassage, $i);
			}
			for($c=count($dbmassage)-1; $c>=0; $c --){
			echo "<tr>";
			$tmp = $dbmassage[$c];
			echo "<td width=\"10%\">" . $tmp['timeow'] . "</td>";
			echo "<td>" . $tmp['massagecont'] . "</td>";
			echo "</tr>";
			}
			echo "</table>";
			$dbcon->close();
		?>
	</body>
</html>