<?php 

require_once '../model/database.php';
require_once '../controllers/employe_single_script.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier les coordonnées</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="badge.php">IFORT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
          <li class="nav-item active">Employés
            <ul class="submenu">
              <li><a class="nav-link" href="../index.php">Ajouter un employé<span class="sr-only">(current)</span></a></li>
              <li><a class="nav-link" href="../employes/employe_list.php">Liste des employés</a></li>
            </ul>
          </li>
        
      <li class="nav-item">Badges
        <ul class="submenu">
          <li><a class="nav-link" href="./badge.php">Ajouter un badge</a></li>
          <li><a class="nav-link" href="./badge_list.php">Liste des badges</a></li>
          <li><a class="nav-link" href="./employes_has_badges.php">Liste des employés ayant un badge</a></li>
          <li><a class="nav-link" href="../employes-badges/insert_badges.php">Associer un badge à un employé</a></li>
        </ul>
      </li>
      <li class="nav-item">Clés
        <ul class="submenu">
          <li><a class="nav-link" href="./cle.php">Ajouter une clé</a></li>
          <li><a class="nav-link" href="./cle_list.php">Liste des clés</a></li>
          <li><a class="nav-link" href="./employes_has_cles.php">Liste des employés ayant une clé</a></li>
          <li><a class="nav-link" href="./insert_cles.php">Associer une clé à un employé</a></li>
        </ul>
      </li>
      
    </ul>
  </div>
</nav>
<h1>Modification</h1>

        

</header>
    


<main class="container">
<div class="form-group">
<form method="POST" >
          <?php foreach($users as $user){?>
          <label for="name">Nom</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="<?php echo $user['name']; ?>"> 
            <?php if(isset($errors['name'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['name'] ?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php } ?>
            <?php } ?>
          <label for="firstname">Prénom</label>
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" value="<?php echo $user['firstname']; ?>"> 
            <?php if(isset($errors['firstname'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['firstname'] ;?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
          <label for="age">Âge</label>
          <input type="text" class="form-control" name="age" id="age" placeholder="Âge" value="<?php echo $user['age']; ?>">
            <?php if(isset($errors['age'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['age'] ?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
          <label for="address">Adresse</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Adresse" value="<?php echo $user['address']; ?>">
            <?php if(isset($errors['address'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['address'] ?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
          <label for="ville">Ville</label>
          <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" value="<?php echo $user['ville']; ?>">
            <?php if(isset($errors['ville'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['ville'] ?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
          <label for="post">Poste</label>
          <input type="text" class="form-control" name="post" id="post" placeholder="Poste" value="<?php echo $user['post'];?>">
            <?php if(isset($errors['post'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['post'] ?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
          <label for="tel">Téléphone</label>
          <input type="text" class="form-control" name="tel" id="tel" placeholder="Ex : 0605040302..." value="<?php echo $user['tel']; ?>">
            <?php if(isset($errors['tel'])) {?>
              <div class="alert alert-danger"><strong><?php echo $errors['tel'] ?></strong>
                <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php } ?>
            
          <br>
        <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
        </div>
</div>
</form>
</main>  







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>