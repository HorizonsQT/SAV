<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/5/28
 * Time: 15:32
 */

$imei = $_POST['imei_sav'];
$type_panne = $_POST['t_panne_sav'];
$detail_panne = $_POST['d_pan_sav'];
$addresse = $_POST['inputAdd_sav'];
$code = $_POST['inputCode_sav'];
$email = $_POST['inputCompte_sav'];

saveData($type_panne, $detail_panne, $addresse, $code,$email, $imei);

function saveData($type_panne,$detail_panne,$addresse,$code,$email, $imei){
    $link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
    $qry = " INSERT INTO sav_nor (type_panne,detail_panne, addresse, code, email, Imei) VALUES ('$type_panne', '$detail_panne', '$addresse', '$code', '$email','$imei')";
    $result = mysqli_query($link, $qry) or die('<p>Error connecting to database</p>');
    mysqli_close($link);
}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}