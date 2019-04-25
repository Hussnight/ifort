<?php
require_once '../database/database.php';




// Récupération du contenu de la table employees
$response = $db->query('SELECT * FROM employees');

// Récupération de tous les champs de la table sous forme de tableau associatif
$employes = $response->fetchAll(PDO::FETCH_ASSOC);

?>
