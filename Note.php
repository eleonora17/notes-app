<?php
require "./Note_repository/note_repository.php";
class Note
{
    private string $titolo;
    private string $contenuto;
    private string $id;
    private DateTime $dataCreazione;

    public function __construct(string $titolo, string $contenuto)
    {
        $this->titolo = $titolo;
        $this->contenuto = $contenuto;
        $this->id =  "idk"; //sto ancora pernsando a un modo per generare un id che abbia senso per ogni nota
        $this->dataCreazione = new DateTime("NOW"); //prende la data e l'ora attuali dal server NTP di default
    }

    //getter e setter
    public function getTitolo(){
        return $this->titolo;
    }
    public function getContenuto(){
        return $this->contenuto;
    }
    public function getId(){
        return $this->id;
    }
    public function getDataCreazione(){
        return $this->dataCreazione;
    }

    public function setTitolo(string $titolo){
        $this->titolo = $titolo;
    }
    public function setContenuto(string $contenuto){
        $this->contenuto = $contenuto;
    }
    public function setId(string $id){
        $this->id = $id;
    }
    public function setDataCreazione(DateTime $dataCreazione){
        $this->dataCreazione = $dataCreazione;
    }
}
?>