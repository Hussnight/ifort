<?php 

require '../database/database.php';
require 'add_badge.php';
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un badge</title>
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
          <li><a class="nav-link" href="badge.php">Ajouter un badge</a></li>
          <li><a class="nav-link" href="badge_list.php">Liste des badges</a></li>
          <li><a class="nav-link" href="../employes-badges/employes_has_badges.php">Liste des employés ayant un badge</a></li>
          <li><a class="nav-link" href="../employes-badges/insert_badges.php">Associer un badge à un employé</a></li>
        </ul>
      </li>
      <li class="nav-item">Clés
        <ul class="submenu">
          <li><a class="nav-link" href="../cles/cle.php">Ajouter une clé</a></li>
          <li><a class="nav-link" href="../cles/cle_list.php">Liste des clés</a></li>
          <li><a class="nav-link" href="../employes-cles/employes_has_cles.php">Liste des employés ayant une clé</a></li>
          <li><a class="nav-link" href="../employes-cles/insert_cles.php">Associer une clé à un employé</a></li>
        </ul>
      </li>
      
    </ul>
  </div>
</nav>

</header>

    <h1>Ajouter un badge</h1>
    <hr>

    <!-- Si la requête est envoyée, un message de succès apparaît -->
    <?php if(isset($successTwo)){;?>
            <div class="alert alert-success alert-dismissible fade show">
            Le badge numéro <strong><?php echo $numBadge;  ?></strong> est ajouté avec succès !
            
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }?>

<div class="container">
    <div class="form-group" >
        <form method="POST">
            <label for="numero_badge">Numéro</label>
            <input class="form-control" type="text" name="numero_badge" id="numero_badge"><br>
            <!-- <label for="state">État</label>
            <select class="form-control" name="state" id="state">
              <option class="form-control" value=" - "> - </option>
              <option class="form-control" value="activé">Activé</option>
              <option class="form-control" value="désactivé">Désactivé</option>
            </select><br> -->
            <button type="submit" class="btn btn-primary" name="envoi_deux">Ajouter</button>
        </form>
    </div>
</div>
    

  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>