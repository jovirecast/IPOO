<?php
/*
 
Adquirir un plan implica un contrato. Los contratos tienen la fecha de inicio, la fecha de vencimiento, el plan, un estado (al día, moroso, suspendido), un costo, si se renueva o no y una referencia al cliente que adquirió el contrato.
*/
class Contrato
{

     //ATRIBUTOS
     private $fechaInicio;
     private $fechaVencimiento;
     private $objPlan;
     private $estado;  //al día, moroso, suspendido
     private $costo;
     private $seRennueva;
     private $objCliente;

     //CONSTRUCTOR
     public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $costo, $seRennueva, $objCliente)
     {

          $this->fechaInicio = $fechaInicio;
          $this->fechaVencimiento = $fechaVencimiento;
          $this->objPlan = $objPlan;
          $this->estado = "AL DIA";
          $this->costo = $costo;
          $this->seRennueva = $seRennueva;
          $this->objCliente = $objCliente;
     }


     public function getFechaInicio()
     {
          return $this->fechaInicio;
     }

     public function setFechaInicio($fechaInicio)
     {
          $this->fechaInicio = $fechaInicio;
     }

     public function getFechaVencimiento()
     {
          return $this->fechaVencimiento;
     }

     public function setFechaVencimiento($fechaVencimiento)
     {
          $this->fechaVencimiento = $fechaVencimiento;
     }


     public function getObjPlan()
     {
          return $this->objPlan;
     }

     public function setObjPlan($objPlan)
     {
          $this->objPlan = $objPlan;
     }

     public function getEstado()
     {
          return $this->estado;
     }

     public function setEstado($estado)
     {
          $this->estado = $estado;
     }

     public function getCosto()
     {
          return $this->costo;
     }

     public function setCosto($costo)
     {
          $this->costo = $costo;
     }

     public function getSeRennueva()
     {
          return $this->seRennueva;
     }

     public function setSeRennueva($seRennueva)
     {
          $this->seRennueva = $seRennueva;
     }


     public function getObjCliente()
     {
          return $this->objCliente;
     }

     public function setObjCliente($objCliente)
     {
          $this->objCliente = $objCliente;
     }



     public function __toString()
     {
          //string $cadena
          $cadena = "Fecha inicio: " . $this->getFechaInicio() . "\n";
          $cadena = "Fecha Vencimiento: " . $this->getFechaVencimiento() . "\n";
          $cadena = $cadena . "Plan: " . $this->getObjPlan() . "\n";
          $cadena = $cadena . "Estado: " . $this->getEstado() . "\n";
          $cadena = $cadena . "Costo: " . $this->getCosto() . "\n";
          $cadena = $cadena . "Se renueva: " . $this->getSeRennueva() . "\n";
          $cadena = $cadena . "Cliente: " . $this->getObjCliente() . "\n";


          return $cadena;
     }

     /*
     En la clase contrato implementar el método  diasContratoVencido  ()  :   teniendo en cuenta la fecha actual
     y la fecha de fin del contrato, calcular la cantidad de días que el contrato lleva vencido o 0 en caso
     contrario. (Puede utilizar la Clase DateTime de PHP y la función Diff que calcula la cantidad de días entre
     fechas
     */

     public function diasContratoVencido()
     {
          $diasVencido = 0;
          $fechaActual = new DateTime();
          //$fechaActual = $fechaActual->format('Y-m-d');

          $vencimiento = $this->getFechaVencimiento();
   
          $diasDiferencia = date_diff($vencimiento, $fechaActual);

          if ($fechaActual > $vencimiento) {
               $diasDiferencia = $diasDiferencia->format('%a');
               if ($diasDiferencia > 0) {
                    $diasVencido = $diasDiferencia;
               }
          }



          return $diasVencido;
     }

     /*
     En la clase contrato implementar el método actualizarEstadoContrato  ()  :   que actualiza el estado del
     contrato según corresponda. (Utilizar el método diasContratoVencido )
     */

     public function actualizarEstadoContrato()
     {

          $estadoContrato = $this->diasContratoVencido();

          if ($estadoContrato > 0 && $estadoContrato <= 10) {
               $this->setEstado("MOROSO");
          } else if ($estadoContrato > 10) {
               $this->setEstado("SUSPENDIDO");
          }
     }

     /*
     Implementar y  redefinir  el método  calcularImporte() que retorna el importe final correspondiente al
     importe del contrato
     El importe final de un contrato realizado en la empresa se
     calcula sobre el importe del plan mas los importes parciales de cada uno de los canales que lo forman. Si se trata
     de un contrato realizado via web al importe del mismo se le aplica un porcentaje de descuento que por defecto es
     del 10%.
     Si el contrato esta al día, se renovará
     por un mes mas abonando el importe pactado. Si el contrato está en estado moroso, se cobrará una multa que
     sera un incremento del  10% del valor pactado por la cantidad de días en mora, además su estado se actualizará
     al valor al día y se renovará. Finalmente si el estado del contrato es suspendido se cobrará la misma multa de un
     contrato moroso pero  no se permitirá su renovación

     */

     public function calcularImporte()
     {
     }
}
