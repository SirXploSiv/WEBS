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
        const DBNAME = 'videoclub';
        const USER = 'postgres';
        const PASSWORD = 'postgres';
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
        
        
        //
        public function getAllSocis($username) {
            if (!empty($username)) {
                return pg_query("SELECT codsoci, login, password, dni, nom, cognoms, data_naixement,adreca, telefon, sexe FROM soci WHERE login='".$username."'");                
             } else {
                return pg_query("SELECT codsoci, login, password, dni, nom, cognoms, data_naixement,adreca, telefon, sexe FROM soci");
             }
        }

        public function checkSoci($username,$password) {
            return pg_num_rows(pg_query("SELECT codsoci FROM soci WHERE login='".$username."' AND password='".md5($password)."'"));
        }

        public function getPelicules() {
            return pg_query("SELECT * FROM pelicula");
        }

        public function getPeliculesLimit($limit,$offset) {
            return pg_query("SELECT * FROM pelicula ORDER BY titol LIMIT ".$limit." OFFSET ".$offset);
        }
        
        
    }
?>
