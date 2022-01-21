<?php 
  require_once 'utils.php';
  echo is_logged();
  //if (!is_logged()) {
  //  header('location:/projetweb');
  //}
  require_once '../layout/headerAdmin.php';
?>
<div class="mybutton">
    <a href="projet/tri.php?test=2" class='btn btn-primary'>Tri par sexe</a>
    <a href="projet/tri.php?test=3" class='btn btn-primary'>Tri par série</a>
</div>

<section class="inscrits">
<div class="container">
<?php
require_once "baseDonnee.php";
if (isset($_GET['test'])) {
    # code...

if ($_GET['test']==1)
{
  $affichage=$connexion->query("select * from etudiant ");
  echo "<h2>LISTE DES ETUDIANTS</h2>";
}

elseif($_GET['test']==2)
{
  $affichage=$connexion->query("select * from etudiant order by sexe ");
  echo "<h2>LISTE DES ETUDIANTS PAR SEXE</h2>";
}
elseif ($_GET['text']=3) {
    # code...
  $affichage=$connexion->query("select * from etudiant order by serie");
  echo "<h2>LISTE DES ETUDIANTS PAR SERIE</h2>";
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