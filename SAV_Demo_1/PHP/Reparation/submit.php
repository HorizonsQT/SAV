<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/5/28
 * Time: 15:14
 */

$imei = $_POST['inputEmei_re'];
$type_panne = $_POST['t_panne'];
$detail_panne = $_POST['d_pan'];
$addresse = $_POST['inputAdd'];
$code = $_POST['inputCode'];
$email = $_POST['inputCompte'];

saveData($type_panne,$detail_panne,$addresse,$code,$email,$imei);

function saveData($type_panne,$detail_panne,$addresse,$code,$email, $imei){
    $link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
    $qry = " INSERT INTO sav_re (type_panne, detail_panne, addresse, code, email, Imei) VALUES ('$type_panne','$detail_panne','$addresse','$code','$email','$imei')";
    $result = mysqli_query($link, $qry) or die('<p>Error connecting to database</p>');
    mysqli_close($link);
}
