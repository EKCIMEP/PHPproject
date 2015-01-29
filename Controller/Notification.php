<?php

class Notification{
    public static function create($msg,$color){
        return '<span style="color:'.$color.'">'.$msg.'<br/></span>';
    }
}
