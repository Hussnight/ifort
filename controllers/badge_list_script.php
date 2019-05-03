<?php
require '../model/database.php';
session_start();


// Récupération du contenu de la table employees
$response = $db->query('SELECT * FROM badge');

// Récupération de tous les champs de la table sous forme de tableau associatif
$badges = $response->fetchAll(PDO::FETCH_ASSOC);

?>
