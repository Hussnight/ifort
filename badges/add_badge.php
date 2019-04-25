<?php 
// Inclusion du fichier database
require '../database/database.php';

// Traitement du formulaire
$numBadge = null ;

if(!empty($_POST)){
    $numBadge = htmlspecialchars(trim($_POST['numero_badge']));
    // $state = $_POST['state'];
}

// Initialisation d'une variable vide pour récupérer les erreurs

$errors = [];

// Récupération des erreurs

if(empty($numBadge)){
    $errors['numero_badge'] = 'Le numéro du badge n\'est pas renseigné'  ;
}

// if(empty($state)){
//     $errors['state'] = 'L\'état du badge n\'est pas renseigné'  ;
// }




// Envoi de la requête dans le cas où il n'y a aucune erreur
if(empty($errors)){
    $queryBadge = $db->prepare(
        'INSERT INTO badge (`numero_badge`) 
         VALUES(:numero_badge)'
         );
    $queryBadge->bindValue(':numero_badge', $numBadge, PDO::PARAM_STR);

// Si la requête est envoyée, $successTwo retournera un bool true sinon il renverra un bool false
if($queryBadge->execute()){
    $successTwo = true;
}else{
    echo 'erreur';
}

}



//     if($queryBadge->execute()){
//         $successTwo = true;
//     }

// class Status_Save {
//     const STATUS_SAVED = 1;
//     const STATUS_ERROR_UNKNOWN = 2;
//     const STATUS_ERROR_QDQSDQ = 3;

//     protected $_status = self::STATUS_ERROR_UNKNOWN;

//     static protected $available_status = [
//         self::STATUS_SAVED,
//         self::STATUS_ERROR_UNKNOWN,
//         self::STATUS_ERROR_QDQSDQ,
//     ];

//     function set_status($status) {
//         if (!in_array($status, self::$available_status)) {
//             trigger_error('bla bla marche pas');
//         }
//         self::$_status = $status;
//     }

//     function get_status() {
//         return self::$_status;
//     }

//     function is($status) {
//         return self::$_status === $status;
//     }
// }

// $status_sauvegarde = new Status_Save();
// $status_sauvegarde->set_status(Status_Save::STATUS_SAVED);
// $status_sauvegarde->set_status(Status_Save::STATUS_ERR);

// $status_sauvegarde->get_status();


// if ($status_sauvegarde->is(Status_Save::STATUS_SAVED)) {
//     rediriger_ca_a_fonctionne(); 
// }

// }

