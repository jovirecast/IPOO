<?php
class Pasajeros
{

    //atributos
    private $nombrePasajero;
    private $apellidoPasajero;
    private $documentoPasajero;
    private $telefonoPasajero;
    private $baseDatosPasajero;

    //Constructor clase Pasajeros
    public function __construct($nomPasaj, $apelPasaj, $docuPasaj, $telePasaj)
    {
        $this->nombrePasajero = $nomPasaj;
        $this->apellidoPasajero = $apelPasaj;
        $this->documentoPasajero = $docuPasaj;
        $this->telefonoPasajero = $telePasaj;
        $this->baseDatosPasajero = array();
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
    public function getBaseDatosPasajero()
    {
        return $this->baseDatosPasajero;
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
    public function setBaseDatosPasajero($baseDatosPasajero)
    {
        $this->baseDatosPasajero = $baseDatosPasajero;
    }

    //Arreglos con datos de pasajeros
    public function datosPasajeros()
    {
        $datosPasajeros =
            [
                "nombre" => $this->getNombrePasajero(),
                "apellido" => $this->getApellidoPasajero(),
                "documento" => $this->getDocumentoPasajero(),
                "telefono" => $this->getTelefonoPasajero()
            ];

        return $datosPasajeros;
    }

    public function almacenaDatosPasajeros($pasIng)
    {
        $baseDatosFinalPasajero = $this->getBaseDatosPasajero();
        array_push($baseDatosFinalPasajero, $pasIng);
        $this->setBaseDatosPasajero($baseDatosFinalPasajero);
        return $baseDatosFinalPasajero;
    }

    public function revisarPasajeroRepetido($dniRepe)
    {
        $pasajRevision = $this->getBaseDatosPasajero();
        $cantidadPasajeros = count($pasajRevision);
        $repetidoDni = false;
        $recoDni = 0;
        while ($recoDni > $cantidadPasajeros && !$repetidoDni) {
            if ($pasajRevision[$recoDni]["documento"] == $dniRepe) {
                $repetidoDni = false;
            } elseif ($cantidadPasajeros == 1) {
                $repetidoDni = false;
            } else {
                $recoDni = $recoDni + 1;
                $repetidoDni = true;
            }
        }
        return $repetidoDni;
    }
}
