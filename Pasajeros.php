<?php
class Pasajero
{

    //atributos
    private $nombrePasajero;
    private $apellidoPasajero;
    private $documentoPasajero;
    private $telefonoPasajero;

    //Constructor clase Pasajeros
    public function __construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj)
    {
        $this->nombrePasajero = $nomPasaj;
        $this->apellidoPasajero = $apelPasaj;
        $this->documentoPasajero = $docuPasaj;
        $this->telefonoPasajero = $telePasaj;
    }

    //Getters
    public function getNombrePasajero()
    {
        return $this->nombrePasajero;
    }
    public function getApellidoPasajero()
    {
        return $this->apellidoPasajero;
    }
    public function getDocumentoPasajero()
    {
        return $this->documentoPasajero;
    }
    public function getTelefonoPasajero()
    {
        return $this->telefonoPasajero;
    }

    //Setters
    public function setNombrePasajero($nombrePasajero)
    {
        $this->nombrePasajero = $nombrePasajero;
    }
    public function setApellidoPasajero($apellidoPasajero)
    {
        $this->apellidoPasajero = $apellidoPasajero;
    }
    public function setDocumentoPasajero($documentoPasajero)
    {
        $this->documentoPasajero = $documentoPasajero;
    }
    public function setTelefonoPasajero($telefonoPasajero)
    {
        $this->telefonoPasajero = $telefonoPasajero;
    }

        /* Método __toString
    * 
    * @return
    * */
    public function __toString()
    {
        //$mensaje  string

        $mensaje = "\nDatos del pasajero:".
        "\nNombre: " . $this->getNombrePasajero() .
            "\nApellido: " . $this->getApellidoPasajero() .
            "\nNumero de documento: " . $this->getDocumentoPasajero() .
            "\nTeléfono: " . $this->getTelefonoPasajero() . "\n";

        return $mensaje;
    }

}
