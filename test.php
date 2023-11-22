<?php

use PHPUnit\Framework\TestCase;

class MonnaieTest extends TestCase {
    public function testRendreMonnaie() {
        $this->assertEquals([10], rendreMonnaie(10)); 
        $this->assertEquals([10, 1], rendreMonnaie(11));
        $this->assertEquals([10, 10, 1], rendreMonnaie(21)); 
        $this->assertEquals([10, 10, 2, 1], rendreMonnaie(23));
        $this->assertEquals([10, 10, 10, 1], rendreMonnaie(31));
    }
}

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