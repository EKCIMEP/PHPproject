<?php
require_once "Controller/UserController.php";

$a = new UserController();

if(isset($_POST["email"])&& isset($_POST["Send"] )){
    if($_POST["Send"] ){
        $a->checkSendEmail($_POST['email'],$_POST['name'],$_POST['last_name']);
    }
}

if(isset($_POST['login'])){
    if(!empty($_POST["password"])){
        if($_POST['firm']!= "undefined" && $_POST['number_firm'] != "undefined"){
            $a->checkLogin($_POST['login'],$_POST["key"],$_POST['password'],$_POST['firm'],$_POST['number_firm']);
        }elseif($_POST['firm']!= "undefined" && $_POST['number_firm'] == "undefined"){
            echo "У фирмы должен быть номер";
        }elseif($_POST['firm']== "undefined" && $_POST['number_firm'] != "undefined"){
            echo "У фирмы должно быть название";
        }else{
            $a->checkLogin($_POST['login'],$_POST['password'],$_POST["key"]);
        }
    }else{
        echo "Пароль не может быть пустым";
    }
}

if(isset($_POST["SignIn"]) ){
    if( $_POST["SignIn"]){
        $a->SignIn($_POST["email"],$_POST["password"]);
    }
}

if(isset($_POST["SignOut"])){
    if($_POST["SignOut"]){
        $a->SignOut();
    }
}


if(isset($_POST["update"])){
    if($_POST["update"]){
        if($_POST['firm']!= "undefined" && $_POST['number_firm'] != "undefined"){
            $a->update($_POST["email"],$_POST["name"],$_POST["last_name"],$_POST["login"],$_POST["password"]
                ,$_POST['firm'],$_POST['number_firm']);
        }elseif($_POST['firm']!= "undefined" && $_POST['number_firm'] == "undefined"){
            echo "У фирмы должен быть номер";
        }elseif($_POST['firm']== "undefined" && $_POST['number_firm'] != "undefined"){
            echo "У фирмы должно быть название";
        }else{
            $a->update($_POST["email"],$_POST["name"],$_POST["last_name"],$_POST["login"],$_POST["password"]);
        }
    }else{

    }
}

if(isset($_POST["checkPass"]) && isset($_POST["check"])){
    if($_POST["check"]){
        $a->checkPass($_POST["checkPass"]);
    }
}


