<?php

require "../dbBroker.php";
require "../models/usluga.php";

if(isset($_POST['id'])){
    $obj = new Usluga($_POST['id']);
    $status = $obj->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>
