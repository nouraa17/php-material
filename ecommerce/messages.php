<?php
session_start();

include_once 'guard/check_user_login.php';
check_admin_login();

$title="Messages";
include_once 'template/header.php';
include_once 'models/contactModel.php';
$msg =['name','phone','message'];

$data = get_contact();
?>
<div class="messages">
    <div class="container mt-5">
        <h1>Messages</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <td>Name</td>
                <td>Phone</td>
                <td>Message</td>
                <td>Control</td>
            </thead>
            <tbody>
                <?php
                foreach($data as $contact){
                    echo '<tr>';
                    foreach($msg as $access){
                        echo '<td>'.$contact[$access].'</td>';
                    }
                    echo '<td><button class="btn btn-primary">edit</button><button class="btn btn-danger">delete</button></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>