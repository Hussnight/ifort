<?php
// Inclusion du fichier database.php
require '../model/database.php';
session_start();



// Récupération de l'id dans l'url
// $id = isset($_GET['id']) ? $_GET['id'] : 0;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = false;
}

// Récupération des données du badge
$query = $db->prepare('SELECT * FROM badge WHERE id = :id'); /** id est un paramètre */
$query->bindValue(':id',$id ,PDO::PARAM_INT);
$query->execute();
$badges = $query->fetchAll(PDO::FETCH_ASSOC);
         


// Redirection vers la liste si on ne trouve pas le badge
 if($badges === false){
  header('Location: badge_list.php');
    
 
 }

 $errors = [];

 if(!empty($_POST)){
     $numBadge = $_POST['numero_badge'];
     $state = $_POST['state'];

     if(strlen($numBadge) == 0 ){
      $errors['numero_badge'] = 'Le numéro du badge doit être renseigné!';
    }
     
     if(empty($state) || $state == '-'){
      $errors['state'] = 'L\'état du badge doit être renseigné!';
    }

    if($state == 'activer'){
      $state = 1;
    }else if($state == 'désactiver'){
      $state = 0;
    }


    if(empty($errors)){
     
    
     $queryUpdate = $db->prepare('UPDATE badge SET id = :id, numero_badge = :numero_badge, state = :state WHERE id = :id');
     $queryUpdate->bindValue(':id', $id, PDO::PARAM_INT);
     $queryUpdate->bindValue(':numero_badge', $numBadge, PDO::PARAM_STR);
     $queryUpdate->bindValue(':state', $state, PDO::PARAM_INT);

     if($queryUpdate->execute()){

      header('Location: badge_list.php');
      $_SESSION['success_three'] = 'La badge est modifié avec succès !';  
     }
    }

    

}


?> 