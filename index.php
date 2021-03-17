<?php
require_once("fonction.php");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Gestion antigaspillage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styleChAmMoFe.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    
    
</head>
<body>    
<div class="conteneurHeader">
        <div class="logo"><img class="logoimage" src="logo_ChAmMoFe_2.png"> </div>
        <div class="Titre">ChAmMoFe <br>
            <span class="Slogan">La Banque Alimentaire  pour tous</span>
        </div>        
</div>

<div class="menu_navigation">
<a href="index.php?page=1" class="btn">Home</a>
    <a href="index.php?page=2" class="btn">Enseigne</a>
    <a href="index.php?page=3" class="btn">Association</a>
    <a href="index.php?page=4" class="btn">Offre</a>
    <a href="index.php?page=5" class="btn">Demande</a>
    <a href="index.php?page=6" class="btn">Produit</a>
    <a href="index.php?page=7" class="btn">Livraison</a>
    <a href="index.php?page=8" class="btn">Charte</a>
</div>

   <?php
        if (isset($_GET['page'])){
            $page = $_GET ['page'];
        }
        else 
        {
            $page =0;
        }
        switch ($page)
        {
            case 1: require_once ("home.php"); break;
            case 2: require_once ("enseigne.php"); break;
            case 3: require_once ("association.php"); break;
            case 4: require_once ("offre.php"); break;
            case 5: require_once ("demande.php"); break;
            case 6: require_once ("produit.php"); break;
            case 7: require_once ("livraison.php"); break;
            case 8: require_once ("charte.php"); break;
            case 9: require_once ("Mentions.php"); break;
        }

    ?>


<footer>
<div class='footer'> 
     <div class="foot"><div class="Position-Left"> <a class="non_under" href="index.php?page=9">Mentions légales </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="non_under" href="index.php?page=8"> Charte </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="non_under" href="mailto:chammofe@gmail.com">Contactez-nous </a></div></div>
    
     <div class="foot"> <div class="Position-Right">Copyright 2021 ChAmMoFe | Tous droits réservés</div></div>
 </div>
</footer>

</body> 
</html>