<?php

function filter($D)
{
    foreach($D as $key => $value){
        if(strlen($value["pass"]) >= 8){
            foreach($value as $k => $v){
                print($k ."-". $v. "<br>");
            }
        }
    }
}