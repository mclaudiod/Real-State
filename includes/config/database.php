<?php

function connectDB() : mysqli {
    $db = mysqli_connect("localhost", "root", "root", "real_state");

    if(!$db) {
        echo "It wasn't possible to connect to the Database";
        exit;
    };

    return $db;
};