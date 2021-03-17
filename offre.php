<center>
<div class="background_image">
<br/><br/>

<div class="titre_h1">Gestion des offres</div>

<br/>
    <?php 
    $offre = null;
    if(isset($_GET['action']) && isset($_GET['idoffre']))
    {
        $action = $_GET['action'];
        $idoffre = $_GET ['idoffre'];
        switch ($action)
        {
            case 'sup':
                //suppresion de l'offre par idoffre
                deleteoffre ($idoffre);
                echo "L'offre a été supprimé";
            break;
            case 'edit':
                //recuperation de l'offre à modifier par idoffre
                $offre = selectWhereoffre($idoffre);
            break;
        }
    }
    ?>

    

<div class="titre_h1">Ajout un nouvell offre</div> <br/>

<form method="post" action="">
    

    <label for="objetoffre">Objet_offre :</label>
    <input id="objetoffre" type="text" name="objetoffre" value="<?php if ($offre != null) 
    echo $offre['objetoffre']; ?>">

<label for="qteoffre">Quantité_offre :</label>
    <input id="qteoffre" type="text" name="qteoffre" value="<?php if ($offre != null) 
    echo $offre['qteoffre']; ?>">

<label for="dateoffre">Date_offre :</label>
    <input id="dateoffre" type="text" name="dateoffre" value="<?php if ($offre != null) 
    echo $offre['dateoffre']; ?>">

<label for="datefinoffre">Date fin offre :</label>
    <input id="datefinoffre" type="text" name="datefinoffre" value="<?php if ($offre != null) 
    echo $offre['datefinoffre']; ?>">

<label for="numSIRET">Numsiret :</label>
<select name="numSIRET">
        <?php
             $les_enseignes= selectAllenseigne();
             foreach ( $les_enseignes as $unenseigne)
            {
                echo"<option value ='".$unenseigne['numSIRET']."'> ".$unenseigne['nomens']."</option>";
            }
        ?>
</select>

<label for="codeprod">Code_produit :</label>
<select name="codeprod">
        <?php
              $les_produits= selectAllproduit();
              foreach ($les_produits as $unpropduit)
              {
                  echo"<option value ='".$unpropduit['codeprod']."'> ".$unpropduit['nomprod']."</option>";
              }
        ?>
</select>
<div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($offre  != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
    </div>

    <?php
    if($offre != null) echo '<input type="hidden" name="idoffre"
        value="'.$offre['idoffre'].'">';
    ?>


</form>






<?php
    if (isset($_POST['Valider']))
    {
        insertoffre ($_POST);
        echo "Insertion réussie de nouveaux offres!";
    }

    if (isset($_POST['Modifier']))
    {
        updateoffre ($_POST);
        header("Location: index.php?page=4"); //recharger la page
    }
?>

<br/>
<br/>

<div class="titre_h1">Liste des offres </div>
<br/>

<form method="post" action="">
    <label for="mot">Recherche par:</label>
    <input id="mot" type="text" name="mot">
    <div class="form-buttons">
        <input class="bouton" type="submit" name="Filtrer" value="Filtrer">
    </div>
</form>
<br/>
<?php
if(isset($_POST['Filtrer']))
{
    $mot = $_POST['mot'];
    $resultats = selectAlloffre($mot);
}
else 
{
    $resultats = selectAlloffre();
}

?>
<table class="styled-table" border="1">
<thead>
    <tr>
        <td >Id_offre</td>
        <td >Objet_offre</td>
        <td >Quantité</td>
        <td >Date_offre</td>
        <td >Date fin offre</td>
        <td >Num siret</td>
        <td >Code produit</td>
        <td >Operation</td>
        
    </tr>
</thead>
<tbody>
    <?php
   
    foreach ($resultats as $uneoffre)
    {
        echo "<tr> <td>".$uneoffre['idoffre']."</td>
             <td>".$uneoffre['objetoffre']."</td>
            <td>".$uneoffre['qteoffre']."</td>
            <td>".$uneoffre['dateoffre']."</td>
            <td>".$uneoffre['datefinoffre']."</td>
            <td>".$uneoffre['numSIRET']."</td>
            <td>".$uneoffre['codeprod']."</td>
            
             <td>
            <a href='index.php?page=4&action=sup&idoffre=".$uneoffre['idoffre']."'>
             <img src ='images/sup.png' height='30' width='30'></a>

             <a href='index.php?page=4&action=edit&idoffre=".$uneoffre['idoffre']."'>
             <img src ='images/edit.png' height='30' width='30'></a>
            </td>
         </tr>";
    }
    ?>
</tbody>
</table>


</div>

</center>
