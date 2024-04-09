<?php
class ResponsableV
{

    //Atributos
    private $nombreEmpleado;
    private $apellidoEmpleado;
    private $numeroEmpleado;
    private $licenciaEmpleado;

    //Constructor clase ResponsableV
    public function __construct($nomEmp, $apeEmp, $numEmp, $licEmp)
    {
        $this->nombreEmpleado = $nomEmp;
        $this->apellidoEmpleado = $apeEmp;
        $this->numeroEmpleado = $numEmp;
        $this->licenciaEmpleado = $licEmp;
    }

    //Getters
    public function getNombreEmpleado()
    {
        return $this->nombreEmpleado;
    }
    public function getApellidoEmpleado()
    {
        return $this->apellidoEmpleado;
    }
    public function getNumeroEmpleado()
    {
        return $this->numeroEmpleado;
    }
    public function getLicenciaEmpleado()
    {
        return $this->licenciaEmpleado;
    }

    //Setters
    public function setNombreEmpleado($nombreEmpleado)
    {
        $this->nombreEmpleado = $nombreEmpleado;
    }
    public function setApellidoEmpleado($apellidoEmpleado)
    {
        $this->apellidoEmpleado = $apellidoEmpleado;
    }
    public function setNumeroEmpleado($numeroEmpleado)
    {
        $this->numeroEmpleado = $numeroEmpleado;
    }
    public function setLicenciaEmpleado($licenciaEmpleado)
    {
        $this->licenciaEmpleado = $licenciaEmpleado;
    }

    //Arreglo con datos de responsables
    public function ingresoDatosResponsable()
    {

        $responsablesViajes = [
            [
                "nombre" => $this->getNombreEmpleado(),
                "apellido" => $this->getApellidoEmpleado(),
                "numero" => $this->getNumeroEmpleado(),
                "licencia" => $this->getLicenciaEmpleado()
            ]
        ];

        return $responsablesViajes;
    }

    public function revisionRepeticionResponsable()
    {

        $tablaRevision = $this->ingresoDatosResponsable();
    }
}
