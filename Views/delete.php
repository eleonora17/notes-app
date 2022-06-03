<?php
if(isset($_GET["id"]))
{
    $objSmartTV = NoteRepository::elimina($_GET["id"]);
    header("Location:index.php?action=showAll");
}
else
{
    ?>
    <form method="GET" action="index.php">
        <input type = "hidden" name = "action" value = "delete">
        <label for="id"> Inserisci id della nota da eliminare: </label>
        <input type="text" name="id">
        <input type="submit">
    </form>
    <?php
}
?>    