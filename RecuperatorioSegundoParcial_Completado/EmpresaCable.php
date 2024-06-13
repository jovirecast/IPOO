<?php

class EmpresaCable
{

    /*Implementar la clase EmpresaCable que contiene una colección de planes y la colección de contratos
    realizados por la empresa. La clase cuenta con los siguientes métodos
    */

    private $colObjPlan;
    private $colObjContrato;

    public function __construct($colObjContrato, $colObjPlan)
    {
        $this->colObjContrato = [];
        $this->colObjPlan = [];
    }

    public function getColObjPlan()
    {
        return $this->colObjPlan;
    }

    public function setColObjPlan($colObjPlan)
    {
        $this->colObjPlan = $colObjPlan;

        return $this;
    }

    public function getColObjContrato()
    {
        return $this->colObjContrato;
    }

    public function setColObjContrato($colObjContrato)
    {
        $this->colObjContrato = $colObjContrato;

        return $this;
    }

    public function __toString()
    {
        $contratos = $this->getColObjContrato();
        $planes = $this->getColObjPlan();
        $cadena = "";
        foreach ($contratos as $contrato) {
            $cadena += $contrato->__toString();
        }
        foreach ($planes as $plan) {
            $cadena += $plan->__toString();
        }

        return $cadena;
    }


    /*
    Implementar la clase EmpresaCable que contiene una colección de planes y la colección de contratos realizados por la empresa. La clase cuenta con los siguientes métodos:
    incorporarPlan($objPlan): que incorpora a la colección de planes un nuevo plan siempre y 
    cuando no haya un plan con los mismos canales y los mismos MG (en caso de que el plan 
    incluyera).*/

    public function incorporarPlan($objPlan)
    {

        $nuevoPlanCanales = $objPlan->getColCanales();
        $nuevoPlanMG = $objPlan->getIncluyeMG();
        $planExistente = false;
        $i = 0;
        $planesActuales = $this->getColObjPlan();

        while ($planExistente == false && $i < count($planesActuales)) {
            $plan = $planesActuales[$i];
            $canales = $plan->getColCanales();
            $megas = $plan->getIncluyeMG();
            if ($nuevoPlanCanales == $canales && $nuevoPlanMG == $megas) {
                $planExistente = true;
            }
            $i++;
        }

        if ($planExistente == false) {
            array_push($planesActuales, $objPlan);

            $this->setColObjPlan($planesActuales);
        }
        return $planExistente;
    }

    /* incorporarContrato($objPlan,$objCliente,$fechaDesde,$fechaVenc,$esViaWeb)  : método 
    que recibe por parámetro el plan, una referencia al cliente, la fecha de inicio y de vencimiento del
    mismo y si se trata de un contrato realizado en la empresa o via web (si el valor del parámetro es
    True se trata de un contrato realizado via web)
    */

    public function incorporarContrato($objPlan, $objCliente, $fechaDesde, $fechaVenc, $esViaWeb)
    {

        $planIncorpora = $objPlan;
        $arrayContrato = $this->getColObjContrato();

        if ($esViaWeb == true) {
            $nuevoContrato = new ContratoWeb($fechaDesde, $fechaVenc, $planIncorpora, null, "SI", $objCliente, $esViaWeb);
            $importe = $nuevoContrato->calcularImporte();
            $nuevoContrato->setCosto($importe);
        } else {
            $nuevoContrato = new ContratoEmpresa($fechaDesde, $fechaVenc, $planIncorpora, null, "SI", $objCliente, $esViaWeb);
            $importe = $nuevoContrato->calcularImporte();
            $nuevoContrato->setCosto($importe);
        }

        array_push($arrayContrato, $nuevoContrato);
        $this->setColObjContrato($arrayContrato);
    }

    /*
    retornarImporteContratos($codigoPlan): método que recibe por parámetro el código de un 
    plan y retorna la suma de los importes de los contratos realizados usando ese plan

    */

    public function retornarImporteContratos($codigoPlan)
    {
        $importeContratos = 0;

        $colObjContrato = $this->getColObjContrato();
        foreach ($colObjContrato as $objContrato) {
            $codigoPlanContrato = $objContrato->getObjPlan()->getCodigo();
            if ($codigoPlan == $codigoPlanContrato) {
                $importeContratos += $objContrato->getCosto();
            }
        }

        return $importeContratos;
    }

    /*
    pagarContrato($objContrato): método recibe como parámetro un contrato, actualiza su estado
    y retorna el importe final que debe ser abonado por el cliente.
    */

    public function pagarContrato($objContrato)
    {

        $colObjContrato = $this->getColObjContrato();
        $contratoExiste = false;
        $i = 0;
        $importe = 0;

        while ($contratoExiste == false && $i < count($colObjContrato)) {
            $contratoExistente = $colObjContrato[$i];
            if ($contratoExistente == $objContrato) {
                $contratoExiste = true;
            }
            $i++;
        }

        if ($contratoExiste == true) {

            //$objContrato->actualizarEstadoContrato(); 
            //Actualización del estado se realiza en método calcularImporte();

            $importe = $objContrato->calcularImporte();
        }

        return $importe;
    }
}
