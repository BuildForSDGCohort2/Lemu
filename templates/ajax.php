<?php
    require('../functions/config.php');

    if(isset($_POST['ITEMID'])){
        $result = getProduct($_POST['itemid']);
        echo json_encode($result);
    }
;?>