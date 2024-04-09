<?php

/*Importante: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.

La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 
Utilice clases y arreglos para almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. 
El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia,
nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. 
Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
De la misma forma cargue la información del responsable del viaje.

Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub. */

//incluir clases Viaje, Pasajero y ResponsableV
include './Viaje.php';
include './Pasajeros.php';
include './ResponsableV.php';

do {
    echo "Bienvenido, por favor elija una opción: \n";
    echo "1. Ingresar un nuevo viaje \n";
    echo "2. Modificar un viaje existente \n";
    echo "3. Ver un viaje existente \n";
    echo "4. Salir \n";
    $opcionMenu = trim(fgets(STDIN));
    $valOpcionMenu = is_numeric($opcionMenu);
    while ($opcionMenu <= 0 || $opcionMenu > 4 || !$valOpcionMenu) {
        echo "ingrese un número: ";
        $opcionMenu = trim(fgets(STDIN));
    }


    switch ($opcionMenu) {
        case 1:
            echo "ingrese los datos de su viaje:\n";
            echo "Código del viaje: ";
            $objViaje = new Viaje(null, null, null, null, null);
            $objViaje->setCodigoViaje(trim(fgets(STDIN)));
            echo "Destino del viaje: ";
            $objViaje->setDestinoViaje(trim(fgets(STDIN)));
            echo "cantidad máxima de pasajeros: ";
            $objViaje->setCantidadMaxPasajeros(trim(fgets(STDIN)));
            $cantidadMaxP = $objViaje->getCantidadMaxPasajeros();
            $valMaxP = is_numeric($cantidadMaxP);
            while (!$valMaxP) {
                echo "ingrese una cantidad válida: ";
                $objViaje->setCantidadMaxPasajeros(trim(fgets(STDIN)));
                $cantidadMaxP = $objViaje->getCantidadMaxPasajeros();
                $valMaxP = is_numeric($cantidadMaxP);
            }
            $objPasajeros = new Pasajeros(null, null, null, null);
            for ($iteraMaxP = 0; $iteraMaxP < $cantidadMaxP; $iteraMaxP++) {
                do {
                    echo "Datos del pasajero: \n";
                    echo "Nombre: ";
                    $nombrePa = trim(fgets(STDIN));
                    $objPasajeros->setNombrePasajero($nombrePa);
                    echo "Apellido: ";
                    $apellidoPa = trim(fgets(STDIN));
                    $objPasajeros->setApellidoPasajero($apellidoPa);
                    echo "Número de documento: ";
                    $documentoPa = trim(fgets(STDIN));
                    $controlRepeticion = $objPasajeros->revisarPasajeroRepetido($documentoPa);
                    if ($controlRepeticion == false) {
                        echo "El pasajero ya existe, por favor ingrese uno distinto: \n";
                    }
                } while (!$controlRepeticion);
                $objPasajeros->setDocumentoPasajero($documentoPa);
                echo "Teléfono de contacto: ";
                $telefonoPa = trim(fgets(STDIN));
                $objPasajeros->setTelefonoPasajero($telefonoPa);
                $pasajeroActual = $objPasajeros->datosPasajeros();
                $objPasajeros->almacenaDatosPasajeros($pasajeroActual);
            }
            print_r($objPasajeros->datosPasajeros());
            print_r($objPasajeros->getBaseDatosPasajero());
            break;
        case 2:
            break;
        case 3:

            break;
    }
} while ($opcionMenu <> 4);
