<center>
<div class="background_image">
<br/><br/>
<div class="titre_h1">Gestion des rendez-vous</div>
<br/>
    <?php 
    $le_rdv = null;
    if(isset($_GET['action']) && isset($_GET['idrdv']))
    {
        $action = $_GET['action'];
        $id_rdv = $_GET ['idrdv'];
        switch ($action)
        {
            case 'sup':
                //suppresion de l'enseigne par id_enseigne(numsiret)
                {
                    deleterdv ($id_rdv);
                }
            break;
            case 'edit':
                //recuperation de l'enseigne  à modifier par id_enseigne(numsiret)
                $le_rdv = selectwhererdv($id_rdv);
            break;
        }
    }
    ?>



<div class="titre_h1">Ajout d'une nouveau rdv</div> <br/>

<form method="post" action="">
<label for="daterdv">date du rdv :</label>
    <input id="daterdv" type="text" name="daterdv" value="<?php if ($le_rdv != null) 
    echo $le_rdv ['daterdv']; ?>"> 

<label for="daterdv">adresse :</label>
    <input id="adresserdv" type="text" name="adresserdv" value="<?php if ($le_rdv != null) 
    echo $le_rdv ['adresserdv']; ?>"> 

<label for="cprdv">code postal :</label>
    <input id="cprdv" type="text" name="cprdv" value="<?php if ($le_rdv != null) 
    echo $le_rdv ['cprdv']; ?>"> 

<label for="villerdv">ville :</label>
    <input id="villerdv" type="text" name="villerdv" value="<?php if ($le_rdv != null) 
    echo $le_rdv ['villerdv']; ?>">

<label for="iddem">demande :</label>
<select name="iddem">
    <?php
        $ledemande= selectALLdemande2();
        foreach ( $ledemande as $une_demande)
        {
            echo"<option value ='".$une_demande['iddem']."'> ".$une_demande['iddem']."</option>";
        }
    ?>
</select>

<div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($le_rdv  != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
    </div>

    <?php
    if($le_rdv != null) echo '<input type="hidden" name="idrdv"
        value="'.$le_rdv['idrdv'].'">';
    ?>




</form>

<?php
    if (isset($_POST['Valider']))
    {
        insertrdv ($_POST);
        echo "Insertion réussie du nouveau rendez-vous!";
    }

    if (isset($_POST['Modifier']))
    {
        updaterdv ($_POST);
        header("Location: index.php?page=7"); //recharger la page
    }
?>

<br/>
<div class="titre_h1">Liste des rendez-vous</div>
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
    $resultats = selectallrdv($mot);
}
else 
{
    $resultats = selectallrdv();
}

?>
<table class="styled-table" border="1">
    <thead>
    <tr>
        <td >idrdv</td>
        <td >date</td>
        <td >adresse</td>
        <td >code postal</td>
        <td >ville</td>
        <td >iddem</td>
        <td >association</td>
        <td >enseigne</td>
        <td >Opération</td>
    </tr>
    </thead>
    <tbody>
    <?php
   
    foreach ($resultats as $unrdv)
    {
        echo "<tr> <td>".$unrdv['idrdv']."</td>
             <td>".$unrdv['daterdv']."</td>
            <td>".$unrdv['adresserdv']."</td>
            <td>".$unrdv['cprdv']."</td>
            <td>".$unrdv['villerdv']."</td>
            <td>".$unrdv['iddem']."</td>
            <td>".$unrdv['nomassoc']."</td>
            <td>".$unrdv['nomens']."</td>
             <td>

            <a href='index.php?page=7&action=sup&idrdv=".$unrdv['idrdv']."'>
             <img src ='images/sup.png' height='30' width='30'></a>

             <a href='index.php?page=7&action=edit&idrdv=".$unrdv['idrdv']."'>
             <img src ='images/edit.png' height='30' width='30'></a>
            </td>
         </tr>";
    }
    ?>
    </tbody>

</table>
</div>

</center>
