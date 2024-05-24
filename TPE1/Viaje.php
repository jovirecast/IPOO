<?php
class Viaje
{
    //Atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantidadMaxPasajeros;
    private $colObjPasajeros;
    private $objResponsableV;


    //Construct clase Viaje
    public function __construct($codViaje, $destViaje, $cantMaxPasa, $colObjPasa, $objRespV)
    {
        $this->codigoViaje = $codViaje;
        $this->destinoViaje = $destViaje;
        $this->cantidadMaxPasajeros = $cantMaxPasa;
        $this->colObjPasajeros = $colObjPasa;
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
    public function getColObjPasajeros()
    {
        return $this->colObjPasajeros;
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
    public function setColObjPasajeros($colObjPasajeros)
    {
        $this->colObjPasajeros = $colObjPasajeros;
    }
    public function setObjResponsableV($objResponsableV)
    {
        $this->objResponsableV = $objResponsableV;
    }

    //métodos

    /* Método para incorprar los datos de un pasajero
    * 
    * @return 
    * */
    public function ingresarPasajeros($datosPasajero)
    {
        $cantidad = $this->getCantidadMaxPasajeros();

        $arregloPasajeros = [];
        for ($i = 1; $i <= $cantidad; $i++) {
            $pasajero = new Pasajero(null, null, null, null);
            $pasajero->setNombrePasajero($datosPasajero[$i][0]);
            $pasajero->setApellidoPasajero($datosPasajero[$i][1]);
            $pasajero->setDocumentoPasajero($datosPasajero[$i][2]);
            $pasajero->setTelefonoPasajero($datosPasajero[$i][3]);
            array_push($arregloPasajeros, $pasajero);
        }
        $this->setColObjPasajeros($arregloPasajeros);
    }

    /* Método para incorprar los datos de un pasajero
    * 
    * @return 
    * */
    public function ingresarResponsable($datosResponsable)
    {
        $responsableV = new ResponsableV(null, null, null, null);

        $responsableV->setNombreResponsable($datosResponsable[0]);
        $responsableV->setApellidoResponsable($datosResponsable[1]);
        $responsableV->setNumeroResponsable($datosResponsable[2]);
        $responsableV->setLicenciaResponsable($datosResponsable[3]);

        $this->setObjResponsableV($responsableV);
    }

    /* Método para mostrar la colección de objetos de pasajeros
    * 
    * @return string
    * */
    public function mensajePasajeros()
    {
        //$mensajeColPasa $separador string
        //$colObjToString array

        $colObjToString = $this->getColObjPasajeros();
        $separador = "------------------------------------------------------\n";
        $mensajeColPasa = "\n";

        for ($i = 0; $i < count($colObjToString); $i++) {

            $mensajeColPasa = $mensajeColPasa . "Pasajero " . $i+1 . 
            $colObjToString[$i]->__toString() . $separador;
        }

        return $mensajeColPasa;
    }

    /* Método __toString
    * 
    * @return
    * */
    public function __toString()
    {
        //$mensaje $separador  string
        $separador = "------------------------------------------------------";
        $mensaje = "\nDatos del viaje:" .
            "\nCódigo: " . $this->getCodigoViaje() .
            "\nDestino: " . $this->getDestinoViaje() .
            "\nCantidad máxima de pasajeros: " . $this->getCantidadMaxPasajeros() .
            "\nPasajeros: \n" . $separador . $this->mensajePasajeros().
            $this->getObjResponsableV()->__toString();

        return $mensaje;
    }
}
