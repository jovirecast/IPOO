<?php
class Viaje
{
    //Atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMaxPasajeros;
    private $objPasajeros;
    private $objResponsableV;
    private $baseDatosViaje;

    //Construct clase Viaje
    public function __construct($codViaje, $destViaje, $cantMaxPasa, $objPasa, $objRespV)
    {
        $this->codigoViaje = $codViaje;
        $this->destinoViaje = $destViaje;
        $this->cantidadMaxPasajeros = $cantMaxPasa;
        $this->objPasajeros = $objPasa;
        $this->objResponsableV = $objRespV;
        $this->baseDatosViaje = array();
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
    public function getBaseDatosViaje()
    {
        return $this->baseDatosViaje;
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
    public function setObjPasajeros($objPasajeros)
    {
        $this->objPasajeros = $objPasajeros;
    }
    public function setObjResponsableV($objResponsableV)
    {
        $this->objResponsableV = $objResponsableV;
    }
    public function setBaseDatosViaje($BaseDatosViaje)
    {
        $this->baseDatosViaje = $BaseDatosViaje;
    }

    //métodos
    public function datosViaje()
    {
        $datosViaje =
            [
                "Código" => $this->getCodigoViaje(),
                "Destino" => $this->getDestinoViaje(),
                "Cantidad de pasajeros" => $this->getCantidadMaxPasajeros(),
                "Pasajeros" => $this->getObjPasajeros(),
                "Responsable" => $this->getObjResponsableV()
            ];

        return $datosViaje;
    }
    public function almacenarDistintosViajes($viajesCreados)
    {
        $baseDatosFinalViaje = $this->getBaseDatosViaje();
        array_push($baseDatosFinalViaje, $viajesCreados);
        $this->setBaseDatosViaje($baseDatosFinalViaje);
        return $baseDatosFinalViaje;
    }

    /*public function __toString()
    {
        $viajesParaMostrar = $this->getBaseDatosViaje();
        $ind = 0;
        $CDC = 3;
        $CoDeCa = array();
        for ($ind; $ind < $CDC; $ind++) {
            $CoDeCa[$ind] = $viajesParaMostrar[$ind];
        }
        $mensajeCoDeCa = implode(", ",$CoDeCa);
        return $mensajeCoDeCa;
    }*/
}
