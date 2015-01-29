<?php header('Content-Type: text/html; charset=utf-8');
require_once "../template/header.php";
?>
    <form class="navbar-form navbar-left" action="registrationStep3.php" method="post">
        <div>
            <h2>Физическое лицо<h1>
            <button class="btn btn-lg btn-primary btn-block" name="individual" value="<?php echo $_GET["key"]?>">Sign Up</button>
        </div>

    </form>
    <div>
        <form class="navbar-form navbar-right" action="registrationStep3.php" method="post">
            <h2>Юридическое лицо<h1>
            <button class="btn btn-lg btn-primary btn-block" name="legal_person" value="<?php echo $_GET["key"] ?>">Sign Up</button>
        </form>
    </div>


<?php require_once "../template/footer.php"; ?>