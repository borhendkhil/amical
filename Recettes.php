<?php
session_start();

$db_username = 'root';
$db_password = '';
$db_name = 'amical';
$db_host = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
} else if (isset($_SESSION['username']) && $_SESSION['username'] !== "") {
    $user = $_SESSION['username'];

   
    $query_last_solde = "SELECT solde_caisse, date FROM solde ORDER BY date DESC LIMIT 1";
    $result_last_solde = mysqli_query($db, $query_last_solde);

    if ($result_last_solde) {
        if ($row_last_solde = mysqli_fetch_assoc($result_last_solde)) {
            $solde_caisse = $row_last_solde['solde_caisse'];
            $date = date('d/m/Y', strtotime($row_last_solde['date']));
        } else {
            $solde_caisse = "Aucune saisie de solde trouvée.";
            $date = "Date inconnue";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($db);
    }
}

mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>CAISSE AMICALE OTD</title>
		<meta charset="UTF-8" />
        <meta name="description" content="Sliding Background Image Menu with jQuery" />
        <meta name="keywords" content="jquery, background image, image, menu, navigation, panels" />
		<meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7243260-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style>
    h1 {
   
    clear: none;
  
}
.sor {
    margin-right: 0px;
    float: right;
    position: relative;
    z-index: 1;
    display: inline-block;
    font-size: 16px;
    text-decoration: none;
    width: 77px;
    height: auto;
    margin-top: 18px;
}
#btn-retour {
    text-decoration: none;
    width: 100%;
    height: 100%;
    display: block;
    margin: 0 auto;
    padding: 12px 0;
    text-transform: capitalize;
}
a#btn-retour:hover {
    color: #a9febd;
}
.sbi_container {

    background: rgb(0 0 0 / 64%);
    width: 98%;
    height: 230px;
    margin: 0 auto;
    display: block;
  
}
.sbi_container h2 {
    float: none;
    color: #bda2dc;
    padding: 0px 20px 0 0;
    text-align: center;
    margin: 0px 0 45px 0;
    clear: both;
    font-size: 30px;
    padding: 0;
    text-shadow: 0px 0px 1px #000;
    color: #ffffff;
    font-family: 'News Cycle', Georgia, serif;
}
.bloc {
    margin: 17px auto;
}
.bloc label {
    display: inline-block;
    width: 22%;
    margin-bottom: 5px;
    font-weight: 700;
    color: #ffffff;
    font-size: 17px;
    text-align: left;
}
.bloc input {
    line-height: normal;
    float: none;
    margin-left: 0;
    width: 26%;
    height: 22px;
    color: #000000;
    text-align: center;
    font-size: 16px;
}
form {
    text-align: center;
    float: none;
    margin: 15px auto;
    display: block;
    z-index: 5;

}
button {
    border-radius: 0px;
    background: #598e40;
    float: none;
    text-transform: uppercase;
    font-weight: bolder;
    transition: all 0.3s linear;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}
 button:hover {
    background: #ffffff;
    color: #558a3f;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
.header {
    padding-top: 10px;
    height: 150px;
}
div#sbi_containe {
    background: rgb(0 0 0 / 64%);
    width: 75%;
    height: auto;
    margin: 15px auto;
    display: block;
    float: none;
    text-align: center;
    border: 2px solid #598e40;
}
.sbi_container {
    position: relative;
    margin: 0 auto;
    overflow: hidden;
    padding: 10px;
    background: none;
    -moz-box-shadow: 1px 1px 5px #000;
    /* -webkit-box-shadow: 1px 1px 5px #000; */
    /* box-shadow: none */
    -moz-border-radius: 4px;
    /* -webkit-border-radius: 4px; */
    /* border-radius: 4px 4px 4px 4px; */
}
.sbi_panel {
    float: left;
    position: relative;
    height: 43%;
    overflow: hidden;
    background: none;
}
.sbi_panel_img {
    position: absolute;
    height: 100%;
    top: 0px;
    background-repeat: no-repeat;
    background: none;
    width: 900px;
    left: 0px;
  
    background-position: 0px 0px;
}
.content {
    width: 100%;
    position: relative;
    margin: 0 0 0 0;
    clear: both;
    height: 518px;
}

