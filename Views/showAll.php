<?php
$array_note = NoteRepository::estrai_tutti();
Note::showAll($array_note);
?>