
<?php
    // ---
    /*Resto los segundos desde el día 1 del mes con el mes anterior , divide entre los segundos que tiene un dia para obtener los días*/

    $mes = $_GET['mes'];
    $any = $_GET['any'];

    //ArrayAsociativo meses
    $mesos = array(
        1=>"january",
        2=>"february",
        3=>"march",
        4=>"april",
        5=>"may",
        6=>"june",
        7=>"july",
        8=>"augost",
        9=>"september",
        10=>"octuber",
        11=>"november",
        12=>"december"
    );

    $dies_mesos = "";

    foreach ($mesos as $key => $value ) {
        if ($mes==$key) {
            $dies_mesos = strtotime($mesos[$key+1]." ".$any)-strtotime($mesos[$key]." ".$any) / 86400;
        }
    }

    $mesos[$mes] . $any . $dies_mesos;


    /* ----------------------------------- */

    /*
        OCT | 1.....17....31
        NOV | 1.....

        -1 Día 

        --> 31/10/año
    
    */

    $data = $mes."/01".$any;
    $darrerdia = strtodate($data);
    $darrerdia -= 86400;
    date("d",$darrerdia);

    /*----------------------------------*/

?>