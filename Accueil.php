<?php
session_start();

$db_username = 'root';
$db_password = '';
$db_name = 'amical';
$db_host = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == true) {
    $username = $_SESSION['username'];
    $update_historique = "UPDATE historique_user SET date_sortie = CURRENT_DATE(), heure_sortie = CURRENT_TIME() WHERE nom_utilisateur = '$username' AND date_sortie IS NULL";
    mysqli_query($db, $update_historique);

    session_unset();
    session_destroy();

    mysqli_close($db); 
    header("location: index.php");
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
}/****sold */
.header {
    padding-top: 10px;
    height: 63px;
    display: block;
    text-transform: capitalize;
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
@media screen and (max-width: 520px) {
    .ap {
    width: 22%;
 
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
h1,h1.txt {
margin: 0 0 0px 0;
   
    font-size: 20px;
    padding: 12px;
  
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
}
    </style>
    </head>
    <body>
		<div class="container">
			<div class="header">
            <div class="ap"> 
            <h1> Caisse d'Amicale OTD</h1></div>
            <div class="af"><h1>solde Caisse: <?php echo $solde_caisse; ?></h1><h1 class='txt'>   Date Caisse: <?php echo $date; ?></h1></div>
            <div class="sor"> <a href="Accueil.php?deconnexion=true" id="btn-retour">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="us">
									 
                        <?php
                                     echo $user; 
                                     
                                ?>					</span>
                </a>
                      </div>
            
			</div>
			<div class="content">
				<div id="sbi_container" class="sbi_container">
					<div class="sbi_panel" data-bg="images/1.jpg">
						<a href="Accueil.php" class="sbi_label">Accueil</a>
						<div class="sbi_content">
                        <ul>
								<li><a href="Ouv.php">Ouverture Caisse</a></li>
                                <li><a href="Ferm.php">Fermeture Caisse</a></li>
                        </ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/2.jpg">
						<a href="#" class="sbi_label">Paramétre</a>
						<div class="sbi_content">
							<ul>
								<li><a href="Membres.php">Membres</a></li>
								<li><a href="login.php">Inscrire</a></li>
                                <li><a href="solde.php">Solde</a></li>
								<li><a href="Statistique.php">Statistique</a></li>
							</ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/3.jpg">
						<a href="#" class="sbi_label">Mouvement</a>
						<div class="sbi_content">
							<ul>
								<li><a href="Recettes.php">Recettes</a></li>
								<li><a href="Depenses.php">Dépenses</a></li>
								<li><a href="Rapport.php">Rapport</a></li>
							</ul>
						</div>
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
					defaultBg	: 'images/default.jpg',
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
		<script src="//tympanus.net/codrops/adpacks/demoad.js"></script>
    </body>
</html>