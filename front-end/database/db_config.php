<?php
    $HOST = "localhost";
    $PORT = 3306;
    $USER_NAME = "root";
    $PASS = "CAVKiM@143";

    $CONNECTION = mysqli_connect($HOST, $USER_NAME, $PASS, "hospital_su30", $PORT);

    if (!$CONNECTION) {
        
        die("Your connection to database failed! " . mysqli_connect_error());
    } 

    mysqli_set_charset($CONNECTION, "utf8");

    // print("Your connection to database is successfully!   ");
?>

