<?php
/**
 * Created by PhpStorm.
 * User: MD AZIZUL HAKIM
 * Date: 14/12/2017
 * Time: 10:24 AM
 */


$colors = ['RED', 'GREEN', 'BLUE', 'YELLOW', 'CRIMSON', 'PINK'];

foreach ($colors as $color) {
    if (isset($_REQUEST['var']) && !empty($_REQUEST['var'])) {

        $input = $_REQUEST['var'];


        if ($input == $color) {
//            echo $color . ' ' . "found in server <br>";
            echo '<div style="color: green">' . $input . ' Found in Server</div>';
        }


//        } else  echo '<div style="color: red">' . $input . ' Not Found in Server</div>';
    }
//    } else echo "Note: Variable no initialized or Empty";
}

