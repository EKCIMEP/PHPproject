<?php
require_once "Model/News.php";
require_once "Controller/Notification.php";

class NewsController {


    public function littleNews(){
        $news = new News();

        $bool = $news->SelectNews();

        return $bool;
    }

    public function sortNews(){
        $query =  "select * from news ORDER BY id DESC";
        $result = mysqli_query(News::$sql_connect,$query) or die("Invalid query: " . mysql_error());

        $rows_max = mysqli_num_rows($result);

        return $rows_max;
    }

    public function limitNews($offset,$show_pages){
        $query_limited = "select * from news ORDER BY id DESC LIMIT $offset, $show_pages";
        $final_result = mysqli_query(News::$sql_connect,$query_limited);

        return $final_result;
    }


} 