<?php
class Torneo
{

    //atributos
    private $colObjPartido;
    private $importePremio;


    //Constructor clase Pasajeros
    public function __construct($colObjPartido, $importePremio)
    {
        $this->colObjPartido = $colObjPartido;
        $this->importePremio = $importePremio;
    }

    //Getters
    public function getColObjPartido()
    {
        return $this->colObjPartido;
    }
    public function getImortePremio()
    {
        return $this->importePremio;
    }


    //Setters
    public function setColObjPartido($colObjPartido)
    {
        $this->colObjPartido = $colObjPartido;
    }
    public function setImortePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }


    /* Método que crea y retorna la instancia de la clase Partido que corresponda y almacena en la coleccion de partidos del torneo. Verifica que los dos equipos tengan la misma categoria e igual cantidad de jugadores, sino no lo registra.
    * 
    * @return array
    * */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
    {
        $coleccionPartidos = $this->getColObjPartido();
        $cantPartido = count($this->getColObjPartido()) + 1;
        $cantJugadores = $OBJEquipo1->getCantJugadores() + $OBJEquipo2->getCantJugadores();
        $tipoPartido = strtolower($tipoPartido);
        //$categoriaE1 = $OBJEquipo1->getObjCategoria()->getidcategoria();
        //$categoriaE2 = $OBJEquipo2->getObjCategoria()->getidcategoria();
        $jugadoresE1 = $OBJEquipo1->getCantJugadores();
        $jugadoresE2 = $OBJEquipo2->getCantJugadores();
        if (/*$categoriaE1 == $categoriaE2 ||*/$jugadoresE1 == $jugadoresE2) {
            if ($tipoPartido == 'basquetbol') {
                $partidoNuevo = new Partido($cantPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, $tipoPartido);
                array_push($coleccionPartidos, $partidoNuevo);
                $this->setColObjPartido($coleccionPartidos);
            } elseif ($tipoPartido == 'Futbol') {
                $partidoNuevo = new Partido($cantPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, $tipoPartido);
                array_push($coleccionPartidos, $partidoNuevo);
                $this->setColObjPartido($coleccionPartidos);
            }
        }
    }

    /* Método que recibe por parámetro si se
    trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
    * 
    * @return array
    * */
    public function darGanadores($deporte)
    {
        $equiposGanadores = [];
        $equipoGanador = [];
        $partidos = $this->getColObjPartido();

        foreach ($partidos as $objPartidos) {
            if ($objPartidos->getTipoPartido() == $deporte) {
                $equipoGanador = $this->getColObjPartido()->darEquipoGanador();
                array_push($equiposGanadores, $equipoGanador);
            }
        }
        return $equiposGanadores;
    }

    /* Método que debe retornar un arreglo asociativo
    donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configuradopara el torneo. (premioPartido = Coef_partido * ImportePremio)
    * 
    * @return array
    * */

    public function calcularPremioPartido($OBJPartido){

        $premio = $this->getImortePremio();
        $partidoGanado = $OBJPartido->darEquipoGanador();
        $premioPartido = array();

        array_push($premioPartido, $premio, $partidoGanado); 

        return $premioPartido;
    }


    private function echoPartidos(){
    
    $partidos = $this->getColObjPartido();

        foreach ($partidos as $partido){
        $partido->__toString();
    }
}

    public function __toString()
    {
        //string $cadena
        $cadena = "Partidos: " . $this->echoPartidos()       
         . "\n";
        $cadena = $cadena . "Premio: ". $this->getImortePremio() . "\n";
        return $cadena;
    }
}
