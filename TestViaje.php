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
include_once './Viaje.php';
include_once './Pasajero.php';
include_once './ResponsableV.php';


/* Función para mostrar el menú principal
 *
 * 
 * */
function menuPrincipal()
{
    //$mensaje string
    //$separador string

    $separador = "------------------------------------------------------\n";
    $mensaje = "Transporte de Pasajeros “Viaje Feliz”\n
¿Qué operación desea realizar?\n
1 - Cargar un nuevo viaje.
2 - Modificar un viaje existente
3 - Ver los datos de un viaje
4 - Salir\n";

    echo $separador . $mensaje . $separador;
}

/* Función para mostrar el submenú para cargar un viaje
 *
 * 
 * */
function menuNuevoViaje()
{
    //$mensaje string
    //$separador string

    $separador = "------------------------------------------------------\n";
    $mensaje = "Ha seleccionado cargar un nuevo viaje.
Debe ingresar los siguientes datos:\n
- Código del viaje.
- Destino
- Cantidad de pasajeros
- Datos de los pasajeros
- Datos del responsable del viaje\n";

    echo $mensaje . $separador;
}

/* Función para mostrar el submenú del pasajero
 *
 * 
 * */
function menuPasajeros()
{
    //$mensaje string
    //$separador string

    $separador = "------------------------------------------------------\n";
    $mensaje = "Ingrese los datos del pasajero\n
1 - Nombre
2 - Apellido
3 - Numero de documento
4 - Teléfono\n";

    echo $mensaje . $separador;
}

/* Función para mostrar el submenú de modificación del pasajero
 *
 * 
 * */
function menuModPasajeros()
{
    //$mensaje string
    //$separador string

    $separador = "------------------------------------------------------\n";
    $mensaje = "Ingrese que desea modificar del pasajero\n
1 - Nombre
2 - Apellido
3 - Teléfono\n";

    echo $mensaje . $separador;
}

/* Función para modificar los datos del pasajero
 * 
 * @return array
 * */
function ingresarPasajero($cantidad)
{
    //$colPasajeros array 
    //$pasajero obj 
    //$control bool
    //$nombre, $apellido string
    //$cantidad, $dni, $telefono int 

    $colPasajeros = [];

    echo "Hay " . $cantidad . " pasajeros para ingresar\n";
    for ($i = 1; $i <= $cantidad; $i++) {
        $control = true;
        while ($control == true) {
            $pasajero = new Pasajero(null, null, null, null);
            echo "\nPasajero número " . $i . "\n";
            menuPasajeros();
            echo "1: ";
            $nombre = trim(fgets(STDIN));
            $pasajero->setNombrePasajero($nombre);
            echo "2: ";
            $apellido = trim(fgets(STDIN));
            $pasajero->setApellidoPasajero($apellido);
            echo "3: ";
            $dni = trim(fgets(STDIN));
            $pasajero->setDocumentoPasajero($dni);
            echo "4: ";
            $telefono = trim(fgets(STDIN));
            $pasajero->setTelefonoPasajero($telefono);
            $control = pasajeroRepetido($colPasajeros, $pasajero);

            if ($control == false) {
                array_push($colPasajeros, $pasajero);
            }
        }
    }
    return $colPasajeros;
}

/* Función para determinar si un pasajero ya existe
 * 
 * @return bool
 * */
function pasajeroRepetido($colPasajero, $objPasajero)
{
    $verificador = false;
    $r = 0;
    if ($colPasajero == null) {
        $verificador = false;
    } else {
        while ($r < count($colPasajero) && $verificador == false) {
            if ($colPasajero[$r]->getDocumentoPasajero() != $objPasajero->getDocumentoPasajero()) {
                $r++;
                $verificador = false;
            } else {
                echo "El pasajero ya existe, ingrese otra persona: ";
                $verificador = true;
            }
        }
    }
    return $verificador;
}


/* Función para mostrar el submenú del responsable del viaje
 *
 * 
 * */
function menuResponsable()
{
    //$mensaje string
    //$separador string

    $separador = "------------------------------------------------------\n";
    $mensaje = "Ingrese los datos del responsable del viaje\n
1 - Nombre
2 - Apellido
3 - Numero de empleado
4 - Número de licencia\n";

    echo $mensaje . $separador;
}


/* Función para modificar los datos del responsable
 * 
 * @return array
 * */
