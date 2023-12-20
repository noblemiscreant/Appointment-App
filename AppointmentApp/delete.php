<?php
require_once "db.php";

$appointment_id = $_GET['appointment_id'];

$sql = "DELETE FROM tbl_appointment WHERE appointment_id = '$appointment_id'";
$result = $conn->query($sql);

echo '<meta http-equiv = "refresh" content="1.5; url = read.php">';

?>