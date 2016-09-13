<?php
// Conectar a la base de datos
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('electronicadb') ) {
    die ('Can\'t use electronicadb : ' . mysql_error());
}
?>