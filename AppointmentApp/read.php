<?php
require_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Read </title>

    <style>
        table, td, th {
        border: 1px solid;
        font-size:24pt;
        }

		table {
			border-collapse: collapse;
			width: 100%;
			color: #264143;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
            border-collapse: collapse;
		}

		th, td {
			padding: 8px;
			text-align: center;
			border-bottom: 1px solid #c65353;
		}

		tr:nth-child(even) {
			background-color: #b3ccff;
		}
        
		tr:hover {
			background-color: #ddd;
		}

    </style>
</head>
<body>
    <table>
        <tr>
            <th> Client Name      </th>
            <th> Appointment Date </th>
            <th> Duration         </th>
            <th> Location         </th>
            <th> Actions          </th>
        </tr>
        <?php
            $sql = "SELECT * FROM tbl_appointment";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                    echo"<tr>";
                        echo"<td style = 'text-align:center;'>".$row['client_name']."</td>";
                        echo"<td style = 'text-align:center;'>".$row['appointment_date']."</td>";
                        echo"<td style = 'text-align:center;'>".$row['duration']."</td>";
                        echo"<td style = 'text-align:center;'>".$row['location']."</td>";
                        echo"<td style = 'text-align:center;'>
                            <a href = 'update.php?appointment_id=".$row['appointment_id']."'>
                                    Edit
                            </a>
                            <a href = 'delete.php?appointment_id=".$row['appointment_id']."'>
                                    Delete
                            </a>
                            </td>";
                    echo"</tr>";
              }
            } else {
                echo"<tr>";
                    echo"<td colspan='4' style='text-align:center;'>No Results</td>";
                echo"</tr>";
            }
            $conn->close();
        ?>
    </table>
    <a href = "create.php" style = "text-decoration:none;"> <h1 style = "color:black;"> Insert again? </h1></a>

</body>
</html>