<?php
require_once "conf.php";


class  Admin {

    public static $sql_connect;
    public static $db;


    function __construct(){
        self::$sql_connect = Conf::connect();

        self::$db = mysqli_select_db(self::$sql_connect, 'first_project') or die("Не могу подключиться к базе.");

        mysqli_query(self::$sql_connect, 'set character set utf8') or die("Не удалось выполнить запрос");
    }


    public function SelectAllUsers(){
        $query = 'SELECT * FROM users WHERE delete_user<>"1"';
        $resourse = mysqli_query(self::$sql_connect,$query);

        $resourse = mysqli_fetch_all($resourse);
        $this->SelectAllUsersInfo($resourse);
        return  $resourse;
    }

    public function SelectAllUsersInfo(&$res){
        for($i=0;$i<count($res);$i++){
            $query = 'SELECT * FROM user_info WHERE user_id="'.$res[$i][0].'"';
            $resourse = mysqli_query(self::$sql_connect,$query);

            $resourse = mysqli_fetch_all($resourse);
                array_push($res[$i],$resourse[0][1]);
                array_push($res[$i],$resourse[0][3]);
                array_push($res[$i],$resourse[0][4]);
        }
    }

    public function changeUser($name,$value,$id){
        if($name == 'name' || $name == 'last_name' || $name == 'email' || $name == 'delete_user' ){
            $query = 'UPDATE users SET '.$name.'="'.$value.'" WHERE id="'.$id.'"';
            if(!mysqli_query(self::$sql_connect,$query)){
                echo "error";
            }else{
                echo "good";
            }
        }elseif($name == 'text' || $name == 'title' || $name == 'delete_news'){
            $query = 'UPDATE news SET '.$name.'="'.$value.'" WHERE id="'.$id.'"';
            mysqli_query(self::$sql_connect,$query);
        }else{
            $query = 'UPDATE user_info SET '.$name.'="'.$value.'" WHERE user_id="'.$id.'"';
            mysqli_query(self::$sql_connect,$query);
        }
    }

    public  function setNews($title,$text){
        $query = 'INSERT INTO news (title,text,delete_news) VALUEs("'.$title.'","'.$text.'","0")';
        mysqli_query(self::$sql_connect,$query);
    }

}