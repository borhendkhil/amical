<?php
$db_username = 'root';
$db_password = '';
$db_name = 'amical';
$db_host = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

// Vérification de la connexion
if ($db->connect_error) {
    die("La connexion à la base de données a échoué : " . $db->connect_error);
}

// Facultatif : définir le jeu de caractères de la connexion
if (!$db->set_charset("utf8mb4")) {
    printf("Erreur lors du chargement du jeu de caractères utf8mb4 : %s\n", $db->error);
    exit();
}

// Facultatif : définir le fuseau horaire par défaut
date_default_timezone_set('Europe/Paris');
?>
