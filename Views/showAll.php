<div class="container">
<?php
//var_dump($array_note);
//Note::showAll();
if(isset($_GET["searchbar"])){
    $array_note = Note::searchByTitle($_GET["searchbar"]);
}else{
    $array_note = NoteRepository::estrai_tutti();
}
Note::showAll($array_note);
?>
</div>