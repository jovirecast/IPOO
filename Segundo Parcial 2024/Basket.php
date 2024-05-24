<?php

class Basket extends Partido
{

    //Atributos
    private $infracciones;
    private $coefPenalizacion;
    private $cantJugadores;


    //Constructor clase 
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $tipoPartido, $infracciones, $cantJugadores)
    {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $tipoPartido);

        $this->infracciones = $infracciones;
        $this->coefPenalizacion = 0.75;
        $this->cantJugadores = $cantJugadores;
    }

    //Getters
    public function getInfracciones()
    {
        return $this->infracciones;
    }
    public function getCoefPenalizacion()
    {
        return $this->coefPenalizacion;
    }
    public function getCantidadJugadores()
    {
        return $this->cantJugadores;
    }


    //Setters
    public function setInfracciones($infracciones)
    {
        $this->infracciones = $infracciones;
    }
    public function setCoefPenalizacion($coefPenalizacion)
    {
        $this->coefPenalizacion = $coefPenalizacion;
    }
    public function setCantidadJugadores($cantJugadores)
    {
        $this->cantJugadores = $cantJugadores;
    }


    public function calculoCoeficienteBasePartido()
    {
        $coefBase = parent::getCoefBase();
        $coefBasePartido = $coefBase * (parent::getCantGolesE1() + parent::getCantGolesE2()) * $this->getCantidadJugadores();
        $calculo = $coefBasePartido - ($this->getCoefPenalizacion() * $this->getInfracciones());

        return $calculo;
    }
}
