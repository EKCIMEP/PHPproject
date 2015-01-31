<?php
require_once "Model/Admin.php";
require_once "Controller/Notification.php";
header('Content-Type: text/html; charset=utf-8');

class AdminController {

    public function SortInfo(){
        $user = new Admin();
        $arr = $user->SelectAllUsers();
        $user_arr = array();
        for($i=0;$i<count($arr);$i++){
            $user_arr[$i]["id"] = $arr[$i][0];
            $user_arr[$i]["name"] = $arr[$i][1];
            $user_arr[$i]["last_name"] = $arr[$i][2];
            $user_arr[$i]["email"] = $arr[$i][3];
            $user_arr[$i]["role"] = $arr[$i][4];
            $user_arr[$i]["delete"] = $arr[$i][5];
            $user_arr[$i]["login"] = $arr[$i][8];
            $user_arr[$i]["firm"] = $arr[$i][9];
            $user_arr[$i]["number_firm"] = $arr[$i][10];
        }

        return $user_arr;
    }

    public function update($arr){
        $id=0;
        $value=0;
        $name=0;
        foreach($arr as $key=>$val){
            if($key === 'name'){
                $name =$val;
            }
            if($key === 'id'){
                $str = substr($val, strrpos($val,"_")+1);
                $id = $str;
            }
            if($key === 'value'){
                $value = $val;
            }
        }
        $user = new Admin();
        $user->changeUser($name,$value,$id);
    }

    public function insert($title,$text){
        $user = new Admin();
        if(!empty($title) && !empty($text)){
            $user->setNews($title,$text);
        }else{
            echo "Title or Text не могут быть пустыми";
        }

    }


}
