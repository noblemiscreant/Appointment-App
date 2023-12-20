<?php
require_once "db.php";

$appointment_id = $_GET['appointment_id'];

$sql = "SELECT * FROM tbl_appointment WHERE appointment_id = '$appointment_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update </title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>

<form action="" method="post">

<div class = "container">
<form class = "form">
    <span class = "signup"> APPOINTMENT </span>

    <input type = "text"      name = "client_name"       value = "<?php echo $row['client_name'] ?>"          placeholder = "Client Name"              class ="form--input">
    <input type = "date"      name = "appointment_date"  value = "<?php echo $row['appointment_date'] ?>"     placeholder = "Appointment Date"         class ="form--input">
    <input type = "text"      name = "duration"          value = "<?php echo $row['duration'] ?>"             placeholder = "Duration"                 class ="form--input">
    <input type = "text"      name = "location"          value = "<?php echo $row['location'] ?>"             placeholder = "Location"                 class ="form--input">

    <div>
    <input type = "submit" name = "submit" value = "Update" class = "form--submit">
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
            
            $update = "UPDATE tbl_appointment SET 
            client_name              = '$client_name',
            appointment_date         = '$appointment_date',
            duration                 = '$duration',
            location                 = '$location'
            WHERE appointment_id     = '$appointment_id' ";
            
    
            if ($conn->query($update) === TRUE) {
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