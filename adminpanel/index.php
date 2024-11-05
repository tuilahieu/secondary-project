<?php
// require "includes/header.php";

require "../db.php";
require "../func.php";
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