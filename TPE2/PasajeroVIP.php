<?php
class PasajeroVIP extends Pasajero
{

    //Atributos
    private $numeroViajeroFrecuente;
    private $millasPasajero;

    //Constructor clase ResponsableV
    public function __construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj, $asientoPasaj, $ticketPasaj, $numeroViajeroFrecuente, $millasPasajero)
    {
        parent::__construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj, $asientoPasaj, $ticketPasaj);

        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->millasPasajero = $millasPasajero;
    }

    //Getters
    public function getNumeroViajeroFrecuente()
    {
        return $this->numeroViajeroFrecuente;
    }
    public function getMillasPasajero()
    {
        return $this->millasPasajero;
    }

    //Setters
    public function setNumeroViajeroFrecuente($numeroViajeroFrecuente)
    {
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
    }
    public function setMillasPasajero($millasPasajero)
    {
        $this->millasPasajero = $millasPasajero;
    }

    /* Método __toString
    * 
    * @return
    * */
    public function __toString()
    {
        //$mensaje  string

        $mensaje = parent::__toString() . 
            "Numero de viajero frecuente: " . $this->getNumeroViajeroFrecuente() .
            "\nMillas acumuladas: " . $this->getMillasPasajero() . "\n";

        return $mensaje;
    }

    public function darPorcentajeIncremento()
    {
        //$incremento int

        $incremento = 0.35;

        if ($this->getMillasPasajero() > 300) {

            $incremento = 0.30;
        }

        return $incremento;
    }
}
