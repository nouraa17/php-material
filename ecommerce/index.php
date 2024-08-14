<?php
include_once 'helpers/validate.php';
// $conn=connectToDB();
// phpinfo();

include_once 'models/usersModel.php';
$data = get_users();
$employee_access = ['username','email','phone','type'];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <?php //include_once 'layout/form.php' ?>
        <br>
        <?php if(isset($data) && sizeof($data) > 0) { ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <td>Username</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Type</td>
                <td>Control</td>
            </thead>
            <tbody>
                <?php
                foreach($data as $user){
                    echo '<tr>';
                    foreach($employee_access as $access){
                        echo '<td>'.$user[$access].'</td>';
                    }
                    echo '<td><button class="btn btn-primary">edit</button><button class="btn btn-danger">delete</button></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php } else {
            echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
            }?> 
    </div>
</body>
</html>