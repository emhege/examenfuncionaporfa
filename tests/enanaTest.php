<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
        /* $calc = new Calculadora(3,5);
        $this->assertEquals(8, $calc->suma()); */

        $enanaViva = new Enana('Manuela',2);
        $vidaViva = $enanaViva->getSituacion();

        $enanaMuerta = new Enana('Rogelia',-2);
        $vidaMuerta = $enanaMuerta->getSituacion();

        $enanaLimbo = new Enana('Rogelia',0);
        $vidaLimbo = $enanaLimbo->getSituacion();


        $this->assertEquals('viva', $vidaViva);
        $this->assertEquals('muerta', $vidaMuerta);
        $this->assertEquals('limbo', $vidaLimbo);

        
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $enanaHeridaLeve = new Enana('Manuela', 300);
        $enanaHeridaLeve->heridaLeve();
        $statusViva = $enanaHeridaLeve->getSituacion();
        $vida = $enanaHeridaLeve->getPuntosVida();
        $this->assertEquals('viva', $statusViva);
        $this->assertEquals(290, $vida);
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enanaHeridaMuerta = new Enana('Manuela', 3);
        $enanaHeridaMuerta->heridaLeve();
        $status = $enanaHeridaMuerta->getSituacion();
        $vida = $enanaHeridaMuerta->getPuntosVida();
        $this->assertEquals('muerta', $status);
        $this->assertEquals(-7, $vida);
    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $enanaHeridaMuerta = new Enana('Manuela', 10);
        $enanaHeridaMuerta->heridaGrave();
        $status = $enanaHeridaMuerta->getSituacion();
        $vida = $enanaHeridaMuerta->getPuntosVida();
        $this->assertEquals('limbo', $status);
        $this->assertEquals(0, $vida);
    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $enanaHeridaMuerta = new Enana('Manuela', -2);
        $enanaHeridaMuerta->pocima();
        $statusMuerte = $enanaHeridaMuerta->getSituacion();
        $vidaMuerte = $enanaHeridaMuerta->getPuntosVida();

        $enanaHeridaLimbo = new Enana('Manuela', 0);
        $enanaHeridaLimbo->pocima();
        $statusLimbo = $enanaHeridaLimbo->getSituacion();
        $vidaLimbo = $enanaHeridaLimbo->getPuntosVida();

        /* $enanaHeridaViva = new Enana('Manuela', 2);
        $enanaHeridaViva->pocima();
        $statusViva = $enanaHeridaViva->getSituacion();
        $vidaViva = $enanaHeridaViva->getPuntosVida(); */

        $this->assertEquals('viva', $statusMuerte);
        $this->assertEquals(8, $vidaMuerte);

        $this->assertEquals('limbo', $statusLimbo);
        $this->assertEquals(0, $vidaLimbo);

        /* $this->assertEquals('viva', $statusViva);
        $this->assertEquals(12, $vidaViva); */

    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado

    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>