<?php
require "./Note_repository/note_repository.php";
class Note
{
    private string $titolo;
    private string $contenuto;
    private DateTime $dataCreazione;
    private string $id;
    private static string $lastId = ''; //variabile che salva l'ultimo id creato, viene utilizzata per controllare che non ci siano id duplicati

    public function __construct(string $titolo, string $contenuto)
    {
        $this->titolo = $titolo;
        $this->contenuto = $contenuto;
        $this->id =  Note::creaId(); //sto ancora pernsando a un modo per generare un id che abbia senso per ogni nota
        $this->dataCreazione = new DateTime("NOW"); //prende la data e l'ora attuali dal server NTP di default
    }

    //metodi statici
    private static function creaId(){
        $digits_needed=8;
        $random_number=''; // set up a blank string
        $count=0;
        while ( $count < $digits_needed ) {
            $random_digit = mt_rand(0, 9);
            $random_number .= $random_digit;
            $count++;
        }
        if (Note::$lastId == $random_number){
            Note::creaId();
        }else{
            Note::$lastId = $random_number;
            return $random_number;   
        }
    }

    public static function showAll($note_array)
        {
            ?>
              <table border = "1">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Contenuto</th>
                        <th>Id</th>                        
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach($note_array as $objNota)
            {
                $titolo = $objNota->getTitolo();
                $contenuto = $objNota->getContenuto();
                $id = $objNota->getId();
                echo "             
                <tr>
                    <td> $titolo </td>
                    <td> $contenuto </td>
                    <td> $id </td>
                    <td> <a href='./update.php?action=showOne&numero_seriale=$id'> modifica </a> </td> 
                    <td> <a href='./delete.php?action=showOne&numero_seriale=$id'> elimina </a> </td>
                </tr>
               ";//gli ultimi due td sono dei link alle pagine update.php e delete.php relative alla smart_tv di quella riga
            }
            ?>
                </tbody>
            </table>
        <?php
        }
        
    public function show(){
        ?>
            <table border = "1">
              <thead>
                  <tr>
                      <th>Titolo</th>
                      <th>Contenuto</th>
                      <th>Id</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
            <?php
            echo "
            <tr>
                <td> $this->titolo </td>
                <td> $this->contenuto </td>
                <td> $this->id </td>
                <td> <a href='./update.php?action=showOne&numero_seriale=$this->id'> modifica </a> </td>
                <td> <a href='./delete.php?action=showOne&numero_seriale=$this->id'> elimina </a> </td>
            </tr>
           ";//gli ultimi due td sono dei link alle pagine update.php e delete.php relative alla smart_tv mostrata 
           ?>
                </tbody>
            </table>
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
    public function setDataCreazione(DateTime $dataCreazione){
        $this->dataCreazione = $dataCreazione;
    }
}
?>