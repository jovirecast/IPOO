<?php
class ResponsableV
{

    //Atributos
    private $nombreResponsable;
    private $apellidoResponsable;
    private $numeroResponsable;
    private $licenciaResponsable;

    //Constructor clase ResponsableV
    public function __construct($nomRes, $apeRes, $numRes, $licRes)
    {
        $this->nombreResponsable = $nomRes;
        $this->apellidoResponsable = $apeRes;
        $this->numeroResponsable = $numRes;
        $this->licenciaResponsable = $licRes;
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

    /* Método __toString
    * 
    * @return
    * */
    public function __toString()
    {
        //$mensaje  string

        $mensaje = "Responsable del viaje:".
        "\nNombre: " . $this->getNombreResponsable() .
            "\nApellido: " . $this->getApellidoResponsable() .
            "\nNumero de empleado: " . $this->getNumeroResponsable() .
            "\nNúmero de licencia: " . $this->getLicenciaResponsable() . "\n";

        return $mensaje;
    }
}
