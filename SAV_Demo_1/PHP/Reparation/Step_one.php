<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/5/4
 * Time: 14:44
 */

$q=$_GET["q"];
$link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
$qry = " SELECT * FROM sav_ga WHERE emei= '{$q}'";
$result_1 = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
$qry = " SELECT * FROM sav_re WHERE Imei= '{$q}'";
$result_2 = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
$row_1 = mysqli_fetch_array($result_1);
$row_2 = mysqli_fetch_array($result_2);
mysqli_close($link);

if($row_1[0] == false){
    echo 1;
}elseif($row_2[5] == $row_1[0]){
    echo 2;
}else{
    echo $row_1[4];
}

