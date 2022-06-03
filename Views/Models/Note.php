<?php
require "./Note_repository/note_repository.php";
class Note
{
    private string $titolo;
    private string $contenuto;
    private string $dataCreazione;
    private string $id;

    public function __construct(string $titolo, string $contenuto, string $id, string $dataCreazione)
    {
        $this->titolo = $titolo;
        $this->contenuto = $contenuto;
        $this->id = $id;
        $this->dataCreazione = $dataCreazione;
        
    }


    //metodi statici
    public static function creaId(){
        $digits_needed=8;
        $random_number=''; // set up a blank string
        $count=0;
        while ( $count < $digits_needed ) {
            $random_digit = mt_rand(0, 9);
            $random_number .= $random_digit;
            $count++;
        }
        return $random_number;
    }

    //le funzioni show sono provvisiore, le adatterò a css e html
    public static function showAll($note_array)
    {
        foreach($note_array as $objNota){
            $objNota->show();
        }
    }

    public static function searchByTitle(string $titolo)
    {
        $arry_note = NoteRepository::estrai_tutti();
        $note_con_titolo = [];

        foreach ($arry_note as $objNota){
            /*if(str_contains($objNota->getTitolo(), $titolo)){
                $note_con_titolo[] = $objNota;
            } funzione supportata solo da php 8 in su*/
            $xd = $objNota->getTitolo();
            if(strpos($xd, $titolo, 0) !== false){
                $note_con_titolo[] = $objNota;
            }
        }
        return $note_con_titolo;
    }
        
    public function show(){
        ?>
            <div class="nota">
                <?php
                echo "
                <h3>$this->titolo</h3>
                <p>$this->contenuto</p>
                ";
                ?>
                <div class="toolbar">
                    <a href='index.php?action=delete&id=<?php echo "$this->id"?>'><img src="./styles/imgs/wtrashcan.png"></a>
                    <a href='index.php?action=edit&id=<?php echo "$this->id"?>'><img src="./styles/imgs/wedit.png"></a>
                </div>
            </div>
        <?php
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
    public function setDataCreazione(string $dataCreazione){
        $this->dataCreazione = $dataCreazione;
    }
}
?>