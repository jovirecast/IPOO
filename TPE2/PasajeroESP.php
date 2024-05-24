<?php
class PasajeroESP extends Pasajero
{

    //Atributos
    private $sillaRuedas;
    private $asistenciaNecesaria;
    private $comidasEspeciales;

    //Constructor clase ResponsableV
    public function __construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj, $asientoPasaj, $ticketPasaj, $sillaRuedas, $asistenciaNecesaria, $comidasEspeciales)
    {
        parent::__construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj, $asientoPasaj, $ticketPasaj);

        $this->sillaRuedas = $sillaRuedas;
        $this->asistenciaNecesaria = $asistenciaNecesaria;
        $this->comidasEspeciales = $comidasEspeciales;
    }

    //Getters
    public function getSillasRuedas()
    {
        return $this->sillaRuedas;
    }
    public function getAsistenciaNecesaria()
    {
        return $this->asistenciaNecesaria;
    }
    public function getComidasEspeciales()
    {
        return $this->comidasEspeciales;
    }

    //Setters
    public function setSillasRuedas($sillaRuedas)
    {
        $this->sillaRuedas = $sillaRuedas;
    }
    public function setAsistenciaNecesaria($asistenciaNecesaria)
    {
        $this->asistenciaNecesaria = $asistenciaNecesaria;
    }
    public function setComidasEspeciales($comidasEspeciales)
    {
        $this->comidasEspeciales = $comidasEspeciales;
    }

    /* Método __toString
    * 
    * @return
    * */
    public function __toString()
    {
        //$mensaje  string

        $mensaje = parent::__toString() . 
            "Requiere sillas de ruedas: " . ucfirst(strtolower($this->getSillasRuedas())) .
            "\nNecesita asistencia para el embarque o desembarque: " . ucfirst(strtolower($this->getAsistenciaNecesaria())) .
            "\nComidas especiales o restricciones alimentarias: " . ucfirst(strtolower($this->getComidasEspeciales())) . "\n";

        return $mensaje;
    }

    public function darPorcentajeIncremento()
    {
        //$incremento int
        //$requiereSillas, $requiereAsistencia, $requiereEspeciales string

        $incremento = 0.15;
        $requiereSillas = strtolower($this->getSillasRuedas());
        $requiereAsistencia = strtolower($this->getAsistenciaNecesaria());
        $requiereEspeciales = strtolower($this->getComidasEspeciales());


        if ($requiereSillas != "no" && $requiereAsistencia != "no" && $requiereEspeciales != "no") {

            $incremento = 0.30;
        }

        return $incremento;
    }
}
