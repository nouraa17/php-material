<?php

include_once './helpers/db_connection.php';


function get_users(){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users");
    return $data -> fetchAll();
}
