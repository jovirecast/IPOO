<?php
include_once('./Canal.php');
include_once('./Cliente.php');
include_once('./Contrato.php');
include_once('./ContratoWeb.php');
include_once('./ContratoEmpresa.php');
include_once('./EmpresaCable.php');
include_once('./Plan.php');


//$hoy = new DateTime();
//echo $hoy->format("Y-m-d");

//7a Se crea 1 instancia de la clase Empresa_Cable.
$empresaN1 = new EmpresaCable([],[]);

//print_r($empresaN1);

//7b Se crean 3 instancias de la clase Canal.

$canal1 = new Canal("noticias",80,"No","No");
$canal2 = new Canal("películas",100,"Si","Si");
$canal3 = new Canal("deportivo",150,"Si","Si");

/*echo $canal1;
echo $canal2;
echo $canal3;*/

/*
7c) Se crean 2 instancias de la clase Planes, cada una de ellas con su código propio que hacen 
referencia a los canales creados anteriormente (uno de los códigos de plan debe ser 111).
*/

$plan1 = new Plan(222,[$canal1,$canal2,$canal3],330);
$plan2 = new Plan(111,[$canal1,$canal2,$canal3],330);
/*echo $plan1;
echo $plan2;*/

/*7d) Crear una instancia de la clase Cliente */

$cliente = new Cliente("Consumidor Final","30-12300555-0","Italia 90");

//echo $cliente;

/*7e) Se crean 3 instancias de Contratos, 1 correspondiente a un contrato realizado en la empresa y 2 
realizados via web.*/

$contrato1 = new Contrato("2024-06-10","2024-07-10",$plan2,null,"Si",$cliente,false);
$contrato2 = new Contrato("2024-06-08","2024-07-08",$plan2,null,"Si",$cliente,true);
$contrato3 = new Contrato("2024-06-12","2024-07-12",$plan1,null,"Si",$cliente,true);

//echo $contrato1;
echo $contrato2;
echo $contrato3;
/*7f) Invocar con cada instancia del inciso anterior al método calcularImporte y visualizar el resultado.*/

/*7g) Invocar al método incorporaPlan con uno de los planes creados en c).*/

/*7h) Invocar nuevamente al método incorporaPlan de la empresa con el plan creado en c).*/

/*7i) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c),
el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días 
para indicar el vencimiento del mismo y  false como último parámetro.*/

/*7j) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c), 
el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días 
para indicar el vencimiento del mismo y true como último parámetro.*/

/*7k) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y 
que haya sido contratado en la empresa. */

/*7l) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y 
que haya sido contratado vía web.*/

/*7m) invoca al método retornarImporteContratos con el código 111 */
