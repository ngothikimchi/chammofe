<center>
<div class="background_image">
<br/><br/>

<div class="titre_h1">Gestion des demandes</div>

<br/>
    <?php 
    $ledemande = null;
    if(isset($_GET['action']) && isset($_GET['iddem']))
    {
        $action = $_GET['action'];
        $iddemande = $_GET ['iddem'];
        switch ($action)
        {
            case 'sup':
                //suppresion de la prof par idprof
                deletedemande ($iddemande);
            break;
            case 'edit':                
                $ledemande = selectWheredemande($iddemande);
            break;
            case 'valider':                
                validerdemande($iddemande);
            break;
            case 'refuser':                
                refuserdemande($iddemande);
            break;
        }
    }
    ?> 


<div class="titre_h1">Ajout d'une nouvelle demande</div> <br/>
<form method="post" action="">
<label for="datedem">Date_demande :</label>
    <input id="datedem" type="text" name="datedem" value="<?php if ($ledemande != null) 
    echo $l_enseigne['datedem']; ?>"> 

<label for="qtedem">Quantité_demande :</label>
    <input id="qtedem" type="text" name="qtedem" value="<?php if ($ledemande != null) 
    echo $l_enseigne['qtedem']; ?>"> 

<label for="idassoc">Association :</label>
<select name="idassoc">
            <?php
                $les_associations= selectAllassociation();
                foreach ( $les_associations as $uneassoc)
                {
                    echo"<option value ='".$uneassoc['idassoc']."'> ".$uneassoc['nomassoc']."</option>";
                }
            ?>
</select>

<label for="idoffre">Offre :</label>
<select name="idoffre">
<?php
         $les_offres= selectAlloffre();
         foreach ( $les_offres as $uneoffre)
         {
              echo"<option value ='".$uneoffre['idoffre']."'> ".$uneoffre['idoffre']." - ".$uneoffre['objetoffre']."</option>";
         }
?>
</select>  
<div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($ledemande  != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
    </div>

    <?php
    if($ledemande != null) echo '<input type="hidden" name="iddem"
        value="'.$ledemande['iddem'].'">';
    ?>
    

</form>




<?php
    if (isset($_POST['Valider']))
    {
        insertdemande ($_POST);
        echo "Insertion réussie de nouvelle demande!";
    }

    if (isset($_POST['Modifier']))
    {
        updatedemande ($_POST);
        header("Location: index.php?page=5"); //recharger la page
    }
?>
<br/>

<div class="titre_h1">Liste des demandes</div>
<br/>

<form method="post" action="">
    <label for="mot">Recherche par:</label>
    <input id="mot" type="text" name="mot">
    <div class="form-buttons">
        <input class="bouton" type="submit" name="Filtrer" value="Filtrer">
    </div>
</form>

<?php
if(isset($_POST['Filtrer']))
{
    $mot = $_POST['mot'];
    $resultats = selectAlldemande($mot);
}
else 
{
    $resultats = selectAllDemande();
}


?>
<br/>
<table class="styled-table" border="1">
<thead>
    <tr>
        <td >ID_demande</td>
        <td >Date_demande</td>
        <td >Quantité demande</td>
        <td >Association</td>
        <td >Id_offre</td>
        <td >Objet d'offre</td>
        <td >Quantité d'offre restante</td>
        <td >Opération</td>
        <td >Statut</td>
    </tr>
    </thead>
    <tbody>
    <?php
   
    foreach ($resultats as $unedemande)
    {
        $buttons = "";
        $quant_offre_restant = "";

        if($unedemande['statut'] == "en cours")
        {
            $buttons = "<a href='index.php?page=5&action=sup&iddem=".$unedemande['iddem']."'>
                            <img src ='images/sup.png' height='20' width='20'>
                        </a>
                        <a href='index.php?page=5&action=edit&iddem=".$unedemande['iddem']."'>
                            <img src ='images/edit.png' height='20' width='20'>
                        </a>
                        <a href='index.php?page=5&action=valider&iddem=".$unedemande['iddem']."'>
                            <img src ='images/valider.jpg' height='20' width='20'>
                        </a>
                        <a href='index.php?page=5&action=refuser&iddem=".$unedemande['iddem']."'>
                            <img src ='images/refuser.png' height='20' width='20'>
                        </a>";
            $quant_offre_restant = $unedemande['qteoffre'];
        }
            

        echo "<tr> <td>".$unedemande['iddem']."</td>
            <td>".$unedemande['datedem']."</td>
            <td>".$unedemande['qtedem']."</td>
            <td>".$unedemande['nomassoc']."</td>
            <td>".$unedemande['idoffre']."</td>
            <td>".$unedemande['objetoffre']."</td>
            <td>".$quant_offre_restant."</td>
            <td>
                ".$buttons."
            </td>
            <td>
                ".$unedemande['statut']."
            </td>
         </tr>";
    }
    ?>
 </tbody>
</table>
</div>

</center>
