<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
function rendreMonnaie($montant) {
    $billetdisponible = [10, 5, 2];
    $rendu = [];

    foreach ($billetdisponible as $billet) {
        while ($montant >= $billet) {
            $rendu[] = $billet;
            $montant -= $billet;
        }
    }
    $somme = array_sum($rendu);
    return $rendu;
}
?>
<form method="post" action="">
    <label>Montant à rendre :</label>
    <input type="number" name="montant" id="montant" >
    <button type="submit">Rendre monnaie</button>
</form>

<?php

    $montant = isset($_POST["montant"]) ? intval($_POST["montant"]) : 0;
    $resultat = rendreMonnaie($montant);
    $somme = array_sum($resultat);

    
    //cas exceptionelle
    if ($somme != $montant) {
        echo "Impossible de rendre la monnaie exacte.";
    }
   
    if ((!empty($resultat))&&($somme=$montant)) {
        echo "Combinaison minimale de billets à rendre pour $montant : " . implode(',', $resultat);
    }

?>


</body>
</html>
