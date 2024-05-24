<?php

include_once './Categoria.php';

class Fotbool extends Partido
{

    //Atributos
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;
    private $cantJugadores;


    //Constructor clase 
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $tipoPartido, $cantJugadores)
    {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $tipoPartido);

        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
        $this->cantJugadores = $cantJugadores;
    }

    //Getters
    public function getCoefMenores()
    {
        return $this->coefMenores;
    }
    public function getCoefJuveniles()
    {
        return $this->coefJuveniles;
    }
    public function getCoefMayores()
    {
        return $this->coefMayores;
    }
    public function getCantidadJugadores()
    {
        return $this->cantJugadores;
    }


    //Setters
    public function setCoefMenores($coefMenores)
    {
        $this->coefMenores = $coefMenores;
    }
    public function setCoefJuveniles($coefJuveniles)
    {
        $this->coefJuveniles = $coefJuveniles;
    }
    public function setCoefMayores($coefMayores)
    {
        $this->coefMayores = $coefMayores;
    }
    public function setCantidadJugadores($cantJugadores)
    {
        $this->cantJugadores = $cantJugadores;
    }


    public function calculoCoeficienteBasePartido()
    {
        $coefBase = parent::getCoefBase();
        $categoria =[$this->getCoefMenores(), $this->getCoefJuveniles(), $this->getCoefMayores()];
        $coefBasePartido = $coefBase * (parent::getCantGolesE1() + parent::getCantGolesE2()) * $this->getCantidadJugadores();
        $categoriaSeleccionada = $this->getTipoPartido();
        if ($categoriaSeleccionada == "Mayores"){
            $calculo = $coefBasePartido * $categoria[$categoriaSeleccionada];
        } elseif ($categoriaSeleccionada == "juveniles"){
            $calculo = $coefBasePartido * $categoria[$categoriaSeleccionada];
        }
        elseif ($categoriaSeleccionada == "Menores"){
            $calculo = $coefBasePartido * $categoria[$categoriaSeleccionada];
        }

        return $calculo;
    }
}
