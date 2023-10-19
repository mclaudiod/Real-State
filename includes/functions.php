<?php

require "app.php";

function includeTemplate(string $name, bool $index = false) {
    include TEMPLATES_URL . "/${name}.php";
};

function isAuthenticated() : bool {
    session_start();
    $auth = $_SESSION["login"];

    if($auth) {
        return true;
    };

    return false;
};