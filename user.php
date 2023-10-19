<?php

    // Import the conection

    require "includes/config/database.php";
    $db = connectDB();

    // Create an email and password

    $email = "email@email.com";
    $password = "123456";

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Query to create the user

    $query = "INSERT INTO users (email, password) VALUES('${email}','${passwordHash}');";
    
    // echo $query;

    // Add it to the database

    mysqli_query($db, $query);