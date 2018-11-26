<?php
include 'config.php';
$sql = "SELECT * FROM pirkejai";
$result = mysqli_query($conn,$sql);
$pirkejai = [];
if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($pirkejai, $row);
	}
} else {
	echo "Pirkeju nerasta";
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		foreach ($pirkejai as $pirk) {
			echo "Vardas " .$pirk['Name'] . "<br/>"
			."Pavarde " .$pirk['Surname'] . "<br/>"
			."<a href='delete.php?name=$pirk[Name]'>Delete</a>";
		}

	?>
</body>
</html>