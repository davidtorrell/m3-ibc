<?php
$error=false;

if ($_POST['upload'] == 1) { 
    $ext = pathinfo($_FILES['arxiu']['name'], PATHINFO_EXTENSION);

    if ($ext =="csv") {
        $arxiu = './arxiu_pujat.csv';
        if (move_uploaded_file($_FILES['arxiu']['tmp_name'], $arxiu)) {
            $generat=true;
        } else {
            $error=true;
        }
    } else {
        $error=true;
    }

}