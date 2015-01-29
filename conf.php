<?php

class Conf{

    public static function connect(){
        $conect = mysqli_connect('localhost', 'root', '') or die("Не могу соединиться с MySQL.");
        mysqli_query($conect,'set names utf8') or die('Не удалось выполнить запрос');

        return $conect;
    }

}