<?php

/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/4/19
 * Time: 15:05
 */

if(isset($_POST['imageSub']) && isset($_FILES['InputImage'])) {
    if (getimagesize($_FILES['InputImage']['tmp_name']) == FALSE) {
        echo "Veuillez-vous choisir la facture.";
    } else {
        echo "connected successfully";
        $image = addslashes($_FILES['InputImage']['tmp_name']);         // add backslashes before characters need to be escaped
        $name = addslashes($_FILES['InputImage']['name']);
        $image = file_get_contents($image);                             // read entire file into a string
        $image = base64_encode($image);                                 // encode data with MIME Base 64
        saveImage($name, $image);
        displayImage();
    }
}



function saveImage($name, $image){
    $link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
    $qry = " INSERT INTO image_test (name,image) VALUES ('$name','$image') ";
    $result = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
    mysqli_close($link);

    if($result){
        echo "<br/> Image uploaded";
    }else{
        echo "<br/> Image failed";
    }
}
function displayImage() {
    $link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
    $qry = " SELECT *  FROM image_test ";
    $result = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');

    while ($row = mysqli_fetch_array($result)){
        echo '<img height="100" width="100" src="data:image; base64, '.$row[2].' " >';
    }
    mysqli_close($link);
}

