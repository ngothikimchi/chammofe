<center>
<div class="background_image">
<br/><br/>
<div class="titre_h1">Gestion des associations</div>
<br/>
    <?php 
    $l_assoc = null;
    if(isset($_GET['action']) && isset($_GET['idassoc']))
    {
        $action = $_GET['action'];
        $id_assoc = $_GET ['idassoc'];
        switch ($action)
        {
            case 'sup':
                //suppresion de l'enseigne par id_enseigne(numsiret)
                 deleteassociation ($id_assoc);                
            break;
            case 'edit':
                //recuperation de l'enseigne  à modifier par id_enseigne(numsiret)
                $l_assoc = selectWhereassociation($id_assoc);
            break;
        }
    }
    ?>



<div class="titre_h1">Ajout d'une nouvelle association</div> <br/>

<form method="post" action="">

<label for="numSIREN">Numéro de Siren :</label>
    <input id="numSIREN" type="text" name="numSIREN" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['numSIREN']; ?>">

<label for="nomassoc">Nom de l'association :</label>
    <input id="nomassoc" type="text" name="nomassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['nomassoc']; ?>">

<label for="objetassoc">Object de l'association :</label>
    <input id="objetassoc" type="text" name="objetassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['objetassoc']; ?>">

<label for="rpzassoc">répresentant :</label>
    <input id="rpzassoc" type="text" name="rpzassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['rpzassoc']; ?>">

<label for="telassoc">Téléphone :</label>
    <input id="telassoc" type="text" name="telassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['telassoc']; ?>">

<label for="emailassoc">Email :</label>
    <input id="emailassoc" type="email" name="emailassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['emailassoc']; ?>">

<label for="adresseassoc">Adresse :</label>
    <input id="adresseassoc" type="text" name="adresseassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['adresseassoc']; ?>">

<label for="cpassoc">Code postal :</label>
    <input id="cpassoc" type="text" name="cpassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['cpassoc']; ?>">

<label for="villeassoc">Ville :</label>
    <input id="villeassoc" type="text" name="villeassoc" value="<?php if ($l_assoc != null) 
    echo $l_enseigne['villeassoc']; ?>">

<div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($l_assoc  != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
    </div>

    <?php
    if($l_assoc != null) echo '<input type="hidden" name="idassoc"
        value="'.$l_assoc['idassoc'].'">';
    ?>

</form>



<?php
    if (isset($_POST['Valider']))
    {
        insertassociation ($_POST);
        echo "Insertion réussie de la nouvelle association!";
    }

    if (isset($_POST['Modifier']))
    {
        updateassociation ($_POST);
        header("Location: index.php?page=3"); //recharger la page
    }
?>

<br/>
<div class="titre_h1">Liste des associations</div>
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
    $resultats = selectAllassociation($mot);
}
else 
{
    $resultats = selectAllassociation();
}

?>
<table class="styled-table" border="1">
    <thead>
    <tr>
        <td >ID_association</td>
        <td >Numero de siren</td>
        <td >Nom</td>
        <td >Objet</td>
        <td >RPZ</td>
        <td >Télé</td>
        <td >Email</td>
        <td >Siège_social</td>
        <td >Adresse</td>
        <td >Code_postal</td>
        <td >Ville</td>
        <td >Operation</td>
    </tr>   
    </thead>
   <tbody>
   <?php
   
   foreach ($resultats as $uneassoc)
   {
       echo "<tr> <td>".$uneassoc['idassoc']."</td>
           <td>".$uneassoc['numSIREN']."</td>
           <td>".$uneassoc['nomassoc']."</td>
           <td>".$uneassoc['objetassoc']."</td>
           <td>".$uneassoc['rpzassoc']."</td>
           <td>".$uneassoc['telassoc']."</td>
           <td>".$uneassoc['emailassoc']."</td>
           <td>".$uneassoc['siegesocialassoc']."</td>
           <td>".$uneassoc['adresseassoc']."</td>
           <td>".$uneassoc['cpassoc']."</td>
           <td>".$uneassoc['villeassoc']."</td>
            <td>
           <a href='index.php?page=3&action=sup&idassoc=".$uneassoc['idassoc']."'>
            <img src ='images/sup.png' height='30' width='30'></a>

            <a href='index.php?page=3&action=edit&idassoc=".$uneassoc['idassoc']."'>
            <img src ='images/edit.png' height='30' width='30'></a>
           </td>
        </tr>";
   }
   ?>

   </tbody>
    

</table>

  
</div>
  
</center>
