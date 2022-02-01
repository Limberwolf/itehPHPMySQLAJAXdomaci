<?php

require_once 'db.php';

class Ljubimac
{
    public $id;
    public $tip;
    public $rasa;
    public $ime;
    public $godine;
    public $boja;
    public $vlasnik_id;

    public function __construct($id, $tip, $rasa, $ime, $godine, $boja, $vlasnik_id)
    {
        $this->id = $id;
        $this->tip = $tip;
        $this->rasa = $rasa;
        $this->ime = $ime;
        $this->godine = $godine;
        $this->boja = $boja;
        $this->vlasnik_id = $vlasnik_id;
    }

    public function dodajNovog($ljubimac)
    {
        $db = new DB();
        $upit = "insert into ljubimac values (NULL, '$ljubimac->tip', '$ljubimac->rasa', '$ljubimac->ime', '$ljubimac->godine',
        '$ljubimac->boja', '$ljubimac->vlasnik_id')";

        $rez = $db->connection->query($upit);
        if ($rez) {
            return true;
        } else {
            return false;
        }
    }
}
