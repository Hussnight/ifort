<?php
// Inclusion du fichier database
require '../database/database.php';

// Récupération de l'id dans l'url
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
}else{
    $id = false;
}

// Récupération des données de la clé
$query = $db->prepare('SELECT * FROM cle WHERE id=:id'); /**id est un paramètre qui permet de récupérer les données de la clé correspondant à son id */
$query->bindValue(':id',$id ,PDO::PARAM_INT);
$query->execute();
$cles = $query->fetch(PDO::FETCH_ASSOC);

// Message d'erreur si on ne trouve pas la clé
if($cles === false){
    http_response_code(404); ?>
    <h1>404. NOT FOUND<br> Redirection en cours...</h1>
   <script>
       setTimeout(function() => {

           windows.location = 'employe_list.php';
           
       }, 1000);
   </script> 
<?php //die();
}

$errors = [];

if(!empty($_POST)){

    $numCle = htmlspecialchars(trim($_POST['numero_cle']));

    if(empty($numCle)){
        $errors['numero_cle'] = 'Le numéro de la clé n\'est pas renseigné'; 
    }

    if(empty($errors)){
        $queryUpdate = $db->prepare('UPDATE cle SET id = :id, numero_cle = :numero_cle WHERE id = :id');
        $queryUpdate->bindValue(':id', $id, PDO::PARAM_INT);
        $queryUpdate->bindValue(':numero_cle', $numCle, PDO::PARAM_STR);

        if($queryUpdate->execute()){
            $success_six = true;
        }
    }
}


?>