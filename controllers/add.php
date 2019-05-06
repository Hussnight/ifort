<?php 
    require_once './model/database.php';


// Traitement du formulaire
$name = $firstname = $age = $address = $post = $tel = $ville = null;

    // if (!empty($_POST)) {
    //     foreach ($_POST as $variable => $value) {
    //         $$variable = $value;

    //     }
        
    // }

    // Initialisation d'une variable vide pour récupérer les erreurs 
    $errors = [];

    if(!empty($_POST)){

        $name = htmlspecialchars(trim($_POST['name']));
        $firstname = htmlspecialchars(trim($_POST['firstname']));
        $age = htmlspecialchars(trim($_POST['age']));
        $address = htmlspecialchars(trim($_POST['address']));
        $post = htmlspecialchars(trim($_POST['post']));
        $tel = htmlspecialchars(trim($_POST['tel']));
        $ville = htmlspecialchars(trim($_POST['ville']));
   


// Récupération des erreurs

if(strlen($name) == 0){
    $errors['name'] = 'Le nom doit être rempli!';
  }
 
  if(strlen($firstname) == 0){
   $errors['firstname'] = 'Le prénom doit être rempli!';
 }
 
 if(empty($age)){
   $errors['age'] = 'L\'âge n\'est pas valide!';
 }
 
 if(strlen($address) == 0){
   $errors['address'] = 'L\'adresse doit être remplie!';
 }
 
 if(strlen($post) == 0){
   $errors['post'] = 'Le poste doit être rempli!';
 }
 
 if(empty($tel)){
   $errors['tel'] = "Le numéro de téléphone n'est pas valide!";
 }

 if(strlen($ville) == 0){
   $errors['ville'] = 'La ville doit être remplie!';
 }

    

// Envoi de la requête dans le cas où il n'y a aucune erreur
    if (empty($errors)) { 

    	$query = $db->prepare(
        'INSERT INTO employees (`name`, `firstname`, `age`, `address`, `post`, `tel`, `ville`) 
        VALUES (:name, :firstname, :age, :address, :post, :tel, :ville)
            ');
        
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_INT);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':post', $post, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_STR);
        $query->bindValue(':ville', $ville, PDO::PARAM_STR);


        
// Si la requête est envoyée, $success retournera un bool true sinon il renverra un bool
        if($query->execute()){
            $success = true;
        }
    		
    }

}  

