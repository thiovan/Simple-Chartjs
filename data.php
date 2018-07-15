<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chartjs";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM data";
$result = mysqli_query($conn, $sql);

$json = array();
$sumbuX = array();
$sumbuY = array();

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
    	array_push($sumbuX, $row['x']);
    	array_push($sumbuY, $row['y']);
    }

} else {

    array_push($sumbuX, "0");
    array_push($sumbuY, "0");

}

echo json_encode(array(
	"x" => $sumbuX,
	"y" => $sumbuY
));
?>