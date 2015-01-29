<?php header('Content-Type: text/html; charset=utf-8');
require_once "../template/header.php";
?>
<span id="SendEmail" style="color:red"></span>
<div class="form-signin">
    <h2 class="form-signin-heading">Please sign up</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" id="inputName" class="form-control" placeholder="Name" required>
    <label for="inputLastName" class="sr-only">LastName</label>
    <input type="text" id="inputLastName" class="form-control" placeholder="LastName" required>
    <button class="btn btn-lg btn-primary btn-block" id="Send">Send</button>
</div>

<?php require_once "../template/footer.php"; ?>