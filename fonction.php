<?php
    //connexion à la base de données : extraction et injection des données
    function connexion ()
    {
        //$connect = mysqli_connect("localhost:8889","root","root","ecole_iris_A"); //les mac
        $connect = mysqli_connect("localhost","root","","antigaspi"); //les PC    

        if (!$connect)        
            echo"Erreur de connexion à la base de données";
        
        return $connect;
    }

    function deconnexion ($connect)
    {
        mysqli_close ($connect);
    }

    function insertenseigne ($tab)
    {
        // Exemple de requête : "insert into enseigne values (null, 'CHI', '303', 'BTS');" ;
        $requete = "insert into enseigne 
        
        values ('".$tab['numSIRET']."', '".$tab['nomens']."','".$tab['statutens']."','".$tab['typeens']."','".$tab['directeur']."',
        '".$tab['siegesocialens']."','".$tab['adresseens']."','".$tab['villeens']."','".$tab['cpens']."','".$tab['responsable']."' ) ; ";       

        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    //
    function selectAllenseigne ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select * from enseigne;";
        }
        else 
        {
            $requete = "select * 
                        from enseigne 
                        where numSIRET like '%".$mot."%'
                        or nomens like '%".$mot."%'
                            or statutens like '%".$mot."%' 
                            or typeens like '%".$mot."%'
                            or directeur like '%".$mot."%' 
                            or siegesocialens like '%".$mot."%'
                            or adresseens like '%".$mot."%'
                            or villeens like '%".$mot."%'
                            or cpens like '%".$mot."%'
                            or responsable like '%".$mot."%' ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);
        //retourner les resultats (Array)
        // ex de résultat
        // columnKey : idclasse ,	nom,	        salle,	diplome
        // r1 :                1, 	bts sio A 1,	1.6,    BTS
        // r2 :                 6, 	bachelor web,	1.5,    Bachelor
        // Get value : $ligne["idclasse"], $ligne["nom"], $ligne["salle"],$ligne["diplome"]

        return $tab;
    }

    function deleteenseigne ($id_enseigne)
    {
        $requete ="delete from enseigne where numSIRET ='".$id_enseigne."';";
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function updateenseigne ($tab)
    {
        $requete = "update enseigne set numSIRET ='".$tab['numSIRET']."',nomens ='".$tab['nomens']."', statutens ='".$tab['statutens']."',
        typeens ='".$tab['typeens']."',directeur ='".$tab['directeur']."',siegesocialens ='".$tab['siegesocialens']."',villeens ='".$tab['villeens']."',cpens ='".$tab['cpens']."',responsable ='".$tab['responsable']."' where numSIRET = ".$tab['numSIRET'].";" ;
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function selectWhereenseigne ($id_enseigne)
        {

            //recupere une seule classe identifié par idclasse.
            $requete ="select * from enseigne where numSIRET ='".$id_enseigne."';";
            $connect = connexion();
            //on recuperer les resultats de la requete:
            $resultats = mysqli_query($connect, $requete);

            //extraction des données
            $ligne = mysqli_fetch_assoc($resultats);

            deconnexion ($connect);
            
            //retourner les resultats
            return $ligne;
        }

// PARTIE ASSOCIATIONS
function insertassociation ($tab)
    {
        // Exemple de requête : "insert into enseigne values (null, 'CHI', '303', 'BTS');" ;
        $requete = "insert into association 
        
        values (null,
         '".$tab['numSIREN']."',
         '".$tab['nomassoc']."',
         '".$tab['objetassoc']."',
         '".$tab['rpzassoc']."',
        '".$tab['telassoc']."',
        '".$tab['emailassoc']."',
        '".$tab['siegesocialassoc']."',
        '".$tab['adresseassoc']."',
        '".$tab['cpassoc']."',
        '".$tab['villeassoc']."' ) ; ";       

        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    //
    function selectAllassociation ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select * from association;";
        }
        else 
        {
            $requete = "select * 
                        from association 
                        where idassoc like '%".$mot."%'
                        or numSIREN like '%".$mot."%'
                            or nomassoc like '%".$mot."%' 
                            or objetassoc like '%".$mot."%'
                            or rpzassoc like '%".$mot."%' 
                            or telassoc like '%".$mot."%'
                            or emailassoc like '%".$mot."%'
                            or siegesocialassoc like '%".$mot."%'
                            or adresseassoc like '%".$mot."%'
                            or cpassoc like '%".$mot."%'
                            or villeassoc like '%".$mot."%' ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);
        

        return $tab;
    }

    function deleteassociation ($id_assoc)
    {
        $requete ="delete from association where idassoc ='".$id_assoc."';";
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function updateassociation ($tab)
    {
        $requete = "update association 
            set idassoc ='".$tab['idassoc']."',
            numSIREN ='".$tab['numSIREN']."', 
            nomassoc ='".$tab['nomassoc']."',
            objetassoc ='".$tab['objetassoc']."',
            rpzassoc ='".$tab['rpzassoc']."',
            telassoc ='".$tab['telassoc']."',
            emailassoc ='".$tab['emailassoc']."',
            siegesocialassoc ='".$tab['siegesocialassoc']."',
            adresseassoc ='".$tab['adresseassoc']."',
            cpassoc ='".$tab['cpassoc']."',
            villeassoc ='".$tab['cpassoc']."' 
        where idassoc = ".$tab['idassoc'].";" ;
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function selectWhereassociation ($id_assoc)
        {

            //recupere une seule classe identifié par idclasse.
            $requete ="select * from association where idassoc =".$id_assoc.";";
            $connect = connexion();
            //on recuperer les resultats de la requete:
            $resultats = mysqli_query($connect, $requete);

            //extraction des données
            $ligne = mysqli_fetch_assoc($resultats);

            deconnexion ($connect);
            
            //retourner les resultats
            return $ligne;
        }


// PARTIE CATEGORIES

function insertcategorie ($tab)
    {
        // Exemple de requête : "insert into categorie values (null, 'CHI', '303', 'BTS');" ;
        $requete = "insert into categorie  
        
        values (null,
         '".$tab['nomcat']."',
         '".$tab['souscat']."' ) ; ";       

        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    //
    function selectAllcategorie ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select * from categorie ;";
        }
        else 
        {
            $requete = "select * from categorie  
                        where idcat like '%".$mot."%'
                        or nomcat like '%".$mot."%'
                        or souscat like '%".$mot."%' 
                        ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);       
        return $tab;
    }

    function deletecategorie ($id_cat)
    {
        
        echo "test cat : ".$id_cat;
        $requete ="delete from categorie where idcat ='".$id_cat."';";
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function updatecategorie ($tab)
    {
        $requete = "update categorie 
            set idcat ='".$tab['idcat']."',
            nomcat ='".$tab['nomcat']."', 
            souscat ='".$tab['souscat']."' 
            where idcat = ".$tab['idcat'].";" ;
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function selectWherecategorie ($id_cate)
        {

            //recupere une seule classe identifié par idclasse.
            $requete ="select * from categorie where idassoc =".$id_cate.";";
            $connect = connexion();
            //on recuperer les resultats de la requete:
            $resultats = mysqli_query($connect, $requete);

            //extraction des données
            $ligne = mysqli_fetch_assoc($resultats);

            deconnexion ($connect);
            
            //retourner les resultats
            return $ligne;
        }


//PRODUITS
function insertproduit ($tab)
    {
        // Exemple de requête : "insert into produit values (..);" ;
        $requete = "insert into produit  
        values ('".$tab['codeprod']."',
        '".$tab['nomprod']."',
         '".$tab['marque']."',
         '".$tab['idcat']."' ) ; ";       

        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    //
    function selectAllproduit ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select * from produit  ;";
        }
        else 
        {
            $requete = "select * from produit   
                        where codeprod like '%".$mot."%'
                        or nomprod like '%".$mot."%'
                        or marque like '%".$mot."%'
                        or idcat like '%".$mot."%' 
                        ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);       
        return $tab;
    }

    function deleteproduit ($id_produit)
    {
        $requete ="delete from produit where codeprod ='".$id_produit."';";
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function updateproduit ($tab)
    {
        $requete = "update produit 
            set codeprod ='".$tab['codeprod']."',
            nomprod ='".$tab['nomprod']."', 
            marque ='".$tab['marque']."' 
            idcat ='".$tab['idcat']."'
            where codeprod = ".$tab['codeprod'].";" ;
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function selectWhereproduit ($id_produit)
        {

            //recupere une seule classe identifié par codproduit.
            $requete ="select * from produit where codeprod =".$id_produit.";";
            $connect = connexion();
            //on recuperer les resultats de la requete:
            $resultats = mysqli_query($connect, $requete);

            //extraction des données
            $ligne = mysqli_fetch_assoc($resultats);

            deconnexion ($connect);
            
            //retourner les resultats
            return $ligne;
        }



   






// PARTIE OFFRES
function insertoffre ($tab)
    {
        $requete = "insert into offre 
        values (null,
         '".$tab['objetoffre']."',
         '".$tab['qteoffre']."',
         '".$tab['dateoffre']."',
         '".$tab['datefinoffre']."',
        '".$tab['numSIRET']."',
        '".$tab['codeprod']."' ) ; ";       

        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    //
    function selectAlloffre ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select * from offre ;";
        }
        else 
        {
            $requete = "select * 
                        from offre 
                        where idoffre like '%".$mot."%'
                        or objetoffre like '%".$mot."%'
                        or qteoffre like '%".$mot."%' 
                        or dateoffre like '%".$mot."%'
                        or datefinoffre like '%".$mot."%' 
                        or numSIRET like '%".$mot."%'
                        or codeprod like '%".$mot."%'
                        ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);
        

        return $tab;
    }

    function deleteoffre ($idoffre)
    {
        $requete ="delete from offre where idoffre ='".$idoffre."';";
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function updateoffre ($tab)
    {
        $requete = "update offre
            set idoffre ='".$tab['idoffre']."',
            objetoffre ='".$tab['objetoffre']."', 
            qteoffre ='".$tab['qteoffre']."',
            dateoffre ='".$tab['dateoffre']."',
            datefinoffre ='".$tab['datefinoffre']."',
            numSIRET ='".$tab['numSIRET']."',
            codeprod ='".$tab['codeprod']."',
            
        where idoffre = ".$tab['idoffre'].";" ;
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function selectWhereoffre ($idoffre)
        {

            //recupere une seule classe identifié par idclasse.
            $requete ="select * from offre where idoffre =".$idoffre.";";
            $connect = connexion();
            //on recuperer les resultats de la requete:
            $resultats = mysqli_query($connect, $requete);

            //extraction des données
            $ligne = mysqli_fetch_assoc($resultats);

            deconnexion ($connect);
            
            //retourner les resultats
            return $ligne;
        }




   

// PARTIE DEMANDE
function insertdemande ($tab)
    {        
        $requete = "insert into demande (datedem, qtedem, idassoc, idoffre, statut)
        values (
         '".$tab['datedem']."',
         '".$tab['qtedem']."',
         '".$tab['idassoc']."',
         '".$tab['idoffre']."',
         'en cours') ; ";       

        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    //
    function selectAlldemande2 ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select d.*, o.objetoffre, o.qteoffre, a.nomassoc  
                        from demande d
                        inner join offre o on d.idoffre = o.idoffre
                        inner join association a on a.idassoc = d.idassoc 
                        where d.statut = 'fini' 
                        ;";
        }
        else 
        {
            $requete = "select d.*, o.objetoffre, o.qteoffre, a.nomassoc  
                        from demande d
                        inner join offre o on d.idoffre = o.idoffre
                        inner join association a on a.idassoc = d.idassoc
                        where (d.iddem like '%".$mot."%'
                        or d.datedem like '%".$mot."%'
                        or d.qtedem like '%".$mot."%' 
                        or d.idassoc like '%".$mot."%'
                        or d.idoffre like '%".$mot."%' 
                        or o.objetoffre like '%".$mot."%' 
                        or a.nomassoc like '%".$mot."%') 
                        and d.statut ='fini'
                        ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);
        

        return $tab;
    }   

        


    function selectAlldemande ($mot ="")
    {
        //
        if($mot =="")
        {
            $requete = "select d.*, o.objetoffre, o.qteoffre, a.nomassoc  
                        from demande d
                        inner join offre o on d.idoffre = o.idoffre
                        inner join association a on a.idassoc = d.idassoc 
                        ;";
        }
        else 
        {
            $requete = "select d.*, o.objetoffre, o.qteoffre, a.nomassoc  
                        from demande d
                        inner join offre o on d.idoffre = o.idoffre
                        inner join association a on a.idassoc = d.idassoc
                        where d.iddem like '%".$mot."%'
                        or d.datedem like '%".$mot."%'
                        or d.qtedem like '%".$mot."%' 
                        or d.idassoc like '%".$mot."%'
                        or d.idoffre like '%".$mot."%' 
                        or o.objetoffre like '%".$mot."%' 
                        or a.nomassoc like '%".$mot."%' 
                        ;" ;
        }

        $connect = connexion ();
        // on recupère les résultats de la requete:
        $resultats = mysqli_query($connect,$requete);
        // extraction des données
        $tab = array ();
        while ($ligne = mysqli_fetch_assoc($resultats))
        //tant qu'il y a des lignes 
        {
            $tab [] = $ligne;
            //insertion dans le tab ligne par ligne (class par classe)
        }
        deconnexion($connect);
        

        return $tab;
    }   

    function deletedemande ($iddemande)
    {
        $requete ="delete from demande where iddem ='".$iddemande."';";
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }
    
    function validerdemande ($iddemande)
    {
        $requete = "
        UPDATE offre 
        INNER join demande ON demande.idoffre = offre.idoffre
        set offre.qteoffre = offre.qteoffre - demande.qtedem 
        WHERE demande.iddem = '".$iddemande."'
        and offre.qteoffre >= demande.qtedem;
        ";
       
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        $updated_rows = mysqli_affected_rows($connect);
        //je me déconnecte
        deconnexion($connect);
        $connect1 = connexion();
        if($updated_rows > 0)
        {
            // mettre à jour le statut de la demande
            $requete_demande = "update demande
            set statut = 'fini'
            where demande.iddem = '".$iddemande."';";
                mysqli_query($connect1,$requete_demande);
                echo "La demande ".$iddemande." est validé !";
        }
        else
            echo "Nous ne pouvons pas valider la demande ".$iddemande." !";
        deconnexion($connect1);
    }

    function refuserdemande ($iddemande)
    {
        // Vérifier la demande 
        $requete = "update demande
        set statut = 'refuse'
        where demande.iddem = '".$iddemande."';";

        $connect = connexion();
        mysqli_query($connect,$requete);
        deconnexion($connect);
    }

    function updatedemande ($tab)
    {
        $requete = "update demande
            set iddem ='".$tab['iddem']."',
            datedem ='".$tab['datedem']."', 
            qtedem ='".$tab['qtedem']."',
            idassoc ='".$tab['idassoc']."',
            idoffre ='".$tab['idoffre']."'      
        where iddem = ".$tab['iddem'].";" ;
        //je me connect à la base de données
        $connect = connexion();
        // j'execute la requete
        mysqli_query($connect, $requete);

        //je me déconnecte
        deconnexion($connect);
    }  

    function selectWheredemande ($iddemande)
        {

            //recupere une seule classe identifié par idclasse.
            $requete ="select * from demande where iddem =".$iddemande.";";
            $connect = connexion();
            //on recuperer les resultats de la requete:
            $resultats = mysqli_query($connect, $requete);

            //extraction des données
            $ligne = mysqli_fetch_assoc($resultats);

            deconnexion ($connect);
            
            //retourner les resultats
            return $ligne;
        }



//-----------------------Rendez-Vous--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
// fonction d'insertion de rdv :

function insertrdv ($tab)
    {

        $requete = "insert into rdv
        values (null,'".$tab['daterdv']."',
                     '".$tab['adresserdv']."',
                     '".$tab['cprdv']."',
                     '".$tab['villerdv']."',
                     '".$tab['iddem']."') ; ";

        $connect = connexion();

        mysqli_query($connect, $requete);

        deconnexion($connect);
    }

function selectallrdv ($mot = "")

{
    if ($mot == ""){
        $requete = "select rdv.*, o.objetoffre, o.qteoffre, a.nomassoc, e.nomens   
        from rdv
        inner join demande d on d.iddem = rdv.iddem 
        inner join offre o on d.idoffre = o.idoffre
        inner join association a on a.idassoc = d.idassoc 
        inner join enseigne e on e.numSIRET= o.numSIRET
        where d.statut = 'fini' ";

} else {
    $requete = "select rdv.*,  o.objetoffre, o.qteoffre, a.nomassoc, e.nomens   
        from rdv
        inner join demande d on d.iddem = rdv.iddem 
        inner join offre o on d.idoffre = o.idoffre
        inner join association a on a.idassoc = d.idassoc 
        inner join enseigne e on e.numSIRET= o.numSIRET
        where d.statut = 'fini' and 
        (rdv.idrdv like '%".$mot."%' 
        or rdv.daterdv like '%".$mot."%'
        or rdv.adresserdv like '%".$mot."%' 
        or rdv.cprdv like '%".$mot."%' 
        or rdv.villerdv like '%".$mot."%'
        or a.nomassoc like '%".$mot."%' 
        or e.nomens like '%".$mot."%'
    
    );";

}

$connect = connexion ();

$resultats = mysqli_query($connect, $requete);

$tab = array ();

while ($ligne = mysqli_fetch_assoc($resultats))
{
$tab [] = $ligne ;
}

deconnexion($connect);

return $tab;

}


//fonction de suppression de rdv :
function deleterdv ($idrdv)
{
$requete = "delete from rdv where idrdv = ".$idrdv.";";

$connect = connexion ();
mysqli_query($connect, $requete);
deconnexion($connect);
}





//fonction de mise à jour des données de rdv
function updaterdv ($tab)
{
$requete = "update rdv set idrdv ='".$tab['idrdv']."',
daterdv ='".$tab['daterdv']."',
adresserdv ='".$tab['adresserdv']."',
cprdv ='".$tab['cprdv']."',
villerdv ='".$tab['villerdv']."' 
where idrdv = ".$tab['idrdv'].";";

$connect = connexion ();
mysqli_query($connect, $requete);
deconnexion($connect);
}


//fonction qui permet de récupérer un rdv identifié par l'idrdv
function selectwhererdv ($idrdv)
{
$requete="select * from rdv where idrdv =" .$idrdv. ";";

$connect = connexion ();
$resultats = mysqli_query($connect, $requete);

$ligne = mysqli_fetch_assoc($resultats);
//on exécute qu'une seule ligne

deconnexion($connect);
return $ligne;
//et on la retourne
}



    


?>