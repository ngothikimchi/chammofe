<center>
<div class="background_image">
<br/><br/>
<div class="titre_h1">Gestion des enseignes</div>
<br/>
    <?php 
    $l_enseigne = null;
    if(isset($_GET['action']) && isset($_GET['numSIRET']))
    {
        $action = $_GET['action'];
        $id_enseigne = $_GET ['numSIRET'];
        switch ($action)
        {
            case 'sup':
                //suppresion de l'enseigne par id_enseigne(numsiret)
                {
                    deleteEnseigne ($id_enseigne);
                }
            break;
            case 'edit':
                //recuperation de l'enseigne  à modifier par id_enseigne(numsiret)
                $l_enseigne = selectWhereEnseigne($id_enseigne);
            break;
        }
    }
    ?>



<div class="titre_h1">Ajout d'une nouvelle enseigne</div> <br/>

<form method="post" action="">
    <label for="numSIRET">Numéro siret :</label>
    <input id="numSIRET" type="text" name="numSIRET" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['numSIRET']; ?>">
    
    <label for="nomens">Nom de l'enseigne :</label>
    <input id="nomens" type="text" name="nomens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['nomens']; ?>">

    <label for="statutens">Statut de l'enseigne :</label>
    <input id="statutens" type="text" name="statutens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['statutens']; ?>">

    <label for="typeens">Type de l'enseigne :</label>
    <input id="typeens" type="text" name="typeens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['typeens']; ?>">

    <label for="directeur">Directeur :</label>
    <input id="directeur" type="text" name="directeur" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['directeur']; ?>">

    <label for="siegesocialens">Siège_social :</label>
    <input id="siegesocialens" type="text" name="siegesocialens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['siegesocialens']; ?>">

    <label for="adresseens">Adresse de l'enseigne :</label>
    <input id="adresseens" type="text" name="adresseens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['adresseens']; ?>">

    <label for="villeens">Ville de l'enseigne :</label>
    <input id="villeens" type="text" name="villeens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['villeens']; ?>">

    <label for="cpens">Code_Postal :</label>
    <input id="cpens" type="text" name="cpens" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['cpens']; ?>">

    <label for="responsable">Responsable :</label>
    <input id="responsable" type="text" name="responsable" value="<?php if ($l_enseigne != null) 
    echo $l_enseigne['responsable']; ?>">

    <div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($l_enseigne != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
    </div>

    
    <?php
    if($l_enseigne != null) echo '<input type="hidden" name="numSIRET"
        value="'.$l_enseigne['numSIRET'].'">';
    ?>
</form>



<?php
    if (isset($_POST['Valider']))
    {
        insertenseigne ($_POST);
        echo "Insertion réussie de la nouvelle enseigne!";
    }

    if (isset($_POST['Modifier']))
    {
        updateenseigne ($_POST);
        header("Location: index.php?page=2"); //recharger la page
    }
?>

<br/>
<div class="titre_h1">Liste des enseignes</div>
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
    $resultats = selectAllenseigne($mot);
}
else 
{
    $resultats = selectAllenseigne();
}

?>
<table class="styled-table" border="1">
    <thead>
    <tr>
        <td >Numero_siret</td>
        <td >Nom de l'enseigne</td>
        <td >Statut</td>
        <td >Type</td>
        <td >Directeur</td>
        <td >Siège_social</td>
        <td >Adresse</td>
        <td >Ville</td>
        <td >Code_postal</td>
        <td >Responsable</td>
        <td >Opération</td>
    </tr>

    </thead>
    <tbody>
    <?php
   
   foreach ($resultats as $unenseigne)
   {
       echo "<tr> <td>".$unenseigne['numSIRET']."</td>
            <td>".$unenseigne['nomens']."</td>
           <td>".$unenseigne['statutens']."</td>
           <td>".$unenseigne['typeens']."</td>
           <td>".$unenseigne['directeur']."</td>
           <td>".$unenseigne['siegesocialens']."</td>
           <td>".$unenseigne['adresseens']."</td>
           <td>".$unenseigne['villeens']."</td>
           <td>".$unenseigne['cpens']."</td>
           <td>".$unenseigne['responsable']."</td>
            <td>
           <a href='index.php?page=2&action=sup&numSIRET=".$unenseigne['numSIRET']."'>
            <img src ='images/sup.png' height='30' width='30'></a>

            <a href='index.php?page=2&action=edit&numSIRET=".$unenseigne['numSIRET']."'>
            <img src ='images/edit.png' height='30' width='30'></a>
           </td>
        </tr>";
   }
   ?>


    </tbody>
    
   
</table>


</div>

</center>
