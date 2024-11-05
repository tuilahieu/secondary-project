<?php

require "../db.php";
require "../func.php";
include('./includes/function.php');
check_admin();
$mod = "panel";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    

switch ($mod) {
    case 'panel': 
        include "./panel.php";
        break;
    default:
        include "../error.php";
        break;
}

?>