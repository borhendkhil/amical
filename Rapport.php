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

    $query_last_solde = "SELECT solde_caisse FROM solde ORDER BY date DESC LIMIT 1";
    $result_last_solde = mysqli_query($db, $query_last_solde);

  
    if ($result_last_solde) {
      
        if ($row_last_solde = mysqli_fetch_assoc($result_last_solde)) {
            $solde_caisse = $row_last_solde['solde_caisse'];
        } else {
            $solde_caisse = "Aucune saisie de solde trouvée.";
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
    margin: 52px 0 45px 0;
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
    width: 18%;
    margin-bottom: 5px;
    font-weight: 700;
    color: #ffffff;
    font-size: 17px;
    text-align: center;
}
.bloc input {
    line-height: normal;
    float: none;
    margin-left: 0;
    width: 26%;
    height: 22px;
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
    width: 880px;
    height: 364px;
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
    /* margin-top: -40px; */
    margin: 0 auto;
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
/****sold */
.header {
    padding-top: 10px;
    height: 63px;
    display: block;
    text-transform: capitalize;
}
.ap {
    width: 28%;
    float: left;
    display: inline-block;
    text-transform: capitalize;
}
.af {
    width: 45%;
    float: none;
    display: inline-block;
    text-transform: capitalize;
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
            <div class="af"><h1>solde Caisse: <?php echo $solde_caisse; ?></h1></div>
            <div class="sor"> <a href="Accueil.php?deconnexion=true" id="btn-retour">
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
                        <li><a href="#" data-action="modifier">Modifier</a></li>
                        <li><a href="#" data-action="supprimer">Supprimer</a></li>
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
                                    $nom = mysqli_real_escape_string($db, $_POST['nom']);
                                    $email = mysqli_real_escape_string($db, $_POST['email']);
                                    $telephone = mysqli_real_escape_string($db, $_POST['telephone']);

                                    
                                    $check_query = "SELECT * FROM membres WHERE nom = '$nom'";
                                    $result = mysqli_query($db, $check_query);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "Le membre avec le nom '$nom' existe déjà.";
                                    } else {
                                       
                                        $sql = "INSERT INTO membres (nom, email, telephone) VALUES ('$nom', '$email', '$telephone')";
                                        if (mysqli_query($db, $sql)) {
                                            echo "Le membre a été ajouté avec succès.";
                                        } else {
                                            echo "Erreur lors de l'ajout du membre : " . mysqli_error($db);
                                        }
                                    }
                                }

                                mysqli_close($db);
                                ?>

                           
                            <form id="formAjouter" method="POST" action="">
                            <h2>Ajouter un membre</h2>
                            <div class="bloc">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" required>
                            </div>
                            <div class="bloc">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                            </div>
                            <div class="bloc">
                            <label for="telephone">Téléphone :</label>
                            <input type="text" id="telephone" name="telephone" required>
                            </div>

                            <button type="submit" name="ajouter">Ajouter</button>
                            
                            </form>

				
				
				</div>
             

                <div id="afficher" class="section">

                    <h2>Liste Des Membres </h2>
                        <form id="formAfficher" method="POST" action="">
                        <?php
                                $db_username = 'root';
                                $db_password = '';
                                $db_name = 'amical';
                                $db_host = 'localhost';
                                
                                $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');
                                
                                
                                $sql_select_members = "SELECT * FROM membres";
                                $result_select_members = mysqli_query($db, $sql_select_members);
                                
                                mysqli_close($db);
                                    ?>
                                      <table>
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result_select_members)) : ?>
                                                <tr>
                                                    <td><?php echo $row['nom']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['telephone']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                        </form>
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
		
		<script src="//tympanus.net/codrops/adpacks/demoad.js"></script>
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