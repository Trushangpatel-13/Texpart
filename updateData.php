<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "esp32_textpart_db";
// REPLACE with Database user
$username = "Admin";
// REPLACE with Database user password
$password = "Admin123";


$shift_ID = $shift = $shift_Time = $Plant = $MC_No = $Job_type = $IP_No = $target = $Obj_prod = $Obj_rejected = $Obj_actual = $Obj_prod_sts = $Obj_rejected_sts = $Obj_Actual_sts = $Power_fail_sts = $Duration = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $shift_ID = test_input($_POST["shift_ID"]);
  $shift = test_input($_POST["shift"]);
  $shift_Time = test_input($_POST["shift_Time"]);
  $Plant = test_input($_POST["Plant"]);
  $MC_No = test_input($_POST["MC_No"]);
  $Job_type = test_input($_POST["Job_type"]);
  $IP_No = test_input($_POST["IP_No"]);
  $target = test_input($_POST["target"]);
  $Obj_prod = test_input($_POST["Obj_prod"]);
  $Obj_rejected = test_input($_POST["Obj_rejected"]);
  $Obj_actual = test_input($_POST["Obj_actual"]);
  $Obj_prod_sts = test_input($_POST["Obj_prod_sts"]);
  $Obj_rejected_sts = test_input($_POST["Obj_rejected_sts"]);
  $Obj_Actual_sts = test_input($_POST["Obj_Actual_sts"]);
  $Power_fail_sts = test_input($_POST["Power_fail_sts"]);
  $Duration = test_input($_POST["Duration"]);

  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  /*
  $sql = "INSERT INTO SensorData (sensor, location, value1, value2, value3)
  VALUES ('" . $sensor . "', '" . $location . "', '" . $value1 . "', '" . $value2 . "', '" . $value3 . "')";
  */
  $sql = "INSERT INTO `shift_data` (`shift_ID`, `shift`, `shift_Time`, `Plant`, `MC_No`, `Job_type`, `IP_No`, `target`, `Obj_prod`, `Obj_rejected`, `Obj_actual`, `Obj_prod_sts`, `Obj_rejected_sts`, `Obj_Actual_sts`, `Power_fail_sts`, `Duration`, `time_stamp`) VALUES ('" . $shift_ID . "', '" . $shift . "', '" . $shift_Time . "', '" . $Plant . "', '" . $MC_No . "', '" . $Job_type . "', '" . $IP_No . "', '" . $target . "', '" . $Obj_prod . "', '" . $Obj_rejected . "', '" . $Obj_actual . "', '" . $Obj_prod_sts . "', '" . $Obj_rejected_sts . "','" . $Obj_Actual_sts . "','" . $Power_fail_sts . "','" . $Duration . "', current_timestamp());";
  //$sql = "INSERT INTO `shift_data` (`shift_ID`, `shift`, `shift_Time`, `Plant`, `MC_No`, `Job_type`, `IP_No`, `target`, `Obj_prod`, `Obj_rejected`, `Obj_actual`, `Obj_prod_sts`, `Obj_rejected_sts`, `Obj_Actual_sts`, `Power_fail_sts`, `Duration`, `time_stamp`) VALUES (NULL, \'A\', \'7:00\', \'Texpart\', \'1\', \'Spindle\', \'192.168.123.1\', \'100\', \'0\', \'0\', \'0\', \'0\', \'0\', \'0\', \'0\', \'17\', current_timestamp());";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } 
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  
    

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
