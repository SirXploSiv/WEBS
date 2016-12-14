<?php
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
        function __construct() {  
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
        
        
        //FUNCION , COMPRUEBA SI EL USUARIO EXISTE Y SU PASSWORD ES LA CORRESPONDIENTE. 
        public function checkUser($username,$password) {
            $result = pg_query("SELECT * FROM usuari WHERE username='".$username."' AND password_hash='".$password."'");
            return (pg_num_rows($result)!= 1) ? false : true;
        }

        public function getAllUsers() {
             return pg_query("SELECT DISTINCT * FROM usuari ORDER BY id");
        }

        
    }
?>
