<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name = 'amical';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');
    

    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
    
        $requete = "SELECT count(*) FROM utilisateur WHERE nom_utilisateur = '".$username."' AND mot_de_passe = '".$password."'";
        $exec_requete = mysqli_query($db, $requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        
        if($count != 0) 
        {
           
            $requete_nb_ent = "SELECT nb_ent FROM utilisateur WHERE nom_utilisateur = '$username'";
            $exec_requete_nb_ent = mysqli_query($db, $requete_nb_ent);
            $reponse_nb_ent = mysqli_fetch_array($exec_requete_nb_ent);
            $nb_ent = $reponse_nb_ent['nb_ent'];
            
           
            $nb_ent++;
            
            
            $update_nb_ent = "UPDATE utilisateur SET nb_ent = $nb_ent WHERE nom_utilisateur = '$username'";
            mysqli_query($db, $update_nb_ent);
            
           
            $insert_historique = "INSERT INTO historique_user (nom_utilisateur, date_entre, heure_ent) VALUES ('$username', CURRENT_DATE(), CURRENT_TIME())";
            mysqli_query($db, $insert_historique);
  
           
                    $_SESSION['username'] = $username;
                    header('Location: Accueil.php');
               
        }
        else
        {
            header('Location: index.php?erreur=1'); 
        }
    }
    else
    {
        header('Location: index.php?erreur=2'); 
    }
}
else
{
    header('Location: index.php');
}
mysqli_close($db);
?>
