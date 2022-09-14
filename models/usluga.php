<?php
class Usluga{
    public $id;   
    public $naziv;   
    public $ambulanta;   
    public $cena;   
    public $datum;
    public $pacijentId;
    

    public function __construct($id=null, $naziv=null, $ambulanta=null, $cena=null, $datum=null,$pacijentId=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->ambulanta = $ambulanta;
        $this->cena = $cena;
        $this->datum = $datum;
        $this->pacijentId=$pacijentId;
    }

}
