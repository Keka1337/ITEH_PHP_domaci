<?php

require "../dbBroker.php";
require "../models/usluga.php";

if(isset($_POST['id']) && isset($_POST['naziv']) && isset($_POST['ambulanta']) 
&& isset($_POST['cena']) && isset($_POST['pacijentId'])&& isset($_POST['datum'])){

    $novaUsluga = new Usluga($_POST['id'],$_POST['naziv'],$_POST['ambulanta'],$_POST['cena'],$_POST['datum'],$_POST['pacijentId']);
    $status =Usluga::update($novaUsluga,$conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}

?>