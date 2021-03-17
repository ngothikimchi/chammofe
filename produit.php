<!-- CATEGORIE -->
<center>
<div class="background_image">
<br/><br/>
<div class="titre_h1">Gestion des produits</div>
<br/>
    <?php 
    $lacategorie = null;
    if(isset($_GET['action']) && isset($_GET['idcat']))
    {
        $action = $_GET['action'];
        $id_cat = $_GET ['idcat'];
        switch ($action)
        {
            case 'sup':
                //suppresion de categorie par id_cat(idcat)
                {
                    deletecategorie ($id_cat);
                }
            break;
            case 'edit':
                //recuperation de categorie  à modifier par id_cat(idcat)
                $lacategorie = selectWherecategorie($id_cat);
            break;
        }
    }
    ?>



<div class="titre_h1">Ajout d'une nouvelle categorie</div> <br/>

<form method="post" action="">
<label for="nomcat">Nom de categorie :</label>
    <input id="nomcat" type="text" name="nomcat" value="<?php if ($lacategorie != null) 
    echo $lacategorie['nomcat']; ?>">

<label for="souscat">Sous-nom de categorie :</label>
    <input id="souscat" type="text" name="souscat" value="<?php if ($lacategorie != null) 
    echo $lacategorie['souscat']; ?>">

<div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($lacategorie  != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
</div>
<?php
    if($lacategorie != null) echo '<input type="hidden" name="idcat"
        value="'.$lacategorie['idcat'].'">';
    ?>
</form>




<?php
    // Mettre bon nom pour categorie et produit, c'est different, si on met ensemble dans la page, il y a confi
    if (isset($_POST['valider_cat']))
    {
        insertcategorie ($_POST);
        echo "Insertion réussie de la nouvelle categorie!";
    }

    if (isset($_POST['modifier_cat']))
    {
        updatecategorie ($_POST);
        header("Location: index.php?page=6"); //recharger la page
    }
?>

<br/>
<div class="titre_h1">Liste des categories</div>
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
    $resultats = selectAllcategorie($mot);
}
else 
{
    $resultats = selectAllcategorie();
}

?>
<table class="styled-table" border="1">
    <thead>
    <tr>
        <td >ID_categorie</td>
        <td >Nom de categorie</td>
        <td >Sous_nom de categorie</td>   
        <td >Opération</td>    
    </tr>
    </thead>
    <tbody>
    <?php
   
    foreach ($resultats as $unecategorie)
    {
        echo "<tr> <td>".$unecategorie['idcat']."</td>
             <td>".$unecategorie['nomcat']."</td>
            <td>".$unecategorie['souscat']."</td>
            
             <td>
            <a href='index.php?page=6&action=sup&idcat=".$unecategorie['idcat']."'>
             <img src ='images/sup.png' height='30' width='30'></a>

             <a href='index.php?page=6&action=edit&idcat=".$unecategorie['idcat']."'>
             <img src ='images/edit.png' height='30' width='30'></a>
            </td>
         </tr>";
    }
    ?>

</table>

<!-- PRODUITS -->
<?php 
    $leproduit = null;
    if(isset($_GET['action']) && isset($_GET['codeprod']))
    {
        $action = $_GET['action'];
        $code_produit = $_GET ['codeprod'];
        switch ($action)
        {
            case 'sup':
                //suppresion de produit par codeprod
                {
                    deleteproduit ($code_produit);
                }
            break;
            case 'edit':
                //recuperation de produit  à modifier par code_produit
                $leproduit = selectWhereproduit($code_produit);
            break;
        }
    }
    ?>


    </tbody>
    
    

<h3>Ajout d'une nouveau produit</h3> <br/>

<form method="post" action="">
<label for="codeprod">Code_produit :</label>
    <input id="codeprod" type="text" name="codeprod" value="<?php if ($leproduit != null) 
    echo $leproduit['codeprod']; ?>">  

<label for="nomprod">Nom de produit :</label>
    <input id="nomprod" type="text" name="nomprod" value="<?php if ($leproduit != null) 
    echo $leproduit['nomprod']; ?>">  

<label for="marque">Le marque :</label>
    <input id="marque" type="text" name="marque" value="<?php if ($leproduit != null) 
    echo $leproduit['marque']; ?>">  

<label for="idcat">Categorie :</label>
<select name="idcat">
    <?php
        $les_categories= selectAllcategorie();
        foreach ( $les_categories as $unecategorie)
         {
             echo"<option value ='".$unecategorie['idcat']."'> ".$unecategorie['nomcat']."</option>";
        }
    ?>
</select> 

<div class="form-buttons">
        <input class="bouton"  type="reset" name="Annuler" value="Annuler">
        <input class="bouton" type="submit"
            <?php
            if ($leproduit  != null) echo ' name="Modifier" value="Modifier"';
            else echo ' name="Valider" value="Valider"';
            ?>
        >
    </div>

    <?php
    if($leproduit != null) echo '<input type="hidden" name="codeprod"
        value="'.$leproduit['codeprod'].'">';
    ?>


</form>



<?php
    if (isset($_POST['valider_prod']))
    {
        insertproduit ($_POST);
        echo "Insertion réussie de nouveau produit!";
    }

    if (isset($_POST['modifier_prod']))
    {
        updateproduit ($_POST);
        header("Location: index.php?page=6"); //recharger la page
    }
?>

<br/>
<div class="titre_h1">Liste des produits</div>
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
    $resultats = selectAllproduit($mot);
}
else 
{
    $resultats = selectAllproduit();
}

?>
<table class="styled-table" border="1">
    <thead>
    <tr>
        <td >Code_produit</td>
        <td >Nom de produits</td>
        <td >Marque</td>
        <td >Id_categorie</td>
        <td >Opération</td>    
    </tr>
    </thead>
    <tbody>
    <?php
   
   foreach ($resultats as $unpropduit)
   {
       echo "<tr> <td>".$unpropduit['codeprod']."</td>
            <td>".$unpropduit['nomprod']."</td>
            <td>".$unpropduit['marque']."</td>
           <td>".$unpropduit['idcat']."</td>
           
            <td>
           <a href='index.php?page=6&action=sup&codeprod=".$unpropduit['codeprod']."'>
            <img src ='images/sup.png' height='30' width='30'></a>

            <a href='index.php?page=6&action=edit&codeprod=".$unpropduit['codeprod']."'>
            <img src ='images/edit.png' height='30' width='30'></a>
           </td>
        </tr>";
   }
   ?>

    </tbody>
    
    
</table>
</div>

</center>
