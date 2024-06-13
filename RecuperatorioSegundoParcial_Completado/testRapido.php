<?php
include_once('./Canal.php');
include_once('./Cliente.php');
include_once('./Contrato.php');
include_once('./ContratoWeb.php');
include_once('./ContratoEmpresa.php');
include_once('./EmpresaCable.php');
include_once('./Plan.php');


$hoy = new DateTime();
$hoy = $hoy->setDate(2024, 06, 12);
$mesSiguiente = new DateTime();
$mesSiguiente = $mesSiguiente->setDate(2024, 07, 12);

//7a Se crea 1 instancia de la clase Empresa_Cable.
$empresaN1 = new EmpresaCable([], []);

//print_r($empresaN1);

//7b Se crean 3 instancias de la clase Canal.

$canal1 = new Canal("noticias", 80, "No", "No");
$canal2 = new Canal("películas", 100, "Si", "Si");
$canal3 = new Canal("deportivo", 150, "Si", "Si");

/*echo $canal1;
echo $canal2;
echo $canal3;*/

/*
7c) Se crean 2 instancias de la clase Planes, cada una de ellas con su código propio que hacen 
referencia a los canales creados anteriormente (uno de los códigos de plan debe ser 111).
*/

$plan1 = new Plan(222, [$canal1, $canal2, $canal3], 330);
$plan2 = new Plan(111, [$canal1, $canal2, $canal3], 330);
/*echo $plan1;
echo $plan2;*/

/*7d) Crear una instancia de la clase Cliente */

$cliente = new Cliente("Consumidor Final", "30-12300555-0", "Italia 90");

//echo $cliente;

/*7e) Se crean 3 instancias de Contratos, 1 correspondiente a un contrato realizado en la empresa y 2 
realizados via web.*/

$fechaIni1 = new DateTime();
$fechaIni1 = $fechaIni1->setDate(2024, 06, 06);
$fechaVen1 = new DateTime();
$fechaVen1 = $fechaVen1->setDate(2024, 07, 06);
$fechaIni2 = new DateTime();
$fechaIni2 = $fechaIni2->setDate(2024, 06, 01);
$fechaVen2 = new DateTime();
$fechaVen2 = $fechaVen2->setDate(2024, 07, 01);
$fechaIni3 = new DateTime();
$fechaIni3 = $fechaIni3->setDate(2024, 05, 06);
$fechaVen3 = new DateTime();
$fechaVen3 = $fechaVen3->setDate(2024, 06, 06);


$contrato1 = new ContratoEmpresa($fechaIni1, $fechaVen1, $plan2, 920, "Si", $cliente, false);
$contrato2 = new ContratoWeb($fechaIni2, $fechaVen2, $plan2, null, "Si", $cliente, true);
$contrato3 = new ContratoWeb($fechaIni3, $fechaVen3, $plan1, null, "Si", $cliente, true);

//echo $contrato1;
//echo $contrato2;
//echo $contrato3;

/*7f) Invocar con cada instancia del inciso anterior al método calcularImporte y visualizar el resultado.*/

$importe = $contrato1->calcularImporte();
//echo $importe . "\n";
$importe = $contrato2->calcularImporte();
//echo $importe . "\n";
$importe = $contrato3->calcularImporte();
//echo $importe . "\n";

/*7g) Invocar al método incorporaPlan con uno de los planes creados en c).*/

$empresaN1->incorporarPlan($plan1);
//print_r($empresaN1);

/*7h) Invocar nuevamente al método incorporaPlan de la empresa con el plan creado en c).*/

$empresaN1->incorporarPlan($plan1);
//print_r($empresaN1);

/*7i) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c),
el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días 
para indicar el vencimiento del mismo y  false como último parámetro.*/

$empresaN1->incorporarContrato($plan2,$cliente,$hoy,$mesSiguiente,false);


/*7j) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c), 
el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días 
para indicar el vencimiento del mismo y true como último parámetro.*/

$empresaN1->incorporarContrato($plan1,$cliente,$hoy,$mesSiguiente,true);
//print_r($empresaN1);

/*7k) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y 
que haya sido contratado en la empresa. */

$contratosEmpresa = $empresaN1->getColObjContrato();
array_push($contratosEmpresa,$contrato1);
$empresaN1->setColObjContrato($contratosEmpresa);
$importe = $empresaN1->pagarContrato($contrato1);
//echo $importe;

/*7l) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y 
que haya sido contratado vía web.*/

$contratosEmpresa = $empresaN1->getColObjContrato();
array_push($contratosEmpresa,$contrato3);
$empresaN1->setColObjContrato($contratosEmpresa);
$importe = $empresaN1->pagarContrato($contrato3);


/*7m) invoca al método retornarImporteContratos con el código 111 */

$importePlanes = $empresaN1->retornarImporteContratos("111");
echo $importePlanes. "\n";

