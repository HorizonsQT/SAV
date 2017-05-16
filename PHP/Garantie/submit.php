<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/5/3
 * Time: 15:22
 */
if(isset($_POST['infoSub']) && isset($_FILES['inputImage'])) {
   echo '<script>console.log("enter")</script>';
    if (getimagesize($_FILES['inputImage']['tmp_name']) == FALSE) {
        echo '<script>console.log("failed")</script>';
    } else {
        $image = addslashes($_FILES['inputImage']['tmp_name']);         // add backslashes before characters need to be escaped
        $name = addslashes($_FILES['inputImage']['name']);
        $image = file_get_contents($image);                             // read entire file into a string
        $image = base64_encode($image); // encode data with MIME Base 64

        $emei = $_POST['inputEmei'];
        $nom = $_POST['Nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['inputEmail'];
        $date = $_POST['inputDate'];
        $vendeur = $_POST['inputVendeur'];

        saveImage($emei,$nom,$prenom,$email,$date,$vendeur, $image,$name);
    }
}

function saveImage($emei,$nom,$prenom,$email,$date,$vendeur, $image,$name){
    $link = mysqli_connect("localhost","root","","sav") or die('<p>Error connecting to link</p>>');
    $qry = " INSERT INTO sav_ga (emei,nom, prenom, email, date, vendeur, facture, facture_name) VALUES ('$emei','$nom','$prenom','$email','$date','$vendeur', '$image','$name') ";
    $result = mysqli_query($link,$qry) or die('<p>Error connecting to database</p>');
    mysqli_close($link);
}