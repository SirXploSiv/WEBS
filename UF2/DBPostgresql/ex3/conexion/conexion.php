<?php
    //$conexion = new Conexion();
   // $conexion->connect();
    //$ssoo = unserialize($_COOKIE['ssooFilterCookie']);
    //var_dump($ssoo);
    //$result = $conexion->getMultiFilter($ssoo);
    //$conexion->closeConnection();


    class Conexion {
        //CONEXIÓN
        private $pgsql_conn;
        //REPORTE 
        public $message_log;
        //CONFIGURACION_PARA_PG_CONNECT
        const HOST = 'localhost';
        const PORT = '5432';
        const DBNAME = 'test';
        const USER = 'test';
        const PASSWORD = 'test';
        #Operadores de resolución de ambito '::' , para obtener el valor de una constante en la misma clase (self) en una superior (parent).
        const CONNECT_PARAMETERS = 'host='.self::HOST.' port='.self::PORT.' dbname='.self::DBNAME.' user='.self::USER.' password='.self::PASSWORD;
        
        //CONSTRUCTOR
        function __construct() {}

        function connect() {
            //ABRIR UNA CONEXIÓN POSTGRESQL
            try {
                $this->pgsql_conn = pg_pconnect(self::CONNECT_PARAMETERS) or die("No se pudo conectar");
            } catch (Exception $e) {
                $this->message_log = $e->getMessage();
            }      
        }

        //DEVUELVE EL ESTADO DE LA CONEXIÓN
        function statusConnection() {
             return ( pg_connection_status($this->pgsql_conn) === PGSQL_CONNECTION_OK ) ? 'Conectado' : 'Desconectado';
        }
        //CIERRA LA CONEXION 
        public function closeConnection() {
            #Permite saber si la conexión esta ocupada o no
            if (pg_connection_busy($this->pgsql_conn)) {
                if(!pg_close($this->pgsql_conn)) {
                    $this->message_log = 'message_log: <strong>No</strong> se ha cerrado la conexión.';
                } else {
                    $this->message_log = 'message_log: Se ha cerrado la conexión con la base de datos , se encontraba saturada.';
                }
            #Obtener estado de la conexión
            } else if ( pg_connection_status($this->pgsql_conn) === PGSQL_CONNECTION_OK) {
                if(!pg_close($this->pgsql_conn)) {
                    $this->message_log = 'message_log: <strong>No</strong> se ha cerrado la conexión.';
                } else {
                    $this->message_log = 'message_log: Se ha cerrado la conexión con exito.';
                }      
            #No se ha podido cerrar          
            } else {
               $this->message_log = 'message_log: No ha cerrado la conexión , motivo desconocido.';
            }
        }
        
        
        //FUNCION , DEVUELVE EL RESULTADO CON TODAS LAS TABLETS EXISTENTES
        public function getAllTauleta() {
             return pg_query("SELECT * FROM TAULETA JOIN SO ON TAULETA.ID = SO.ID ORDER BY TAULETA.ID");
        }

        public function getTauletaByPrice($precio) {
             if ($precio>800) {
                return pg_query("SELECT * FROM tauleta JOIN SO ON TAULETA.ID = SO.ID AND TAULETA.preu > ".$precio);
             } else {
                return pg_query("SELECT * FROM tauleta JOIN SO ON TAULETA.ID = SO.ID AND TAULETA.preu < ".$precio);
             }             
        }

        public function getTauletaByMarca($marca) {
            return pg_query("SELECT * FROM tauleta JOIN SO ON TAULETA.ID = SO.ID AND TAULETA.marca = '".$marca."'");
        }

        public function getMultiFilter($ssoo) {
            $in = "";
            foreach ($ssoo as $so) {
                $in .= "'".$so."',";
            }
            $in = substr($in, 0, -1);
            //print_r($in);
            //echo "SELECT * FROM tauleta WHERE ssoo IN (".$in.")";
            return pg_query("SELECT * FROM TAULETA JOIN SO ON TAULETA.ID = SO.ID AND SO.SSOO IN (".$in.")");
        }

        public function getAllSSOO() {
            return pg_query("SELECT * FROM so ORDER BY id");
        }
        
         public function getTauletaByMarcaSort($marca,$sort) {
            return pg_query("SELECT * FROM tauleta JOIN SO ON TAULETA.ID = SO.ID AND TAULETA.marca = '".$marca."'"." ORDER BY TAULETA.marca ".$sort);
        }

        public function getTauletaByPriceSort($precio,$sort) {
             if ($precio>800) {
                return pg_query("SELECT * FROM tauleta JOIN SO ON TAULETA.ID = SO.ID AND TAULETA.preu > ".$precio." ORDER BY TAULETA.preu ".$sort);
             } else {
                return pg_query("SELECT * FROM tauleta JOIN SO ON TAULETA.ID = SO.ID AND TAULETA.preu < ".$precio." ORDER BY TAULETA.preu ".$sort);
             }             
        }
        
    }
?>
