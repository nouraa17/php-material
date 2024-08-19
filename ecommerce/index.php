<?php
session_start();
// include_once 'helpers/validate.php';
// $conn=connectToDB();
// phpinfo();

include_once 'guard/check_user_login.php';
check_login();
// var_dump($_SESSION);



include_once 'models/usersModel.php';
$data = get_users();
$employee_access = ['name','email','phone','type'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $data = get_users('WHERE type="'.$_POST['type'].'"');
}

$title = 'Home';
include_once 'template/header.php';
?>
    <div class="container">

        <form method="POST" class="m-auto pt-5">
            <div class="row">
                <select name="type" id="" class="col-3">
                    <option value="">All</option>
                    <option value="client">Client</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" class="btn btn-sm btn-outline-success mb-3 col-3">
                    Submit
                </button>
            </div>
        </form>
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

<?php
include_once 'template/footer.php';
?>