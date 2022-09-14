<?php

require "../dbBroker.php";
require "../models/usluga.php";

if(isset($_POST['id'])){
    $myArray = Usluga::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}
