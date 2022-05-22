<?php
$array_note = NoteRepository::estrai_tutti();
//var_dump($array_note);
Note::showAll($array_note);
?>