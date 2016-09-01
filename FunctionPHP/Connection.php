<?php
function ConnectionDB($host,$user,$pass,$dataBase)
{
    $con=mysqli_connect($host,$user,$pass,$dataBase);
    mysqli_query($con,"SET NAMES 'UTF8'");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
    }
    return $con;
}
?>