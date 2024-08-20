<?php

include_once './helpers/db_connection.php';

function get_contact(){
    $conn = connectToDB();
    $data = $conn-> query("SELECT * FROM contact");
    return $data;
}
function sent_contact($name,$phone,$message){
    $conn = connectToDB();
    $sql = "INSERT INTO contact (name, phone, message) VALUES (:name, :phone, :message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
}