function ingresarResponsable()
{
    //$datosResponsable obj 
    //$nombre, $apellido string
    //$numEmpleado, $numLicencia int 

    $datosResponsable = new ResponsableV(null, null, null, null);
    menuResponsable();
    echo "1: ";
    $nombre = trim(fgets(STDIN));
    $datosResponsable->setNombreResponsable($nombre);
    echo "2: ";
    $apellido = trim(fgets(STDIN));
    $datosResponsable->setApellidoResponsable($apellido);
    echo "3: ";
    $numEmpleado = trim(fgets(STDIN));
    $datosResponsable->setNumeroResponsable($numEmpleado);
    echo "4: ";
    $numLicencia = trim(fgets(STDIN));
    $datosResponsable->setLicenciaResponsable($numLicencia);

    return $datosResponsable;
}

/* Creación de viajes predefinidos
 * 
 * @return obj
 * */
function predefinidos()
{
    $pasajero1 = new Pasajero("Homero", "Simpson", 22333444, 15111222);
    $pasajero2 = new Pasajero("Ned", "Flanders", 24555666, 15777888);
    $pasajero3 = new Pasajero("Juan", "Topo", 9111222, 4412345);

    $responsable1 = new ResponsableV("Seymour", "Skinner", 1, 100);
    $responsable2 = new ResponsableV("Troy", "McClure", 2, 200);

    $pasajerosViaje1 = [$pasajero1, $pasajero2, $pasajero3];

    $viaje1 = new Viaje(1, "Shelbyville", 3, $pasajerosViaje1, $responsable1);
    $viaje2 = new Viaje(3, "Springfield", 2, [$pasajero1, $pasajero2], $responsable2);
    $viajes = [$viaje1, $viaje2];

    return $viajes;
}

/* Selector de viajes
 * 
 * @return obj
 * */
function selectorViajes($lista)
{
    echo "Hay " . count($lista) . " viajes, ingrese cual desea seleccionar: ";
    $viajeSeleccionado = trim(fgets(STDIN));
    while (
        is_numeric($viajeSeleccionado) == false || intval($viajeSeleccionado) < 1 ||
        $viajeSeleccionado + 1 > count($lista) + 1
    ) {
        echo "Ingrese un número válido: ";
        $viajeSeleccionado = trim(fgets(STDIN));
    }
    return $lista[$viajeSeleccionado - 1];
}

/* Modificador de viajes
 * 
 * @return 
 * */
function modificadorViajes($viaje)
{
    menuModViaje();
    $modSeleccionado = trim(fgets(STDIN));
    while (
        is_numeric($modSeleccionado) == false || intval($modSeleccionado) < 1 ||
        intval($modSeleccionado) > 4
    ) {
        echo "Ingrese un número válido: ";
        $modSeleccionado = trim(fgets(STDIN));
    }
    switch ($modSeleccionado) {
        case 1:
            echo "Código actual: " . $viaje->getCodigoViaje() . "\nIngrese el nuevo código: ";
            $codigoNuevo = trim(fgets(STDIN));
            $viaje->setCodigoViaje($codigoNuevo);
            echo "Su viaje ha sido modificado, el código actualmente es:";
            echo $viaje->getCodigoViaje();
            break;
        case 2:
            echo "Destino actual: " . $viaje->getDestinoViaje() . "\nIngrese un nuevo destino: ";
            $destinoNuevo = trim(fgets(STDIN));
            $viaje->setDestinoViaje($destinoNuevo);
            echo "Su viaje ha sido modificado, el destino actualmente es:";
            echo $viaje->getDestinoViaje();
        case 3:
            echo "Pasajeros actuales:";
            echo $viaje->mensajePasajeros();
            echo "Opciones:\n" . "1 - Agregar pasajero.\n" . "2 - Modificar pasajero\n";
            $opcionPasajero = trim(fgets(STDIN));
            switch ($opcionPasajero) {
                case 1:
                    break;
                case 2:
                    echo "¿Qué pasajero desea modificar?\n";
                    $pasajeroModifica = trim(fgets(STDIN));
                    while (
                        is_numeric($pasajeroModifica) == false || intval($pasajeroModifica) < 1 ||
                        intval($pasajeroModifica) > count($viaje->getColObjPasajeros())
                    ) {
                        echo "Ingrese un número válido: ";
                        $pasajeroModifica = trim(fgets(STDIN));
                    }
                    menuModPasajeros();
                    $modificandoPasajero = trim(fgets(STDIN));
                    while (
                        is_numeric($modificandoPasajero) == false || intval($modificandoPasajero) < 1 ||
                        intval($modificandoPasajero) > 3
                    ) {
                        echo "Ingrese un número válido: ";
                        $modificandoPasajero = trim(fgets(STDIN));
                    }
                    $viajePasajero = $viaje->getColObjPasajeros()[$pasajeroModifica - 1];
                    if ($modificandoPasajero == 1) {
                        echo "Nombre actual: " . $viajePasajero->getNombrePasajero() . "\n";
                        echo "Ingrese un nuevo nombre: ";
                        $nombreNuevo = trim(fgets(STDIN));
                        $viajePasajero->setNombrePasajero($nombreNuevo);
                        echo "Su nombre ha sido modificado a: " . $viajePasajero->getNombrePasajero() . "\n";
                    } elseif ($modificandoPasajero == 2) {
                        echo "Apellido actual: " . $viajePasajero->getApellidoPasajero() . "\n";
                        echo "Ingrese un nuevo apellido: ";
                        $apellidoNuevo = trim(fgets(STDIN));
                        $viajePasajero->setApellidoPasajero($apellidoNuevo);
                        echo "Su apellido ha sido modificado a: " . $viajePasajero->getApellidoPasajero() . "\n";
                    } else {
                        echo "Teléfono actual: " . $viajePasajero->getTelefonoPasajero() . "\n";
                        echo "Ingrese un nuevo teléfono: ";
                        $telefonoNuevo = trim(fgets(STDIN));
                        $viajePasajero->setTelefonoPasajero($telefonoNuevo);
                        echo "Su teléfono ha sido modificado a: " . $viajePasajero->getTelefonoPasajero() . "\n";
                    }
                    break;
            }
        case 4:
            echo "Encargado actual: " . $viaje->getObjResponsableV() . "\nIngrese un nuevo encargado: ";

            $responsableMod = ingresarResponsable();
            $viaje->setObjResponsableV($responsableMod);
            echo "Su viaje ha sido modificado, el responsable actualmente es:\n";
            echo $viaje->getObjResponsableV();
    }
}

