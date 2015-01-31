<?php
require_once "conf.php";

class News {

    public static $sql_connect;
    public static $db;


    function __construct(){
        self::$sql_connect = Conf::connect();

        self::$db = mysqli_select_db(self::$sql_connect, 'first_project') or die("Не могу подключиться к базе.");

        mysqli_query(self::$sql_connect, 'set character set utf8') or die("Не удалось выполнить запрос");
    }

    public function SelectNews(){
        $arr = array();
        $query_limited = "select COUNT(*) from news WHERE delete_news<>'1'";
        $final_result = mysqli_query(self::$sql_connect,$query_limited);
        $final_result = mysqli_fetch_all($final_result);
        $count=$final_result[0][0];
        if($count < 10){

            $query_limited = "select * from news WHERE delete_news<>'1'";
            $final_result = mysqli_query(self::$sql_connect,$query_limited);
            $final_result = mysqli_fetch_all($final_result);


            for($i=0;$i<count($final_result);$i++){
                $arr[$i]["id"] = $final_result[$i][0];
                $arr[$i]["Title"] = $final_result[$i][1];
                $arr[$i]["Text"] = $final_result[$i][2];
                $arr[$i]["delete"] = $final_result[$i][3];
            }

            return $arr;
        }else{
            return $count;
        }
    }

    public function SelectLimitNews($limit){
        $query_limited = "select * from news WHERE delete_news<>'1' ORDER BY id DESC $limit";

        $final_result = mysqli_query(self::$sql_connect,$query_limited);

        $final_result = mysqli_fetch_all($final_result);
        return $final_result;
    }

} 