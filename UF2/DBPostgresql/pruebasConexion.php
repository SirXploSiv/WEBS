<?php 
    #BASE DE DATOS - TEMPLATE 1 --> REPLICA TODAS LAS TABLAS E BASE DE DATOS EN TODAS LAS DEMAS DB;
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    //CONFIGURACION
    //192.168.1.10
    define("HOST","localhost");
    define("PORT","5432");
    define("DBNAME","test");
    define("USER","test");
    define("PASSWORD","test");
    //CONFIGURACION_PARA_PG_CONNECT
    define("CONNECT_PARAMETERS","host=".HOST." port=".PORT." dbname=".DBNAME." user=".USER." password=".PASSWORD);
    //PG_CONNECT
    //Abrir una conexión a PostgreSQL
    $pgsql_conn = pg_pconnect(CONNECT_PARAMETERS) or die("No se pudo conectar");
    //PG_HOST
    //Returns the host name associated with the connection
    $host = pg_host($pgsql_conn);
    //PG_PORT
    //
    $port = pg_port($pgsql_conn);
    //PG_TTY
    // Return the TTY name associated with the connection
    $tty = pg_tty($pgsql_conn);
    //PG_OPTIONS
    //
    $options = pg_options($pgsql_conn);
    //PG_DBNAME
    //
    $dbname = pg_dbname($pgsql_conn);
    //PG_QUERY
    //La conexión no es necesaria pasarla como parametro
    $result = pg_query($pgsql_conn, "select * from usuari");
    //$result = pg_query($pgsql_conn, "SHOW STATUS WHERE 'variable_name' = 'Threads_connected' ");
    
    //pg_fetch_row()
    // Devuelve un vector : [0] , [1] , [2]
    while ($row = pg_fetch_row($result)) {
        echo $row[0]." - ".$row[1].'<br />';
    }

    //pg_fetch_array()
    //Devuelve un array asociativo;
    while ($row = pg_fetch_array($result)) {
        echo $row[0].'<br />';
    }
    
    var_dump(pg_fetch_all($result));
    
    //MOSTRAR  
    echo '<br /><br />ESTADO CONEXION: '.pg_connection_status($pgsql_conn).'<br />CONEXION : '.$pgsql_conn.'<br />HOST : '.$host.'<br />PORT : '.$port.'<br />TTY : '.$tty.'<br />OPTIONS : '.$options.'<br />DATABASE_NAME : '.$dbname.'<br />PING : '.pg_ping($pgsql_conn);
    //
    echo "<br />Conectado con éxito";
    //
    pg_close($pgsql_conn);
    #ALTER ROLE postgres WITH PASSWORD 'jupiter';
    #GRANT SELECT ON ALL TABLES IN SCHEMA public to videoclub;

    /*
    pg_affected_rows — Devuelve el número de registros afectados (filas)
    pg_cancel_query — Cancelar una consulta asíncrona
    pg_client_encoding — Obtiene la codificación del cliente
    pg_close — Cierra una conexión PostgreSQL
    pg_connect_poll — Poll the status of an in-progress asynchronous PostgreSQL connection attempt.
    pg_connect — Abrir una conexión a PostgreSQL
    pg_connection_busy — Permite saber si la conexión esta ocupada o no
    pg_connection_reset — Restablece conexión (reconectar)
    pg_connection_status — Obtener estado de la conexión
    pg_consume_input — Reads input on the connection
    pg_convert — Conviertir valores de un array asociativo en valores adcuados para sentencias SQL
    pg_copy_from — Insertar registros dentro de una tabla desde un array
    pg_copy_to — Copiar una tabla a un array
    pg_dbname — Obtiene el nombre de la base de datos
    pg_delete — Borra registros
    pg_end_copy — Sincronizar con PostgreSQL
    pg_escape_bytea — Escapar un string para insertarlo en un campo bytea
    pg_escape_identifier — Escape a identifier for insertion into a text field
    pg_escape_literal — Escape a literal for insertion into a text field
    pg_escape_string — Escape a string for query
    pg_execute — Envía una solicitud para ejecutar una setencia preparada con parámetros dados, y espera el resultado
    pg_fetch_all_columns — Fetches all rows in a particular result column as an array
    pg_fetch_all — Fetches all rows from a result as an array
    pg_fetch_array — Fetch a row as an array
    pg_fetch_assoc — Fetch a row as an associative array
    pg_fetch_object — Fetch a row as an object
    pg_fetch_result — Returns values from a result resource
    pg_fetch_row — Get a row as an enumerated array
    pg_field_is_null — Test if a field is SQL NULL
    pg_field_name — Returns the name of a field
    pg_field_num — Returns the field number of the named field
    pg_field_prtlen — Returns the printed length
    pg_field_size — Returns the internal storage size of the named field
    pg_field_table — Returns the name or oid of the tables field
    pg_field_type_oid — Returns the type ID (OID) for the corresponding field number
    pg_field_type — Returns the type name for the corresponding field number
    pg_flush — Flush outbound query data on the connection
    pg_free_result — Free result memory
    pg_get_notify — Gets SQL NOTIFY message
    pg_get_pid — Gets the backend's process ID
    pg_get_result — Get asynchronous query result
    pg_host — Returns the host name associated with the connection
    pg_insert — Insert array into table
    pg_last_error — Get the last error message string of a connection
    pg_last_notice — Returns the last notice message from PostgreSQL server
    pg_last_oid — Returns the last row's OID
    pg_lo_close — Close a large object
    pg_lo_create — Create a large object
    pg_lo_export — Export a large object to file
    pg_lo_import — Import a large object from file
    pg_lo_open — Open a large object
    pg_lo_read_all — Reads an entire large object and send straight to browser
    pg_lo_read — Read a large object
    pg_lo_seek — Seeks position within a large object
    pg_lo_tell — Returns current seek position a of large object
    pg_lo_truncate — Truncates a large object
    pg_lo_unlink — Delete a large object
    pg_lo_write — Write to a large object
    pg_meta_data — Get meta data for table
    pg_num_fields — Returns the number of fields in a result
    pg_num_rows — Returns the number of rows in a result
    pg_options — Get the options associated with the connection
    pg_parameter_status — Looks up a current parameter setting of the server.
    pg_pconnect — Open a persistent PostgreSQL connection
    pg_ping — Ping a conexión de base de datos
    pg_port — Devuelve el número de puerto asociado con la conexión
    pg_prepare — Submits a request to create a prepared statement with the given parameters, and waits for completion.
    pg_put_line — Send a NULL-terminated string to PostgreSQL backend
    pg_query_params — Submits a command to the server and waits for the result, with the ability to pass parameters separately from the SQL command text.
    pg_query — Ejecutar una consulta
    pg_result_error_field — Returns an individual field of an error report.
    pg_result_error — Get error message associated with result
    pg_result_seek — Set internal row offset in result resource
    pg_result_status — Get status of query result
    pg_select — Select records
    pg_send_execute — Sends a request to execute a prepared statement with given parameters, without waiting for the result(s).
    pg_send_prepare — Sends a request to create a prepared statement with the given parameters, without waiting for completion.
    pg_send_query_params — Submits a command and separate parameters to the server without waiting for the result(s).
    pg_send_query — Sends asynchronous query
    pg_set_client_encoding — Set the client encoding
    pg_set_error_verbosity — Determines the verbosity of messages returned by pg_last_error and pg_result_error.
    pg_socket — Get a read only handle to the socket underlying a PostgreSQL connection
    pg_trace — Enable tracing a PostgreSQL connection
    pg_transaction_status — Returns the current in-transaction status of the server.
    pg_tty — Return the TTY name associated with the connection
    pg_unescape_bytea — Unescape binary for bytea type
    pg_untrace — Disable tracing of a PostgreSQL connection
    pg_update — Update table
    pg_version — Devuelve un array con el cliente, protocolo y versión del servidor (si está disponible)*/
    
?>