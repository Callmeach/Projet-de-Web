<?php 
  require_once 'utils.php';
  echo is_logged();
  //if (!is_logged()) {
  //  header('location:/projetweb');
  //}
  require_once '../layout/headerAdmin.php';
?>
<div class="">
<div>
    <form action="projet/filtrer.php" class="myform" method="post">
        <select name="sexe" id="">
            <option value="">Selectionner un sexe</option>
            <option value="Mas">Masculin</option>
            <option value="Fem">Feminin</option>
        </select>
        <input type="submit" value="Filtrer">

    </form>
</div>
<div>
    <form action="projet/filtrer.php" class="myform" method="post">
        <select name="serie" id="">
            <option value="">Selectionner une série</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">F</option>
            <option value="F">E</option>
        </select>
        <input type="submit" value="Filtrer">

    </form>
</div>
</div>
<section class="inscrits">
<div class="container">
<?php
require_once "baseDonnee.php";
if (isset($_POST['sexe']) or isset($_POST['serie']) or isset($_GET['test'])) {
    # code...

if (isset($_POST['sexe']) and $_POST['sexe']=="Mas")
{
  $affichage=$connexion->query("select * from etudiant where sexe='M'");
  echo "<h2>LISTE DES ETUDIANTS</h2>";
}

elseif(isset($_POST['sexe']) and $_POST['sexe']=="Fem")
{
  $affichage=$connexion->query("select * from etudiant where sexe='F' ");
  echo "<h2>LISTE DES ETUDIANTS</h2>";
}
elseif (isset($_GET['test']) and $_GET['test']=3) {
    # code...
  $affichage=$connexion->query("select * from etudiant order by serie");
  echo "<h2>LISTE DES ETUDIANTS</h2>";
}
elseif (isset($_POST['serie'])) {
    # code...
  $affichage=$connexion->prepare("select * from etudiant where serie=?");
  $affichage->execute(array($_POST['serie']));
  echo "<h2>LISTE DES ETUDIANTS</h2>";
}

 ?>
 <table class="table table-striped" >
     <tr>
       <thead>
         <th>Nom</th>
         <th>Prénom</th>
         <th>Date de naissance</th>
         <th>Sexe</th>
         <th>Année opt. BAC</th>
         <th>Série</th>
         <th>Nationalité</th>
         <th>Diplôme</th>
     </tr>
     </thead>
     <tbody>
<?php
  while($data=$affichage->fetch())
  {
      $lien=$data['diplome'];
?>
      <tr>
          <td><?php echo $data['nom']; ?></td>
          <td><?php echo $data['prenom']; ?></td>
          <td><?php echo $data['date_naiss']; ?></td>
          <td><?php echo $data['sexe']; ?></td>
          <td><?php echo $data['an_obt_bac']; ?></td>
          <td><?php echo $data['serie']; ?></td>
          <td><?php echo $data['nationalite']; ?></td>
          <td><a href='projet/<?php echo $lien; ?>' class="btn btn-primary" target="blank" >Visualiser</a><br/>
                <a href='projet/<?php echo $lien; ?>' class="btn btn-primary" target="blank" download>télécharger</a>
        </td>
        </tr> 
<?php 
  }
?>

</tbody>
</table>

</div>
</section>
<?php 
}
 require_once '../layout/footerAdmin.php'
?>