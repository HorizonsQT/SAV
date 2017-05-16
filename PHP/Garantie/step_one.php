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
$result = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
$row = mysqli_fetch_array($result);
mysqli_close($link);
echo $row[0];







