<?php
// Connexion à la base de donnée ifort
$db = new PDO('mysql:host=localhost;dbname=ifort;charset=utf8', 'root', '', [
        // On active les erreurs SQL
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        // Récupération des résultats en tableau associatif
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// Gestion des erreurs 
try
{   
	$db = new PDO('mysql:host=localhost;dbname=ifort;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



 ?>