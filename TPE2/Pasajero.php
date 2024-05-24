<?php
class Pasajero
{
    //atributos
    private $nombrePasajero;
    private $apellidoPasajero;
    private $documentoPasajero;
    private $telefonoPasajero;
    private $asientoPasajero;
    private $ticketPasajero;

    //Constructor clase Pasajeros
    public function __construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj, $asientoPasaj, $ticketPasaj)
    {
        $this->nombrePasajero = $nomPasaj;
        $this->apellidoPasajero = $apelPasaj;
        $this->documentoPasajero = $docuPasaj;
        $this->telefonoPasajero = $telePasaj;
        $this->asientoPasajero = $asientoPasaj;
        $this->ticketPasajero = $ticketPasaj;
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
    public function getAsientoPasajero()
    {
        return $this->asientoPasajero;
    }
    public function getTicketPasajero()
    {
        return $this->ticketPasajero;
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
    public function setAsientoPasajero($asientoPasajero)
    {
        $this->asientoPasajero = $asientoPasajero;
    }
    public function setTicketPasajero($ticketPasajero)
    {
        $this->ticketPasajero = $ticketPasajero;
    }

    /* Método __toString
    * 
    * @return
    * */
    public function __toString()
    {
        //$mensaje  string

        $mensaje = "\nDatos del pasajero:" .
            "\nNombre: " . $this->getNombrePasajero() .
            "\nApellido: " . $this->getApellidoPasajero() .
            "\nNumero de documento: " . $this->getDocumentoPasajero() .
            "\nTeléfono: " . $this->getTelefonoPasajero() .
            "\nAsiento: " . $this->getAsientoPasajero() .
            "\nTicket: " . $this->getTicketPasajero() . "\n";

        return $mensaje;
    }

    /* Método para determinar el porcentaje de incremento aplicado a cada pasajero
    * 
    * @return
    * */
    public function darPorcentajeIncremento()
    {
        //$incremento int

        $incremento = 0.10;

        return $incremento;
    }
}
