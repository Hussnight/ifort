<?php 
// Inclusion du fichier database
require '../database/database.php';

// Traitement du formulaire
$numCle = null;

if(!empty($_POST)){
  $numCle = htmlspecialchars(trim($_POST['numero_cle']));
  
  
  // Initialisation d'une variable vide pour récupérer les erreurs
  
  $errors = [];
  
  // Récupération des erreurs
  
  if(empty($numCle)){
    $errors['numero_cle'] = 'Le numéro de la clé n\'est pas renseigné';
  }
  
  
  // Envoi de la requête dans le cas où il n'y a aucune erreur
  if(empty($errors)){
    
    $queryCle = $db->prepare(
      'INSERT INTO cle (`numero_cle`)
       VALUES (:numero_cle)'
       );
       $queryCle->bindValue(':numero_cle', $numCle, PDO::PARAM_STR);
       
       if($queryCle->execute()){
         
         $success_five = true;
         
        }
        
      }
      
    }
      
  ?>
    
    
   