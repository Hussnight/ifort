<?php require_once '../controllers/insert_cles_script.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Associer une clé</title>
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

</header>

<h1>Associer une clé</h1>


<div class="container">
    <div class="form-group">
    <form method="POST">
        <label for="id_employe">Nom de l'employé</label>
        <select class="form-control" type="text" name="id_employe" id="id_employe">
            <option> - </option>
            <option class="form-control" name="id_employe" id="id_employe">Dupont Norbert </option>
            <option class="form-control" name="id_employe" id="id_employe">Agouni Hocine </option>
            <option class="form-control" name="id_employe" id="id_employe">Dubois Kévin </option>
        </select><br>
          <?php if(isset($errors['id_employe'])) {?>
            <div class="alert alert-danger"> <strong> <?php echo $errors['id_employe'] ?> </strong> 
              <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        <label for="id_cle">Numéro de la clé</label>
        <select class="form-control" type="text" name="id_cle" id="id_cle">
            <option> - </option>
            <option class="form-control" name="id_cle" id="id_cle">123 </option>
            <option class="form-control" name="id_cle" id="id_cle">456 </option>
            <option class="form-control" name="id_cle" id="id_cle">789</option>
        </select><br>
          <?php if(isset($errors['id_cle'])) {?>
            <div class="alert alert-danger"> <strong> <?php echo $errors['id_cle'] ?> </strong> 
              <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
            <button type="submit" class="btn btn-primary" name="envoi">Associer</button>
    </form>
    </div> 
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>