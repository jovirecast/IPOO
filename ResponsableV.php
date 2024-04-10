<?php
class ResponsableV
{

    //Atributos
    private $nombreResponsable;
    private $apellidoResponsable;
    private $numeroResponsable;
    private $licenciaResponsable;
    private $baseDatosResponsable;

    //Constructor clase ResponsableV
    public function __construct($nomRes, $apeRes, $numRes, $licRes)
    {
        $this->nombreResponsable = $nomRes;
        $this->apellidoResponsable = $apeRes;
        $this->numeroResponsable = $numRes;
        $this->licenciaResponsable = $licRes;
        $this->baseDatosResponsable = array();
    }

    //Getters
    public function getNombreResponsable()
    {
        return $this->nombreResponsable;
    }
    public function getApellidoResponsable()
    {
        return $this->apellidoResponsable;
    }
    public function getNumeroResponsable()
    {
        return $this->numeroResponsable;
    }
    public function getLicenciaResponsable()
    {
        return $this->licenciaResponsable;
    }
    public function getBaseDatosResponsable()
    {
        return $this->baseDatosResponsable;
    }

    //Setters
    public function setNombreResponsable($nombreResponsable)
    {
        $this->nombreResponsable = $nombreResponsable;
    }
    public function setApellidoResponsable($apellidoResponsable)
    {
        $this->apellidoResponsable = $apellidoResponsable;
    }
    public function setNumeroResponsable($numeroResponsable)
    {
        $this->numeroResponsable = $numeroResponsable;
    }
    public function setLicenciaResponsable($licenciaResponsable)
    {
        $this->licenciaResponsable = $licenciaResponsable;
    }
    public function setBaseDatosResponsable($baseDatosResponsable)
    {
        $this->baseDatosResponsable = $baseDatosResponsable;
    }

    //Arreglo con datos de responsables
    public function datosResponsable()
    {

        $responsablesViajes = [

            "nombre" => $this->getNombreResponsable(),
            "apellido" => $this->getApellidoResponsable(),
            "numero" => $this->getNumeroResponsable(),
            "licencia" => $this->getLicenciaResponsable()

        ];

        return $responsablesViajes;
    }

    public function almacenaDatosResponsable($respIng)
    {
        $baseDatosFinalResp = $this->getBaseDatosResponsable();
        array_push($baseDatosFinalResp, $respIng);
        $this->setBaseDatosResponsable($baseDatosFinalResp);
        return $baseDatosFinalResp;
    }
}
