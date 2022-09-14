<?php

class Pacijent
{
    public $id;
    public $korisnickoIme;
    public $lozinka;

    public function __construct($id = null, $username = null, $password = null)
    {
        $this->id = $id;
        $this->korisnickoIme = $username;
        $this->lozinka = $password;
    }
}
