<?php
/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 2017/4/27
 * Time: 12:36
 */

if(isset($_POST['ESub'])){
    if(empty($_POST['inputEmei'])) {
        echo "<script language='JavaScript' type='text/javascript'> ";
        echo "var userId = document.getElementById('first_label');";
        //userId.for = 'inputError';
        echo "userId.innerText = 'Input error'; ";
        echo "</script>";
    }
}
