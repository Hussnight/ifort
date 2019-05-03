<?php 
require '../model/database.php';
require 'employes_has_cles_script.php';

// session_start();

// Traitement du formulaire
$idEmploye = $idCle = null;

if(!empty($_POST)){
  
    $idEmploye = htmlspecialchars(trim($_POST['id_employe']));
    $idCle = htmlspecialchars(trim($_POST['id_cle']));

    
    // Gestion des erreurs
    $errors = [];
    
    if(empty($idEmploye) && !ctype_digit($idEmploye)){
      
      $errors['id_employe'] = 'L\'identifiant de l\'employé n\'est pas renseigné';
      
    }
    
    if(empty($idCle ) && !ctype_digit($idCle)){
      
      $errors['id_cle'] = 'L\'identifiant de la clé n\'est pas renseigné';
      
    }

    // Assignation des noms des employés aux id
    if($idEmploye == 'Dupont Norbert')
    {
      $idEmploye = 1;
    }else if($idEmploye == 'Agouni Hocine')
    {
      $idEmploye = 2;
    }else if($idEmploye == 'Dubois Kévin')
    {
      $idEmploye = 3;
    }else if($idEmploye == '-'){
      $errors['id_employe'] = 'Le nom de l\'employé n\'est pas renseigné ! ';
    }

    
    // Assignation des numéros de clé aux id
    if($idCle == '123')
    {
      $idCle = 1;
    }elseif($idCle == '456')
    {
      $idCle = 2;
    }else if($idCle == '789')
    {
      $idCle = 3;
    }else if($idCle == '-'){
      $errors['id_cle'] = 'Le numéro de la clé n\'est pas renseigné ! ';
    }
    

    foreach($employeHasCles as $employeHasCle){
      if($employeHasCle['name'] == "Dupont" && $idEmploye == 1){

        $errors['id_cle'] = 'Cet employé et cette clé sont déjà associés !';
        
      }else if($employeHasCle['name'] == "Agouni" && $idEmploye == 2){

        $errors['id_cle'] = 'Cet employé et cette clé sont déjà associés !';

      }else if($employeHasCle['name'] == "Dubois" && $idEmploye == 3){
        
        $errors['id_cle'] = 'Cet employé et cette clé sont déjà associés !';

      }
    }


    // Envoi de la requête dans le cas où il n'y a aucune erreur
    if(empty($errors)){
      
      $queryInsert = $db->prepare('INSERT INTO cle_employee (`id_employee`, `id_cle`) VALUES (:id_employe, :id_cle)');
      $queryInsert->bindValue(':id_employe', $idEmploye, PDO::PARAM_INT);
      $queryInsert->bindValue(':id_cle', $idCle, PDO::PARAM_INT);
      
      
      if($queryInsert->execute()){
        
        header('Location: employes_has_cles.php');
        $_SESSION['success_two'] = '<strong>La clé est associée avec succès !</strong>';        
      }
      
    }
  }

?>