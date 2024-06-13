<?php

include_once('./Canal.php');
include_once('./Cliente.php');
include_once('./Contrato.php');
include_once('./ContratoWeb.php');
include_once('./ContratoEmpresa.php');
include_once('./EmpresaCable.php');
include_once('./Plan.php');

//7a
$empresaN1 = new EmpresaCable([],[]);

print_r($empresaN1);