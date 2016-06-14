<?php

session_start();

$_SESSION['codigo'] = $_REQUEST['codigo'];


header('Location:../Vista/elegirLeja.php');


