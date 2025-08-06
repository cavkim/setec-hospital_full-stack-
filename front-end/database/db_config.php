<?php
    $HOST = "localhost:3306";
    $USER_NAME = "root";
    $PASS = ""; 

    $CONNECTION = mysqli_connect($HOST, $USER_NAME, $PASS);

    if (!$CONNECTION) {
        print ("Your connection to database faild!").mysqli_connect_error();
    } 


    // Select db

    mysqli_select_db($CONNECTION, "hospital_su30")
    or die ("Error connecting to database!");

    // Support font khmer 
    mysqli_set_charset($CONNECTION, "utf8");


    //  print("Your connection to database is successfully!");
?>