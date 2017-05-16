<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/4/24
 * Time: 12:54
 */
$link = mysqli_connect("localhost","root","","sav");
$one = 1;
$two = 2;
$three = 3;
$qry = " INSERT INTO test (PRE,TWO,THREE) VALUES ('$three','$two','$one') ";
$result = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
mysqli_close($link);




