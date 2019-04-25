<?php 

require '../database/database.php';
require_once 'employes_has_badges_script.php';
// session_start();

// Traitement du formulaire
$idEmploye = $idBadge = null;

if(!empty($_POST)){
  
    $idEmploye = htmlspecialchars(trim($_POST['id_employe']));
    $idBadge = htmlspecialchars(trim($_POST['id_badge']));

    
    // Gestion des erreurs
    $errors = [];
    // $doublons = [];
    
    if(empty($idEmploye) && !ctype_digit($idEmploye)){
      
      $errors['id_employe'] = 'L\'identifiant de l\'employé n\'est pas renseigné';
      
    }
    
    if(empty($idBadge ) && !ctype_digit($idBadge)){
      
      $errors['id_badge'] = 'L\'identifiant du badge n\'est pas renseigné';
      
    }

    // Assignation des noms des employés aux id
    if($idEmploye == 'Dupont Norbert')
    {
      $idEmploye = 1;
      // $doublons['id_employe'] = $idEmploye;
    }else if($idEmploye == 'Agouni Hocine')
    {
      $idEmploye = 2;
      // $doublons['id_employe'] = $idEmploye;

    }else if($idEmploye == 'Dubois Kévin')
    {
      $idEmploye = 3;
      // $doublons['id_employe'] = $idEmploye;

    }else if($idEmploye == '-'){
      $errors['id_employe'] = 'Le nom de l\'employé n\'est pas renseigné ! ';
    }
    
    // Assignation des numéros de badge aux id
    if($idBadge == '123')
    {
      $idBadge = 1;
      // $doublons['id_badge'] = $idBadge;

    }elseif($idBadge == '456')
    {
      $idBadge = 2;
      // $doublons['id_badge'] = $idBadge;

    }else if($idBadge == '789')
    {
      $idBadge = 3;
      // $doublons['id_badge'] = $idBadge;

    }else if($idBadge == '-'){
      $errors['id_badge'] = 'Le numéro du badge n\'est pas renseigné ! ';
    }



    foreach($employeHasBadges as $employeHasBadge){
      if($employeHasBadge['name'] == "Dupont" && $idEmploye == 1){

        $errors['id_badge'] = 'Cet employé et ce badge sont déjà associés !';
        
      }else if($employeHasBadge['name'] == "Agouni" && $idEmploye == 2){

        $errors['id_badge'] = 'Cet employé et ce badge sont déjà associés !';

      }else if($employeHasBadge['name'] == "Dubois" && $idEmploye == 3){
        
        $errors['id_badge'] = 'Cet employé et ce badge sont déjà associés !';

      }
    }

    

    // foreach($doublons as $doublon){
    //   if($idEmploye == $idEmploye){
    //     $errors['id_employe'] = 'Cet employé est déjà associé';
    //   }else if($idBadge == $idBadge){
    //     $errors['id_badge'] = 'Ce badge est déjà associé';
    //   }
    //   echo '<pre>';
    //   var_dump($doublons);
    // }
    
    // Envoi de la requête dans le cas où il n'y a aucune erreur
    if(empty($errors)){
      
      $queryInsert = $db->prepare('INSERT INTO badge_employee (`id_employee`, `id_badge`) VALUES (:id_employe, :id_badge)');
      $queryInsert->bindValue(':id_employe', $idEmploye, PDO::PARAM_INT);
      $queryInsert->bindValue(':id_badge', $idBadge, PDO::PARAM_INT);
      
      
      if($queryInsert->execute()){
        
        header('Location: employes_has_badges.php');
        $_SESSION['success_three'] = ' <strong>Le badge est associé avec succès !</strong> ';
        
      }
    }
  }

?>