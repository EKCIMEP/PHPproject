<?php
require_once "conf.php";
require_once "phpPasswordHashingLib-master/passwordLib.php";

class User {

    public static $sql_connect;
    public static $db;

    private static $role = 'user';

    // blowfish
    private static $algo = '$2a';



    // cost параметр
    private static $cost = '$10';



    function __construct(){

        self::$sql_connect = Conf::connect();

        self::$db = mysqli_select_db(self::$sql_connect, 'first_project') or die("Не могу подключиться к базе.");

        mysqli_query(self::$sql_connect, 'set character set utf8') or die("Не удалось выполнить запрос");
    }

    public static function setUser($name,$last_name,$email,$token_user){
        $time = date("YmdHis");
        $i=0;

        $query = 'INSERT INTO users (name,last_name,email,created_at,delete_user,role,token_user) VALUES("'.$name.'","'.$last_name.'",
                                "'.$email.'","'.$time.'","'.$i.'","'.self::$role.'","'.$token_user.'")';
        if(!mysqli_query(self::$sql_connect,$query)){
            return false;
        }else{
            return true;
        }
    }

    public static function setInfo($login,$password,$user_id,$firm=null,$number_firm=null){
        $password = password_hash($password,PASSWORD_BCRYPT,array("cost"=>12));
        $query = 'INSERT INTO user_info (login,password,firm,number_firm,user_id) VALUES("'.$login.'","'.$password.'",
                                "'.$firm.'","'.$number_firm.'","'.$user_id.'")';
        if(!mysqli_query(self::$sql_connect,$query)){
            return false;
        }else{
            return true;
        }
    }


    public static function checkUser($email){
        $query = 'SELECT id FROM users WHERE email="'.$email .'"';
        $resources = mysqli_query(User::$sql_connect, $query);
        $row = mysqli_fetch_row($resources);

        return $row;
    }

    public static function checkLog($login){
        $query = 'SELECT id FROM user_info WHERE login="' . $login . '"';
        $resources = mysqli_query(User::$sql_connect, $query);
        $row = mysqli_fetch_row($resources);

        return $row;
    }

    public static function getUserId($token){
        $query = 'SELECT id FROM users WHERE token_user="'.$token .'"';
        $resources = mysqli_query(User::$sql_connect, $query);
        $row = mysqli_fetch_row($resources);

        return $row;
    }

    public static function login($email){
        $query = 'SELECT id,role FROM users WHERE email="'. $email.'"';
        $user_id = mysqli_query(User::$sql_connect, $query);
        $row_user=mysqli_fetch_row($user_id);

        $query = 'SELECT password,login FROM user_info WHERE user_id="' . $row_user[0].'"';
        $resources = mysqli_query(User::$sql_connect, $query);
        if (!$resources) {
            return false;
        }else{
            $row = mysqli_fetch_row($resources);
            array_push($row,$row_user[0]);
            array_push($row,$row_user[1]);
            return $row;
        }

    }

    public static function getUserInfo($id_user){
        $query = 'SELECT id,email,name,last_name FROM users WHERE id="'.$id_user.'"';
        $user_id = mysqli_query(User::$sql_connect, $query);
        $row_user=mysqli_fetch_row($user_id);

        $query = 'SELECT password,login,firm,number_firm FROM user_info WHERE user_id="' . $id_user.'"';
        $resources = mysqli_query(User::$sql_connect, $query);
        if (!$resources) {
            return false;
        }else{
            $row = mysqli_fetch_row($resources);
            array_push($row,$row_user[0]);
            array_push($row,$row_user[1]);
            array_push($row,$row_user[2]);
            array_push($row,$row_user[3]);
            return $row;
        }
    }

}