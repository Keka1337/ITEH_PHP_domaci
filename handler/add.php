<?php

require "../dbBroker.php";
require "../models/usluga.php";

if (
    isset($_POST['naziv']) && isset($_POST['ambulanta'])
    && isset($_POST['cena']) && isset($_POST['pacijentId']) && isset($_POST['datum'])
) {

    $usluga = new Usluga(null, $_POST['naziv'], $_POST['ambulanta'], $_POST['cena'], $_POST['datum'], $_POST['pacijentId']);
    $status = Usluga::add($usluga, $conn);


    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo "Failed";
    }
}
?>