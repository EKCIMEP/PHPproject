<?php
require_once "Model/News.php";
require_once "Controller/Notification.php";

class NewsController  {

    private $news;


    function __construct(){
        $this->news = new News();
    }

    public function littleNews(){

        $bool = $this->news->SelectNews();

        return $bool;
    }

    public function Limit($limit){
        $bool = $this->news->SelectLimitNews($limit);

        $arr = array();

        for($i=0;$i<count($bool);$i++){
            $arr[$i]["id"] = $bool[$i][0];
            $arr[$i]["Title"] = $bool[$i][1];
            $arr[$i]["Text"] = $bool[$i][2];
            $arr[$i]["delete"] = $bool[$i][3];
        }

        return $arr;

    }

} 