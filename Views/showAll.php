<?php
//var_dump($array_note);
//Note::showAll();
$array_note = Note::searchByTitle("nota ricerca titolo");
Note::showAll($array_note);
?>