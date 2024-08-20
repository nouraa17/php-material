<?php
session_start();
// include_once 'helpers/validate.php';
// $conn=connectToDB();
// phpinfo();

include_once 'guard/check_user_login.php';
include_once 'classes/Users.php';
check_login();
// var_dump($_SESSION);



include_once 'models/usersModel.php';
$data = get_users();
$employee_access = ['name','email','phone','type'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $filter = 'where 1 = 1';
    $search='';
    if ($_POST['type'] != '') {
        $filter = $filter.' and '.'type="'.$_POST['type'].'"';
    }
    if ($_POST['search'] != '') {
        $search=' and name or email LIKE "%'.$_POST['search'] .'%" ';
    }
    
    $data = get_users($filter,$search);

    /////////////////////////////////////////////////////////////
    // another solution to filter types:
    // if($_POST['type'] === ''){
    //     $data = get_users();
    // }else{
    //     $data = get_users('WHERE type="'.$_POST['type'].'"');
    // }
}

if(isset($_SESSION['message'])){
    $msg= $_SESSION['message'];
    unset($_SESSION['message']);
}
/////////////////////////////////////////////////////////////
$user_obj = new Users('NOURHAN','nourhan@gmail.com');
$user_obj -> getUserName();
$user_obj -> getEmail();


// task
/*
login
register
profile editable
page to view products
buy product
page to view bought products
admin view orders and users allowed only for admin
*/ 

$title = 'Home';
include_once 'template/header.php';
?>
    <div class="container pt-5">
        <?php
        if(isset($msg)){
            echo '<p class="alert alert-success">'.$msg.'</p>';
        }
        ?>
        <form method="POST" class="m-auto ">
            <div class="row">
                <select name="type" id="" class="col-3 me-3 ht-30">
                    <option value="">All</option>
                    <option value="client">Client</option>
                    <option value="admin">Admin</option>
                </select>
                <input class="col-3 me-3 ht-30" type="text" name="search" placeholder="Search...">
                <button type="submit" class="btn btn-sm btn-secondary mb-3 col-1 ht-30">
                <i class="fa-solid fa-magnifying-glass"></i>
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
                    echo '<td><a href="update_user.php?user_id='.$user['id'].'" class="btn btn-primary me-2">edit</a><a class="btn btn-danger">delete</a></td>';
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