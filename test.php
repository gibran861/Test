<?php

use PHPUnit\Framework\TestCase;

class MonnaieTest extends TestCase {
    public function testRendreMonnaie() {
        // Tests pour les scénarios donnés dans les exemples
        $this->assertEquals([10, 2], rendreMonnaie(12));
        $this->assertEquals([5, 5], rendreMonnaie(10));
        $this->assertEquals([10, 5, 2], rendreMonnaie(17));
        $this->assertEquals([], rendreMonnaie(1)); // Cas où la somme est inférieure à la plus petite coupure
        $this->assertEquals([], rendreMonnaie(0)); // Cas où la somme à rendre est zéro

        // Tests pour des montants spécifiques
        $this->assertEquals([10], rendreMonnaie(10)); // Cas où le montant est égal à la plus grande coupure
        $this->assertEquals([10, 1], rendreMonnaie(11)); // Cas où le montant est égal à la plus grande coupure plus 1
        $this->assertEquals([10, 10, 1], rendreMonnaie(21)); // Cas où le montant est égal à deux fois la plus grande coupure plus 1
        $this->assertEquals([10, 10, 2, 1], rendreMonnaie(23)); // Cas avec une combinaison de coupures
        $this->assertEquals([10, 10, 10, 1], rendreMonnaie(31)); // Cas où le montant est égal à trois fois la plus grande coupure plus 1
    }
}

// Fonction à tester
function rendreMonnaie($montant) {
    $billetsDisponibles = [10, 5, 2];
    $rendu = [];

    foreach ($billetsDisponibles as $billet) {
        while ($montant >= $billet) {
            $rendu[] = $billet;
            $montant -= $billet;
        }
    }

    $somme = array_sum($rendu);

    if ($somme != $montant) {
        echo "Impossible de rendre la monnaie exacte.";
    }

    return $rendu;
}

?>