.skew-menu {
    
    text-align: center;
  
    margin: 65px auto 30px;
    display: block;
    text-align: center;
    width: 900px;
}

.skew-menu ul {
    display: inline-block;
    margin: 0;
    padding: 0;
    list-style: none;
    transform: skew(-25deg);
}
.skew-menu ul li:first-child {
    border-radius: 7px 0 0 7px;
}
.skew-menu ul li {
    float: left;
    border-right: 1px solid #eee;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
    color: #fff;
    font-weight: bolder;
    transition: all 0.3s linear;
    border: 2px solid #598e40;
    background: rgb(0 0 0 / 64%);
    font-size: 15px;
    text-shadow: none;
}
.skew-menu ul li:hover {
    background: #eee;
    color: #598e40;
    border: 2px solid #598e40;
}
.skew-menu ul li a {
    display: block;
    padding: 1em 2em;
    color: inherit;
    text-decoration: none;
    transform: skew(25deg);
}
div#ajouter {
    font-size: 15px;
    color: #fff;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 1px 2px 3px #000000ba;
}
th {
    font-weight: bold;
    font-size: 16px;
    background-color: #071d00;
    border: 1px solid #9ab593;
    padding: 8px;
    text-align: center;
    color: #fff;
}

td {
    border: 1px solid #457d34;
    padding: 8px;
    font-size: 17px;
    color: #fff;
    font-weight: 600;
    font-family: 'Play', sans-serif;
}
select#membre {
    text-transform: none;
    width: 306px;
    height: 38px;
    line-height: normal;
    color: #000000;
    text-align: center;
    font-size: 16px;
}
.bloc.des label {
    width: 10%;
    text-align: left;
    margin-right: 13%;
    margin-left: 151px;
}
input#description {
    width: 40%;

}
/****sold */
.header {
    padding-top: 10px;
    height: 63px;
    display: block;
    text-transform: capitalize;
    margin-bottom: 50px;

}
.ap {
    width: 24%;
    float: left;
    display: inline-block;
    text-transform: capitalize;
}
.af {
    width: 60%;
    float: none;
    display: inline-block;
    text-transform: capitalize;
}
h1.txt {
    float: inline-end;
}
div#afficher {
    display: none;
}
/*****onglet */
.tabs {
    overflow: hidden;
    border-bottom: 1px solid #ccc;
    background-color: #598e4091;
    border-radius: 4px;


}

.tablink {
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 19px;
    transition: 0.3s;
    font-size: 17px;
    background: none;
    margin: 0;
    
    text-transform: capitalize;
}

.tablink:hover {
  background-color: #ddd;
}

/* Style du contenu des onglets */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border-top: none;
}

