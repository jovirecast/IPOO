<?php
class Partido
{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;
    private $tipoPartido;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $tipoPartido)
    {
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->cantGolesE1 = $cantGolesE1;
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = $cantGolesE2;
        $this->coefBase = 0.5;
        $this->tipoPartido = $tipoPartido;
    }

    //OBSERVADORES
    public function setidpartido($idpartido)
    {
        $this->idpartido = $idpartido;
    }

    public function getIdpartido()
    {
        return $this->idpartido;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }


    public function setCantGolesE1($cantGolesE1)
    {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function getCantGolesE1()
    {
        return $this->cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2)
    {
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function getCantGolesE2()
    {
        return $this->cantGolesE2;
    }



    public function setObjEquipo1($objEquipo1)
    {
        $this->objEquipo1 = $objEquipo1;
    }
    public function getObjEquipo1()
    {
        return $this->objEquipo1;
    }


    public function setObjEquipo2($objEquipo2)
    {
        $this->objEquipo2 = $objEquipo2;
    }
    public function getObjEquipo2()
    {
        return $this->objEquipo2;
    }




    public function setCoefBase($coefBase)
    {
        $this->coefBase = $coefBase;
    }
    public function getCoefBase()
    {
        return $this->coefBase;
    }


    public function setTipoPartido($tipoPartido)
    {
        $this->tipoPartido = $tipoPartido;
    }
    public function getTipoPartido()
    {
        return $this->tipoPartido;
    }


    public function __toString()
    {
        //string $cadena
        $cadena = "idpartido: " . $this->getIdpartido() . "\n";
        $cadena = $cadena . "Fecha: " . $this->getFecha() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "<Equipo 1> " . "\n" . $this->getObjEquipo1() . "\n";
        $cadena = $cadena . "Cantidad Goles E1: " . $this->getCantGolesE1() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "<Equipo 2> " . "\n" . $this->getObjEquipo2() . "\n";
        $cadena = $cadena . "Cantidad Goles E2: " . $this->getCantGolesE2() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        return $cadena;
    }

    /* Método que retorna el equipo ganador del partido, en caso de empate retorna ambos
    * 
    * @return array
    * */
    public function darEquipoGanador()
    {
        $resultado = $this->getCantGolesE1() <=> $this->getCantGolesE2();
        $ganador = [];
        switch ($resultado) {
            case -1:
                $ganador = [$this->getObjEquipo2(), null];
                break;
            case 0:
                $ganador = [$this->getObjEquipo1(), $this->getObjEquipo2()];
                break;
            case 1:
                $ganador = [$this->getObjEquipo1(), null];
                break;
        }
        return $ganador;
    }

    /* Método que retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
    * 
    * @return int
    * */
    public function coeficientePartido()
    {
        $coeficienteE1 = $this->getObjEquipo1()->calculoCoeficienteBasePartido();
        $coeficienteE2 = $this->getObjEquipo2()->calculoCoeficienteBasePartido();
        $coeficientePartido = $coeficienteE1 + $coeficienteE2;

        return $coeficientePartido;
    }


}
