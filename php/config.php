<?php
// Conectar a la base de datos
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('taller') ) {
    die ('Can\'t use taller : ' . mysql_error());
}
?>