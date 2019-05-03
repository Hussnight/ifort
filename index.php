<?php
// Inclusion des fichiers database et add
    require_once './model/database.php';
    require_once './controllers/add.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ifort</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.php">IFORT</a>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">Employés
          <ul class="submenu">
            <li><a class="nav-link" href="index.php">Ajouter un employé <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-link" href="./templates/employe_list.php">Liste des employés</a></li>
          </ul>
        </li>
        
        <li class="nav-item">Badges
          <ul class="submenu">
            <li><a class="nav-link" href="./templates/badge.php">Ajouter un badge</a></li>
            <li><a class="nav-link" href="./templates/badge_list.php">Liste des badges</a></li>
            <li><a class="nav-link" href="./templates/employes_has_badges.php">Liste des employés ayant un badge</a></li>
            <li><a class="nav-link" href="./templates/insert_badges.php">Associer un badge à un employé</a></li>
          </ul>
        </li>
        <li class="nav-item">clés
          <ul class="submenu">
            <li><a class="nav-link" href="./templates/cle.php">Ajouter une clé</a></li>
            <li><a class="nav-link" href="./templates/cle_list.php">Liste des clés</a></li>
            <li><a class="nav-link" href="./templates/employes_has_cles.php">Liste des employés ayant une clé</a></li>
            <li><a class="nav-link" href="./templates/insert_cles.php">Associer une clé à un employé</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>


<!-- <nav>
  <ul>
    <li class="employes"><a href="index.php">Employés</a>
      <ul class="submenu">
        <li><a href="index.php">Ajouter un employé</a></li>
        <li><a href="employes/employe_list.php">Liste des employés</a></li>
      </ul>
    </li>
    <li class="badges"><a href="./badges/badge.php">Badges</a>
      <ul class="submenu">
        <li><a href="./badges/badge.php">Ajouter un badge</a></li>
        <li><a href="./badges/badge_list.php">Liste des badges</a></li>
        <li><a href="./employes-badges/employes_has_badges.php">Liste des employés ayant un badge</a></li>
        <li><a href="./employes-badges/insert_badges.php">Associer un badge à un employé</a></li>
      </ul>
    </li>
    <li class="cles"><a href="cles/cle.php">Clés</a>
      <ul class="submenu">
        <li><a class="nav-link" href="cles/cle.php">Ajouter une clé </a></li>
        <li><a class="nav-link" href="cles/cle_list.php">Liste des clés</a></li>
        <li><a class="nav-link" href="employes-cles/employes_has_cles.php">Liste des employés ayant une clé</a></li>
        <li><a class="nav-link" href="employes-cles/insert_cles.php">Associer une clé à un employé</a></li>
      </ul>
    </li>
  </ul>
</nav> -->

</header>

    <h1>Ajouter un employé</h1>
    <hr>
    <!-- Si la requête est envoyée, un message de succès apparaît -->
        <?php if(isset($success)){;?>
            <div class="alert alert-success alert-dismissible fade show">
            L'employé <strong><?php echo $name;  ?></strong> a été ajouté avec succès !
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }?>
    
    <div class="container">
        <div class="form-group">
            <form name="register" method="POST" enctype="multipart/form-data">
                <label for="name">Nom </label>
                <input class="form-control" type="text" name="name" id="name">
                  <?php if(isset($errors['name'])) {?>
                    <div class="alert alert-danger"><strong><?php echo $errors['name'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                <label for="firstname">Prénom </label>
                <input class="form-control" type="text" name="firstname" id="firstname">
                  <?php if(isset($errors['firstname'])) {?>
                    <div class="alert alert-danger"><strong><?php echo $errors['firstname'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                     </div>
                  <?php } ?>
                <label for="age">Âge </label>
                <input class="form-control" type="text" name="age" id="age">
                  <?php if(isset($errors['age'])) {?>
                    <div class="alert alert-danger"><strong><?php echo $errors['age'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                <label for="ville">Ville </label>
                <input class="form-control" type="text" name="ville" id="ville">
                  <?php if(isset($errors['ville'])) {?>
                   <div class="alert alert-danger"><strong><?php echo $errors['ville'] ?></strong>
                    <button type="button" class="close" data-dismiss="alert">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php } ?>
                <label for="address">Adresse </label>
                <input class="form-control" type="text" name="address" id="address">
                  <?php if(isset($errors['address'])) {?>
                    <div class="alert alert-danger"><strong><?php echo $errors['address'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                <label for="post">Poste </label>
                <input class="form-control" type="text" name="post" id="post">
                  <?php if(isset($errors['post'])) {?>
                    <div class="alert alert-danger"><strong><?php echo $errors['post'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?>
                <label for="tel">Numéro de téléphone </label>
                <input class="form-control" type="text" name="tel" id="tel">
                  <?php if(isset($errors['tel'])) {?>
                    <div class="alert alert-danger"><strong><?php echo $errors['tel'] ?></strong>
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php } ?> <br>
                <button type="submit" class="btn btn-primary" name="envoi">S'inscrire</button>
                <?php 
                // echo '<pre>';
                // var_dump($db->lastInsertid()); 
                ?>
            </form>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>