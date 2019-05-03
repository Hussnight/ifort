<?php
// Inclusion du fichier database.php
require '../model/database.php';
session_start();


// Récupération de l'id dans l'url
if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  $id = false;
}

// Récupération des données de l'utilisateur
$query = $db->prepare('SELECT * FROM employees WHERE id = :id'); /** id est un paramètre */
$query->bindValue(':id',$id ,PDO::PARAM_INT);
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// Redirection vers la liste si on ne trouve pas l'employé
if($users === false){
  header('Location: employe_list.php');
}
 
 $errors = [];
 
 
 
 
 
 
 if(!empty($_POST)){
   $name = htmlspecialchars(trim($_POST['name']));
   $firstname = htmlspecialchars(trim($_POST['firstname']));
   $age = htmlspecialchars(trim($_POST['age']));
   $address = htmlspecialchars(trim($_POST['address']));
   $post = htmlspecialchars(trim($_POST['post']));
   $tel = htmlspecialchars(trim($_POST['tel']));
   $ville = htmlspecialchars(trim($_POST['ville']));
   
   if(strlen($name) == 0){
     $errors['name'] = 'Le nom doit être rempli!';
    }
    
    if(strlen($firstname) == 0){
      $errors['firstname'] = 'Le prénom doit être rempli!';
    }
    
    if(!ctype_digit($age)){
      $errors['age'] = 'L\'âge n\'est pas valide!';
    }
    
    if(strlen($address) == 0){
      $errors['address'] = 'L\'adresse doit être remplie!';
    }
    
    if(strlen($post) == 0){
      $errors['post'] = 'Le poste doit être rempli!';
    }
    
    if(!ctype_digit($tel)){
      $errors['tel'] = 'Le numéro de téléphone n\'est pas valide!';
    }
    
    if(strlen($ville) == 0){
      $errors['ville'] = 'La ville doit être remplie!';
    }
    
    
    
    if(empty($errors)){
      
      
      
      $queryUpdate = $db->prepare('UPDATE employees SET id = :id, name = :name, firstname = :firstname, age = :age, address = :address, post = :post, tel = :tel, ville = :ville WHERE id = :id');
      $queryUpdate->bindValue(':id', $id, PDO::PARAM_INT);
      $queryUpdate->bindValue(':name', $name, PDO::PARAM_STR);
      $queryUpdate->bindValue(':firstname', $firstname, PDO::PARAM_STR);
      $queryUpdate->bindValue(':age', $age, PDO::PARAM_INT);
      $queryUpdate->bindValue(':address', $address, PDO::PARAM_STR);
      $queryUpdate->bindValue(':post', $post, PDO::PARAM_STR);
      $queryUpdate->bindValue(':tel', $tel, PDO::PARAM_INT);
      $queryUpdate->bindValue(':ville', $ville, PDO::PARAM_STR);
      
      
      
      if($queryUpdate->execute()){
        
        header('Location: employe_list.php');
        $_SESSION['success'] = 'Les informations de l\'employé '.'<strong>'.$firstname.'</strong>'.' sont modifiées avec succès !';
          
        }
      }
      
    }
    
  
  
  
  ?> 
