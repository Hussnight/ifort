<?php

// Inclusion du fichier database
require '../database/database.php';

$response = $db->query('SELECT * FROM cle');

$cles = $response->fetchAll(PDO::FETCH_ASSOC);



?>