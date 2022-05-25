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
                $dataCreazione = $objNota->getDataCreazione();
                echo "             
                <tr>
                    <td> $titolo </td>
                    <td> $contenuto </td>
                    <td> $id </td>
                    <td> $dataCreazione </td>
                    <td> <a href='index.php?action=edit&id=$id'> modifica </a> </td> 
                    <td> <a href='index.php?action=delete&id=$id'> elimina </a> </td>
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
            $dataCreazione = $this->getDataCreazione();
            echo "
            <tr>
                <td> $this->titolo </td>
                <td> $this->contenuto </td>
                <td> $this->id </td>
                <td> $dataCreazione </td>
                <td> <a href='index.php?action=edit&id=$this->id'> modifica </a> </td>
                <td> <a href='index.php?action=delete&id=$this->id'> elimina </a> </td>
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
    public function setDataCreazione(string $dataCreazione){
        $this->dataCreazione = $dataCreazione;
    }
}
?>