<?php
    //require 'smartTV.php';
    if(isset($_GET["id"]))
    {
        $objNota = NoteRepository::estrai($_GET["id"]);
        $objNota->show();
    }
    else
    {
        ?>
        <form method="GET" action="index.php">
            <input type="hidden" name="action" value="showOne">
            <label for="id"> Inserisci l'id della nota: </label>
            <input type="text" name="id" id="id">
            <input type="submit">
        </form>
        <?php
    }
?>