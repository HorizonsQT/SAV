<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/4/27
 * Time: 23:11
 */

//get the q parameter from URL
$q=$_GET["q"];
$link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
$qry = " SELECT * FROM sav_emei WHERE Emei= '{$q}'";
$result_1 = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
$qry = " SELECT * FROM sav_ga WHERE emei= '{$q}'";
$result_2 = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
$row_1 = mysqli_fetch_array($result_1);
$row_2 = mysqli_fetch_array($result_2);
mysqli_close($link);

if($row_1[0] == false){
    echo 1;
}elseif($row_2[0] == $row_1[0]){
    echo 2;
}else{
    echo 0;
}







