<?php
class Viaje
{
    //Atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMaxPasajeros;
    private $objPasajeros;
    private $objResponsableV;

    //Construct clase Viaje
    public function __construct($codViaje, $destViaje, $cantMaxPasa, $objPasa, $objRespV)
    {
        $this->codigoViaje = $codViaje;
        $this->destinoViaje = $destViaje;
        $this->cantidadMaxPasajeros = $cantMaxPasa;
        $this->objPasajeros = $objPasa;
        $this->objResponsableV = $objRespV;

    }

    //Getters
    public function getCodigoViaje()
    {
        return $this->codigoViaje;
    }
    public function getDestinoViaje()
    {
        return $this->destinoViaje;
    }
    public function getCantidadMaxPasajeros()
    {
        return $this->cantidadMaxPasajeros;
    }
    public function getObjPasajeros()
    {
        return $this->objPasajeros;
    }
    public function getObjResponsableV()
    {
        return $this->objResponsableV;
    }

    //Setters
    public function setCodigoViaje($codigoViaje)
    {
        $this->codigoViaje = $codigoViaje;
    }
    public function setDestinoViaje($destinoViaje)
    {
        $this->destinoViaje = $destinoViaje;
    }
    public function setCantidadMaxPasajeros($cantidadMaxPasajeros)
    {
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
    }
    public function setgetObjPasajeros($objPasajeros)
    {
        $this->objPasajeros = $objPasajeros;
    }
    public function setObjResponsableV($objResponsableV)
    {
        $this->objResponsableV = $objResponsableV;
    }
}
