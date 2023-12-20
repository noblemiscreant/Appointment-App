<?php
require_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style.css">

</head>
<body>
    
<form action="" method="post">

<div class = "container">
<form class = "form">
    <span class = "signup"> APPOINTMENT </span>

    <input type = "text"      name = "client_name"        placeholder = "Client Name"              class ="form--input">
    <input type = "date"      name = "appointment_date"   placeholder = "Appointment Date"         class ="form--input">
    <input type = "text"      name = "duration"           placeholder = "Duration"                 class ="form--input">
    <input type = "text"      name = "location"           placeholder = "Location"                 class ="form--input">

    <div>
    <input type = "submit" name = "submit" value = "Save" class = "form--submit">
    </div>

    <a href = "read.php" style = "text-decoration:none;"> <h2 style = "color:black;" class = "enter"> View Records? </h2></a>

</form>
</div>

<?php

if(isset($_POST['submit'])){

    $client_name        = $_POST['client_name'];
    $appointment_date   = $_POST['appointment_date'];
    $duration           = $_POST['duration'];
    $location           = $_POST['location'];

    $saving = "INSERT INTO tbl_appointment (client_name, appointment_date, duration, location)
    VALUES ('$client_name', '$appointment_date', '$duration', '$location')";

    if ($conn->query($saving) === TRUE) {
        echo "Record has been saved!";
        echo '<meta http-equiv="refresh" content="0; url=read.php">';
        
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

?>

</body>
</html>