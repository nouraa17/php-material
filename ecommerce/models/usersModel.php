<?php

include_once './helpers/db_connection.php';

/*
queries:

SELECT * FROM users 

SELECT * FROM users ORDER BY id asc;

SELECT * FROM users ORDER BY id desc;

SELECT * FROM users WHERE email='nour@gmail.com' and password='nour';

SELECT * FROM users WHERE type='client' or type='admin';

INSERT INTO users (name, email, password, phone, type) VALUES ('noura', 'noura@gmail.com', '123456', '01111111', 'client');

SELECT users.* ,phones.user_id,phones.phone FROM users INNER JOIN phones ON users.id = phones.user_id;  // the values exist in both tables

SELECT users.* ,phones.user_id,phones.phone FROM users LEFT JOIN phones ON users.id = phones.user_id;  // the values exist in users table maybe not in phones (null)

SELECT users.* ,phones.user_id,phones.phone FROM users RIGHT JOIN phones ON users.id = phones.user_id;  // the values exist in phones table maybe not in users (null)

UPDATE users SET name="Nourhan", email="nourhan@gmail.com" WHERE id=1;

DELETE FROM users WHERE id > 7;

*/

function get_users($where = '',$search=''){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users ".$where.$search);
    return $data -> fetchAll();
}

function get_specific_user($email,$password){
    $conn = connectToDB();
    $data = $conn ->query("SELECT * FROM users WHERE email='".$email."' and password='".$password."'");
    return $data -> fetch();
}

function register($username, $email, $password, $phone) {
    $conn = connectToDB();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email OR name = :username");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return false;
    } else {

        $sql = "INSERT INTO users (name, email, password, phone, type) VALUES (:username, :email, :password, :phone, 'client')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        return true;
    }
}

function update($username,$email,$phone,$password,$id){
    $conn = connectToDB();
    $sql = "UPDATE users SET name = :username, email=:email, password= :password, phone= :phone WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}