/* Función para mostrar el submenú para modificar un viaje
 *
 * 
 * */
function menuModViaje()
{
    //$mensaje string
    //$separador string

    $separador = "------------------------------------------------------\n";
    $mensaje = "Ha seleccionado modificar un viaje.
¿Qué desea modificar?
1 - Código del viaje.
2 - Destino
3 - Pasajeros
4 - Datos del responsable del viaje\n";

    echo $mensaje . $separador;
}


//Ejecución del programa
menuPrincipal();
echo "Ingrese su opción: ";
$opciones = trim(fgets(STDIN));
$listaViajes = predefinidos();
switch ($opciones) {
    case 1:
        $viajeNuevo = new Viaje(null, null, null, [], null);
        menuNuevoViaje();

        //Código
        echo "Código: ";
        $codigoViaje = trim(fgets(STDIN));
        $viajeNuevo->setCodigoViaje($codigoViaje);

        //Destino
        echo "Destino: ";
        $destino = trim(fgets(STDIN));
        $viajeNuevo->setDestinoViaje($destino);

        //Cantidad de pasajeros
        echo "Cantidad de pasajeros: ";
        $cantidadPasajeros = trim(fgets(STDIN));
        while (is_numeric($cantidadPasajeros) == false || intval($cantidadPasajeros) < 0) {
            echo "Ingrese un número válido: ";
            $cantidadPasajeros = trim(fgets(STDIN));
        }
        $cantidadPasajeros = intval($cantidadPasajeros);
        $viajeNuevo->setCantidadMaxPasajeros($cantidadPasajeros);

        //Datos de pasajero/s
        $cantPasajeros = $viajeNuevo->getCantidadMaxPasajeros();
        $listadoPasajeros = ingresarPasajero($cantidadPasajeros);
        $viajeNuevo->setColObjPasajeros($listadoPasajeros);

        //Datos responsable del viaje
        $datosResponsable = ingresarResponsable();
        $viajeNuevo->setObjResponsableV($datosResponsable);

        //Muestra viaje ingresado
        echo "\nUsted ha ingresado el siguiente viaje:";
        echo $viajeNuevo->__toString();

        //Incorpora el viaje creado al listado de viajes
        array_push($listaViajes, $viajeNuevo);
        break;
    case 2:
        $objViajeSelec = selectorViajes($listaViajes);
        modificadorViajes($objViajeSelec);

        break;
    case 3:
        $viajeMuestra = selectorViajes($listaViajes);
        echo $viajeMuestra->__toString();
        break;
    case 4:
        echo "Hasta luego\nMuchas gracias";
    default:
        echo "No ha seleccionado una opción válida\nHasta luego\nMuchas gracias";
}
