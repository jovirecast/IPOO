<?php

class ContratoWeb extends Contrato
{

    /*
De un contrato realizado via web se guarda el porcentaje
de descuento y tiene un cálculo de costo diferente. El importe final de un contrato realizado en la empresa se
calcula sobre el importe del plan mas los importes parciales de cada uno de los canales que lo forman. Si se trata
de un contrato realizado via web al importe del mismo se le aplica un porcentaje de descuento que por defecto es
del 10%. */

    private $porcentajeDescuento;


    //CONSTRUCTOR

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRennueva, $objCliente, $tipoContrato)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRennueva, $objCliente, $tipoContrato);
        $this->porcentajeDescuento = 0.10;

    }

    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;

        return $this;
    }


    public function tipoContratoTexto(){
        $tipo = $this->getTipoContrato();
        $mensaje = "";
        if ($tipo == true){
            $mensaje = "Si";
        }
        return $mensaje;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena +=
            "Descuento: " . $this->getPorcentajeDescuento() .
            "\nContrato es via web: " . $this->tipoContratoTexto();

        return $cadena;
    }

    /*
    Implementar y  redefinir el método calcularImporte() que retorna el importe final correspondiente al importe del contrato
    */

    public function calcularImporte()
    {

        $plan = parent::getObjPlan();

        $importePlan = $plan->getImporte();

        $canales = $plan->getColCanales();

        $importeCanales = [];
        foreach ($canales as $canal) {
            $costoCanal = $canal->getImporte();
            array_push($importeCanales, $costoCanal);
        }

        $descuento = $this->getPorcentajeDescuento();

        parent::actualizarEstadoContrato();
        $estadoCobro = parent::getEstado();

        switch ($estadoCobro) {
            case "AL DIA":
                $multa = 0;
                break;
            case "MOROSO":
                $multa = 0.1;
                break;
            case "SUSPENDIDO":
                $multa = 0.1;
                parent::setSeRennueva("NO");
                break;
        }

        $importeFinal = $importePlan + $importeCanales;        
        $importeFinal = $importeFinal + ($importeFinal * $multa);
        $importeFinal = $importeFinal + ($importeFinal * $descuento);

        return $importeFinal;
    }
}
