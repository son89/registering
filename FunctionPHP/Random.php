<?php
function CodeRandom()
{
    $text='ZXCVBNMASDFGHJKLQWERTYUIOP1234567890';
    $code="";
    for($i=0;$i<5;$i++)
    {
        $start=rand(0,strlen($text));
        $code.=strtoupper(substr($text,$start,2));

    }
    return $code;
}