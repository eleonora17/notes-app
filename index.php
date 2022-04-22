    <!--form per l'inserimento dei dati necessari alla creazione di una nuova nota-->
    <!--PROVA CREAZIONE NOTA ==> funziona -->
    <form method = "GET" action = "index.php">
        <label for = "titolo">titolo</label><br>
        <input type = "text" name = "titolo"><br>
        <label for = "contenuto">contenuto</label><br>
        <input type = "text" name = "contenuto"><br>
        <input type = "submit">    
    </form>

    <?php
        require 'Note.php';     
        $titolo = $_GET["titolo"]; 
        $contenuto = $_GET["contenuto"]; 
        $newNote = new Note($titolo, $contenuto);
        $bool=NoteRepository::inserisci($newNote);
        echo "$bool";
        //prova eliminazione per id ==> funzione
        //$bool = NoteRepository::elimina("idk"); 
    ?>