<?php
class Usluga
{
    public $id;
    public $naziv;
    public $ambulanta;
    public $cena;
    public $datum;
    public $pacijentId;


    public function __construct($id = null, $naziv = null, $ambulanta = null, $cena = null, $datum = null, $pacijentId = null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->ambulanta = $ambulanta;
        $this->cena = $cena;
        $this->datum = $datum;
        $this->pacijentId = $pacijentId;
    }


    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM usluge";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn)
    {

        $query = "SELECT * FROM usluge WHERE id=$id";
        $myObj = array();
        if ($msqlObj = $conn->query($query)) {

            while ($red = $msqlObj->fetch_array(1)) {
                $myObj[] = $red;
            }
        }

        return $myObj;
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM usluge WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function update(Usluga $novaUsluga, mysqli $conn)
    {
        $query = "UPDATE usluge set naziv='$novaUsluga->naziv', ambulanta='$novaUsluga->ambulanta', cena='$novaUsluga->cena', datum='$novaUsluga->datum', pacijentId='$novaUsluga->pacijentId' WHERE id='$novaUsluga->id'";
        return $conn->query($query);
    }

    public static function add(Usluga $Usluga, mysqli $conn)
    {
        $query = "INSERT INTO usluge(naziv, ambulanta, cena, datum, pacijentId) VALUES('$Usluga->naziv','$Usluga->ambulanta','$Usluga->cena','$Usluga->datum','$Usluga->pacijentId')";
        return $conn->query($query);
    }
}
