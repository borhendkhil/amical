<?php

$db_username = 'root';
$db_password = '';
$db_name = 'amical';
$db_host = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not connect to the database');

$mois = $_GET['mois'];


$sql_count = "SELECT COUNT(*) AS nombre_lignes FROM recettes WHERE MONTH(date_recette) = '$mois'";
$result_count = mysqli_query($db, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_recettes = $row_count['nombre_lignes'];


$sql_recettes = "SELECT membres.nom AS membre, 
                        recettes.montant, 
                        recettes.description, 
                        recettes.date_recette
                 FROM recettes 
                 INNER JOIN membres 
                 ON recettes.membre_id = membres.id 
                 WHERE MONTH(recettes.date_recette) = '$mois'
                 order by recettes.date_recette";

$result_recettes = mysqli_query($db, $sql_recettes);

if (mysqli_num_rows($result_recettes) > 0) {
   
    echo "<table><thead><tr><th>N°</th><th>Membre</th><th>Montant</th><th>Description</th><th>Date de la recette</th></tr></thead><tbody>";
 
    $count = 1;
    
    while ($row = mysqli_fetch_assoc($result_recettes)) {
        echo "<tr>";
        echo "<td>" . $count++ . "</td>"; 
        echo "<td>" . $row['membre'] . "</td>";
        echo "<td>" . $row['montant'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . date('d/m/Y', strtotime($row['date_recette'])) . "</td>";
       
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Aucune recette trouvée pour ce mois.";
}

mysqli_close($db);

?>
