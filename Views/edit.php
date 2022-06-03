<?php
    if(isset($_GET["id"])){ //controllo che sia stata selezionata una nota
        $objNota = NoteRepository::estrai($_GET["id"]);
        $titolo = $objNota->getTitolo();
        if(isset($_GET["titolo"])){ //controllo che siano gia state inserite le modifiche
            $objNota->setTitolo($_GET["titolo"]);
            $objNota->setContenuto($_GET["contenuto"]);
            $bool = NoteRepository::aggiorna($objNota); //modifico la nota
            echo $bool;
            $id = $objNota->getId();
            header("Location: index.php?action=showAll"); //redirect alla pagina show, per comodità nel debugging
        }else{//form inserimento modifiche
        ?>
            <form method = "GET" action = "index.php">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value=<?php echo $_GET["id"] ?> >
                <input class="note-form" type="text" name="titolo" value= <?php echo $titolo?>><br>
                <textarea class="note-form"  name="contenuto"> <?php echo $objNota->getContenuto()?></textarea> <br>
                <input class="note-form" type="submit">
            </form>
        <?php
        }
    }else{//form selezione nota da modificare
        ?>
        <form method="GET" action="index.php">
            <input type="hidden" name="action" value="edit">
            <label for="id"> Inserisci l'id della nota: </label>
            <input type="text" name="id" id="id">
            <input type="submit">
        </form>
        <?php
    }   
?>