<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/signin.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../public/global.php?pn=">TEST</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-left">
            <?php if(!isset($_SESSION['login'])){
                echo '<a href="../public/global.php?pn=" style="color: grey">Home |</a>';
                echo "<a href='../View/SignIn.php' style='color: grey'> Sign In |</a>";
                echo "<a href='../View/registration.php' style='color: grey'> Sign Up </a>";
            }
            ?>
            <?php
            if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
                echo " <a href='../View/Edit.php' style='color: grey'>Hello ".$_SESSION['login']."</a>";
                echo "<a href='../public/global.php?pn=' style='color: grey' id='SignOut'> Sign Out </a>";
            }
            if(isset($_SESSION['admin'])){
              if($_SESSION['admin']){
                echo "<a href='../Users.php' style='color: grey'> | AdminPanel </a>";
              }
            }
            if(isset($_SESSION['moderator'])){
                if($_SESSION['moderator']){
                    echo "<a href='../Users.php' style='color: grey'> | AdminPanel </a>";
                }
            }
            ?>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <center><h1>News</h1><center>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">



 