/* Style du contenu actif */
.tabcontent.show {
  display: block;
}
form#formAfficher {
    text-align: center;
    float: none;
    margin: 0px auto;
    display: block;
    z-index: 5;
    border-bottom: 1px solid #ccc;
    background-color: #598e4091;
}
button.tablink:active,button.tablink:hover {
    background: #071d00;
    border-left: 1px solid;
    color: #fff;
}
@media screen and (max-width: 520px) {
    .ap {
    width: 22%;
    margin-left: 10px;
 
}
.ap h1,.af h1 {
    font-size: 15px;
    padding: 0;
    margin: 0 0 0px 0;
}
.af {
    width: 45%;

    margin-left: 35px;
}
h1.txt {
    float: left;
    margin: 0 0 0px 0;
}
.sor {

    margin-top: 0px;
}
.skew-menu {

    width: 100%;
}
.skew-menu ul li {
    font-size: 11px;
}
.skew-menu ul li {
   
    font-size: 11px;
}
.sbi_container h2 {

    font-size: 24px;
}
form#formAfficher .bloc {

    height: auto;
    margin-bottom: 10px;
    width: 79%;
}
form#formAfficher {
  
    font-size: 15px;
   
    line-height: 37px;
}
button {
    padding: 13px 25px;
    font-size: 13px;
    margin: 10px 2px;
  
}
input#description {
    width: 48%;
}
.bloc.des label {
    width: 40%;
    text-align: left;
    margin-right: 0;
    margin-left: 0;
}
.bloc input {

    margin-left: 0;
    width: 48%;
 
    font-size: 16px;
}
.bloc label {
  
    width: 40%;
    margin-bottom: 5px;
  
}
select#membre {
   
    width: 52%;
    height: 32px;
  
    font-size: 16px;
}
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <script>
        $(document).ready(function() {
            $('.skew-menu a').click(function(e) {
                e.preventDefault();
                var action = $(this).attr('data-action');
                $('.section').hide();
                $('#' + action).show();
            });
        });
    </script>
    </head>
    <body>
		<div class="container">
        <div class="header">
            <div class="ap"> 
            <h1> Caisse d'Amicale OTD</h1></div>
            <div class="af"><h1>solde Caisse: <?php echo $solde_caisse; ?></h1><h1 class='txt'>   Date Caisse: <?php echo $date; ?></h1></div>
            <div class="sor"> <a href="Accueil.php" id="btn-retour">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="us">
									 
                        <?php
                                     echo $user; 
                                     
                                ?>					</span>
                </a>
                      </div>
            
			</div>
           


            <nav class="skew-menu">
                    <ul>
                        <li><a href="#" data-action="ajouter">Ajouter</a></li>
                  
                        <li><a href="#" data-action="afficher">Afficher</a></li>
                    </ul>
                </nav>


			
	
			<div class="content_bl">
				<div id="sbi_containe" class="sbi_container">
                <div id="ajouter" class="section">
                     
                <?php

                        $db_username = 'root';
                        $db_password = '';
                        $db_name = 'amical';
                        $db_host = 'localhost';

                        $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $membre_id = $_POST['membre'];
                            $montant = $_POST['montant'];
                            $description = $_POST['description'];
                            $date_recette = $_POST['date_recette'];

                            $sql_recettes = "INSERT INTO recettes (membre_id, montant, description, date_recette) VALUES ('$membre_id', '$montant', '$description', '$date_recette')";
                            if (mysqli_query($db, $sql_recettes)) {
                                echo "La recette a été ajoutée avec succès.";
                                echo "<script>window.print();</script>";
                                
                                $sql_solde_precedent = "SELECT solde_caisse FROM solde WHERE date = DATE_SUB('$date_recette', INTERVAL 1 DAY)";
                                $result_solde_precedent = mysqli_query($db, $sql_solde_precedent);
                            
                                
                               
                            
                                $nouveau_solde_caisse =$solde_caisse + $montant;
                            
                                $sql_update_solde = "
                                INSERT INTO solde (date, solde_caisse, solde_mouvement_recette, solde_debut, solde_mouvement_total)
                                VALUES ('$date_recette', $nouveau_solde_caisse, $montant,$solde_caisse, $montant)
                                ON DUPLICATE KEY UPDATE
                                solde_caisse = VALUES(solde_caisse),
                                solde_mouvement_recette = VALUES(solde_mouvement_recette)
                            ";
                            header("Location: quittanceR.html?nom_membre=$nom_membre&montant=$montant&description=$description&date_recette=$date_recette");
                        
                                if (!mysqli_query($db, $sql_update_solde)) {
                                    echo "Erreur lors de la mise à jour du solde : " . mysqli_error($db);
                                }
                            } else {
                                echo "Erreur lors de l'ajout de la recette : " . mysqli_error($db);
                            }
                        }
                       

                        mysqli_close($db);
                       

                        ?>


                           
                            <form id="formAjouter" method="POST" action="">
                            <h2>Ajouter Des Recettes</h2>
                            <div class="bloc">
                            <label for="membre"> Membres :</label>
                            <select name="membre" id="membre">
                                <?php
                                
                                $db_username = 'root';
                                $db_password = '';
                                $db_name = 'amical';
                                $db_host = 'localhost';
                                $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

                             
                                $query = "SELECT id, nom FROM membres";
                                $result = mysqli_query($db, $query);

                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                                }

                               
                                mysqli_close($db);
                                ?>
                            </select>
                            </div>
                            <div class="bloc">
                            <label for="montant">Montant :</label>
                            <input type="text" name="montant" id="montant" required>
                            </div>
                            <div class="bloc ">
                            <label for="date_recette">Date de la recette :</label>
                            <input type="date" name="date_recette" id="date_recette" required>
                            </div>
                             <div class="bloc des">
                            <label for="description">Opération :</label>
                           
                            <input type="description" name="description" id="description" required>
                            </div>
                            

                            <button type="submit" name="ajouter">Ajouter</button>
                            
                            </form>
                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    
                                    const montantInput = document.getElementById('montant');
                                    const dateRecetteInput = document.getElementById('date_recette');

                                    montantInput.addEventListener('blur', function() {
                                        const montant = parseFloat(montantInput.value);
                                        if (isNaN(montant)) {
                                            alert("Le montant doit être un chiffre.");
                                            montantInput.style.backgroundColor = 'lightcoral'; 
                                            montantInput.value = ''; 
                                        }
                                    });

                                    dateRecetteInput.addEventListener('blur', function() {
                                        const dateRecette = new Date(dateRecetteInput.value);
                                        const dateSysteme = new Date();
                                        if (dateRecette > dateSysteme) {
                                            alert("La date de la recette ne peut pas être dans le futur.");
                                            dateRecetteInput.style.backgroundColor = 'lightcoral'; 
                                            dateRecetteInput.value = ''; 
                                        }
                                    });
                                });
                            </script>

				
				
				</div>
                <?php
                    $db_username = 'root';
                    $db_password = '';
                    $db_name = 'amical';
                    $db_host = 'localhost';
                    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

                    $sql_recettes = "SELECT 
                                        DISTINCT DATE_FORMAT(recettes.date_recette, '%Y-%m') AS mois 
                                    FROM 
                                        recettes 
                                    ORDER BY 
                                        recettes.date_recette DESC";
                    $result_recettes = mysqli_query($db, $sql_recettes);

                    $mois_existants = array();

                    while ($row = mysqli_fetch_assoc($result_recettes)) {
                        $mois_existants[] = $row['mois'];
                    }

                    sort($mois_existants);

                    mysqli_close($db);
                    ?>
                    <div id="afficher" class="section">
                        <h2>Liste Des Recettes Par Mois</h2>
                        <div class="tabs">
                            <?php
                            $mois_fr = [
                                '01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', 
                                '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', 
                                '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre'
                            ];

                            foreach ($mois_existants as $mois) {
                                $mois_num = substr($mois, 5);
                                echo "<button i class='tablink' onclick=\"selectionnerMois('$mois_num')\">" . $mois_fr[$mois_num] . "</button>";
                            }
                            ?>
                        </div>
             
                        <form id="formAfficher" method="POST" action="">
                        <div id="donnees" class="donnees"></div>
                                    </form>

                    

                    </div>

                    <script>
                            function selectionnerMois(mois) {
                                
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState == XMLHttpRequest.DONE) {
                                        if (xhr.status == 200) {
                                            document.getElementById("donnees").innerHTML = xhr.responseText;
                                        } else {
                                            console.log("Une erreur s'est produite lors du chargement des données.");
                                        }
                                    }
                                };
                                xhr.open("GET", "charger_mouvements.php?mois=" + mois, true);
                                xhr.send();
                            }
                        </script>

    </div>

    

   



</div>

                    </div>


        
		
			<div class="more">
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					
				</ul>
			</div>
			<div class="topbar">
			
            <a href="https://www.facebook.com/amicaleOTD"><span>&laquo; Caisse d'Amicale OTD-2024  </span> </a>
				<span class="right_ab">
					<a href="mailto:samahdekhilgl@gmail.com"><strong>Réalisé par:Samah Dekhil</strong></a>
				</span>
			</div>
		</div>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.bgImageMenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sbi_container').bgImageMenu({
					defaultBg	: '',
					border		: 1,
					type		: {
						mode		: 'seqHorizontalSlide',
						speed		: 150,
						easing		: 'jswing',
						seqfactor	: 100
					}
				});
			});
		</script>
	
        <script>
window.addEventListener('DOMContentLoaded', function() {
    document.getElementById("modifier").style.display = "none";
    document.getElementById("supprimer").style.display = "none";
    document.getElementById("afficher").style.display = "none";
    document.getElementById("ajouter").style.display = "block";
});
</script>


    </body>
</html>