<?php header('Content-Type: text/html; charset=utf-8');
require_once "../template/header.php";
?>
<?php


if(isset($_POST["individual"])){

echo '

<span id="pass" style="color:red"></span>
<div class="form-signin">
    <label for="inputLogin" class="sr-only">Login</label>
    <input type="text" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
    <label for="inputPassword1" class="sr-only">Password</label>
    <input onblur="check()" type="password" id="inputPassword1" class="form-control" placeholder="Password"  required>
    <label for="repeatPassword1" class="sr-only">Repeat Password</label>
    <input onblur="checkPassword()" type="password" id="repeatPassword1" class="form-control" placeholder="Repeat Password"  required>
    <input type="hidden" id="Secret" value="'.$_POST["individual"].'">
    <button class="btn btn-lg btn-primary btn-block" id="SignUpStep3">Sign up</button>
</div>


';
}elseif(isset($_POST["legal_person"])){
    echo '

<span id="pass" style="color:red"></span>
<div class="form-signin">
    <label for="inputLogin" class="sr-only">Login</label>
    <input type="text" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
    <label for="inputPassword1" class="sr-only">Password</label>
    <input onblur="check()" type="password" id="inputPassword1" class="form-control" placeholder="Password"  required>
    <label for="repeatPassword1" class="sr-only">Repeat Password</label>
    <input onblur="checkPassword()" type="password" id="repeatPassword1" class="form-control" placeholder="Repeat Password"  required>
    <label for="inputFirm" class="sr-only">Firm</label>
    <input type="text" id="inputFirm" class="form-control" placeholder="Firm" required>
    <label for="inputNumFirm" class="sr-only">Number Firm</label>
    <input type="text" id="inputNumFirm" class="form-control" placeholder="Number Firm" required>
    <input type="hidden" id="Secret" value="'.$_POST["legal_person"].'">
    <button class="btn btn-lg btn-primary btn-block" id="SignUpStep3">Sign up</button>
</div>
    ';

}else{
    header("Location : ../public/global.php");
}

?>


<?php require_once "../template/footer.php"; ?>