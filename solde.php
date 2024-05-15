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