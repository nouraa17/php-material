<?php
$title = "Contact Us";
include_once 'template/header.php';
include_once 'models/contactModel.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['name']!='' && $_POST['phone']!=''&& $_POST['message']!=''){
        $contact_message=sent_contact($_POST['name'],$_POST['phone'],$_POST['message']);
    }
}

?>


<div class="contact">
    <div class="container mt-5">
        <a class="btn btn-primary" href="messages.php">Show Messages</a>
        <form method="post">
            <h1>Contact Us</h1>
            <div class="feild">
                <label for="name">Your name</label>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div class="feild">
                <label for="phone">Your phone</label>
                <input class="form-control" type="text" name="phone" required>
            </div>
            <div class="feild">
                <label for="message">Your Message</label>
                <textarea class="form-control" name="message" required></textarea>
            </div>
            <input type="submit" class="btn btn-success form-control mt-3" value="Send">
            


        </form>
    </div>
</div>





<?php
include_once 'template/footer.php'
?>