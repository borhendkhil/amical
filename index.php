<?php

include 'connexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $mot_de_passe = $_POST["mot_de_passe"];

 
    $sql = "SELECT id, nom_utilisateur, mot_de_passe FROM utilisateur WHERE nom_utilisateur = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row["mot_de_passe"])) {
          
            header("Location: Accueil.php");
            exit();
        } else {
            $erreur_message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    } else {
        $erreur_message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CAISSE AMICALE OTD</title>
		<meta charset="UTF-8" />
        <meta name="description" content="Sliding Background Image Menu with jQuery" />
        <meta name="keywords" content="jquery, background image, image, menu, navigation, panels" />
		<meta name="author" content="Codrops" />
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css' />

    </head>
    <style>
        /*index*/
.st_bt {
    display: block;
    width: 100%;
    position: relative;
    margin: 30px auto;
}
.center {
    width: 180px;
    height: 60px;
    position: relative;
    margin: 0 auto;
    display: block;
}
.btn {
    width: 180px;
    height: 60px;
    cursor: pointer;
    background: transparent;
    border: 1px solid #447534;
    outline: none;
    transition: 1s ease-in-out;
    border-radius: 7px;
    box-shadow: 2px 3px 4px #000;
}
svg {
    position: absolute;
    left: 0;
    top: 0;
    fill: none;
    stroke: #447534;
    stroke-dasharray: 150 480;
    stroke-dashoffset: 150;
    transition: 1s ease-in-out;
    background: #fff;
    color: #447534;
    border-radius: 4px;
}
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.btn span {
    color: white;
    font-size: 18px;
    font-weight: 100;
}
input#submit {
    color: #447534;
    font-size: 18px;
    font-weight: 100;
    z-index: 4;
    position: relative;
    background: none;
    border: none;
    font-family: fantasy;
}
/*****/
 .header {
    padding-top: 10px;
    margin-top: 8%;
}
        .content {
            width: 100%;
    max-width: 900px;
    border: 6px solid #000;
    margin: 0 auto;
    overflow: hidden;
    padding: 0px;
    background: #000;
    -moz-box-shadow: 1px 1px 5px #000;
    -webkit-box-shadow: 1px 1px 5px #000;
    box-shadow: 1px 1px 5px #000;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px 4px 4px 4px;
        }

       
        .left-image {
            float: left; 
            width: 50%; 
        }

        
        .right-form {
    float: right;
    width: 40%;
    padding: 20px;
    height: 510px;
    background: rgb(47 115 28 / 52%);
}

      
        .formulaire {
            padding: 20px;
    border-radius: 5px;
    text-align: center;
    margin-top: 17%;
        }
        .formulaire  h2 {
    float: none;
    color: #31701b;
    padding: 0px 20px 0 0;
    font-size: 25px;
    text-align: center;
    margin-bottom: 16px;
    font-weight: 600;
    text-shadow: 0px 0px 1px #000;
}
.formulaire h1 {
    margin: 0 0 13px 0;
    float: left;
    clear: both;
    font-size: 30px;
    padding: 0;
    text-shadow: 0px 0px 1px #000;
    color: #31701b;
    font-family: 'News Cycle', Georgia, serif;
    text-align: center;
}
       
label {
    font-size: 19px;
    color: #386f31;
    font-weight: 700;
    padding: 16px;
    margin: 2px 0 5px;
    text-shadow: 1px 2px 3px #fff;
    text-align: center;
}
input[type="text"], input[type="password"] {
    z-index: 4;
    position: relative;
    font-family: auto;
    width: 300px;
    height: 33px;
    font-weight: 800;
    border-radius: 5px;
    font-size: 21px;
    background: #ffffff;
    color: #447534;
    text-align: center;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #447534;
    box-sizing: border-box;
}
        .st_bt {
            text-align: center;
            margin-top: 20px;
        }
        .btn:hover {
    transition: 1s ease-in-out;
    background: #447534;
}
.btn:hover svg {
    stroke-dashoffset: -480;
}
    </style>
    <body>
		<div class="container">
			<div class="header">
				
			
			</div>
		
            <div class="content">
       
        <div class="left-image">
            <img src="images/default_in.jpg" alt="Image de gauche">
        </div>
       
        <div class="right-form">


        <form action="verification.php" method="POST">
                                              
                                              <div class="formulaire">
                                              <h1> Caisse d'Amicale OTD</h1>
            <h2>Connexion</h2>
                                                <div class="control-group">	
                                              <label class="control-label">Nom d'utilisateur</label>
                                              <div class="controls"><input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required></div>

                                              <label class="control-label">Mot de passe</label>
                                              <div class="controls"> <input type="password" placeholder="Entrer le mot de passe" name="password" required></div>
                                              <?php
                                                      if(isset($_GET['erreur'])){
                                                      $err = $_GET['erreur'];
                                                      if($err==1 || $err==2)
                                                      echo "<p  style='color:red'>Utilisateur ou Mot de Passe incorrect</p>";
                                                      }
                                                      ?>
                                              <div class="st_bt">
                                              <div class="center">
                                              <button class="btn">
                                                  <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                                                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line"></polyline>
                                                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line"></polyline>
                                                  </svg>
                                                  <span><input type="submit" id="submit" value="LOGIN"></span>
                                                  </button>
                                                 
                                              </div>
                                            </div>
                                                </div>
                                            </div>
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
	
    </body>
</html>